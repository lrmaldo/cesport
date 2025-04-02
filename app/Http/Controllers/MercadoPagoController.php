<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;
use App\Models\Registro; // Asumiendo que tienes un modelo Registro
use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class MercadoPagoController extends Controller
{
    public function __construct()
    {
        // Configurar credenciales de MercadoPago con la nueva sintaxis
        MercadoPagoConfig::setAccessToken(Config::get('services.mercadopago.token'));
    }

    public function crearPreferencia(Request $request)
    {
        try {
            // Validar los datos recibidos


            // Crear un cliente de preferencia
            $client = new PreferenceClient();

            // Determinar precio según categoría
            $precio = $request->categoria == '5km' ? 350 : 500;

            // Preparar los datos de la preferencia
            $preference_data = [
                "items" => [
                    [
                        "title" => "Inscripción Carrera CESport 2025 - " . $request->categoria,
                        "quantity" => 1,
                        "unit_price" => $precio,
                       /*  "currency_id" => "MXN" */
                    ]
                ],

            ];

            // Crear la preferencia
            $preference = $client->create($preference_data);

            return response()->json([
                'success' => true,
                'init_point' => $preference->init_point
            ]);
        } catch (\Exception $e) {
            Log::error('Error al crear preferencia MP: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error al procesar el pago: ' . $e->getMessage()
            ], 500);
        }
    }

    public function webhook(Request $request)
    {
        Log::info('Webhook de MercadoPago recibido', $request->all());

        try {
            if ($request->type === 'payment' && isset($request->data['id'])) {
                $paymentId = $request->data['id'];

                // Obtener datos del pago usando el nuevo SDK
                $paymentClient = new \MercadoPago\Client\Payment\PaymentClient();
                $payment = $paymentClient->get($paymentId);

                if ($payment->status === 'approved') {
                    // Extraer datos del external_reference
                    $externalReference = json_decode($payment->external_reference, true);

                    // Crear registro en la base de datos
                    $registro = new Registro();
                    $registro->nombre_completo = $externalReference['nombre'];
                    $registro->correo_electronico = $externalReference['correo'];
                    $registro->telefono = $externalReference['telefono'];
                    $registro->categoria = $externalReference['categoria'];
                    $registro->genero = $externalReference['genero'];
                    $registro->talla_playera = $externalReference['talla'];
                    $registro->metodo_pago = 'mercadopago';
                    $registro->estado_pago = 'pagado';
                    $registro->id_transaccion = $paymentId;

                    // Generar número de corredor
                    $ultimoRegistro = Registro::latest()->first();
                    $numero_corredor = $ultimoRegistro ? $ultimoRegistro->numero_corredor + 1 : 1001;
                    $registro->numero_corredor = $numero_corredor;

                    $registro->save();
                }
            }

            return response()->json(['status' => 'ok']);
        } catch (Exception $e) {
            Log::error('Error al procesar webhook de MercadoPago: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function success(Request $request)
    {
        try {
            // Verificar que tengamos los datos necesarios
            if (!$request->payment_id || !$request->external_reference) {
                return redirect()->route('carrera')->with('error', 'No se pudo procesar el pago correctamente');
            }

            // Obtener datos del external_reference
            $externalReference = json_decode($request->external_reference);

            // Verificar si ya existe un registro con este ID de pago
            $existente = Registro::where('id_transaccion', $request->payment_id)->first();
            if ($existente) {
                return redirect()->route('confirmacion', ['numero_corredor' => $existente->numero_corredor]);
            }

            // Crear un nuevo registro
            $registro = new Registro();
            $registro->nombre_completo = $externalReference->nombre;
            $registro->correo_electronico = $externalReference->correo;
            $registro->telefono = $externalReference->telefono;
            $registro->categoria = $externalReference->categoria;
            $registro->genero = $externalReference->genero;
            $registro->talla_playera = $externalReference->talla;
            $registro->metodo_pago = 'mercadopago';
            $registro->estado_pago = 'pagado';
            $registro->id_transaccion = $request->payment_id;

            // Generar número de corredor
            $ultimoRegistro = Registro::latest()->first();
            $numero_corredor = $ultimoRegistro ? $ultimoRegistro->numero_corredor + 1 : 1001;
            $registro->numero_corredor = $numero_corredor;

            $registro->save();

            // Redirigir a la página de confirmación
            return redirect()->route('confirmacion', ['numero_corredor' => $numero_corredor]);
        } catch (\Exception $e) {
            Log::error('Error en callback success MP: ' . $e->getMessage());
            return redirect()->route('carrera')->with('error', 'Ocurrió un error al procesar tu pago. Por favor contacta a soporte.');
        }
    }

    public function failure()
    {
        return redirect()->route('carrera')->with('error', 'El pago no pudo ser procesado. Por favor intenta nuevamente.');
    }

    public function pending()
    {
        return redirect()->route('carrera')->with('info', 'Tu pago está pendiente de confirmación. Te notificaremos cuando se complete.');
    }
}
