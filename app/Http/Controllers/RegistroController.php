<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistroRequest;
use App\Http\Requests\UpdateRegistroRequest;
use App\Models\Registro;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class RegistroController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registros = Registro::all();
        return view('dashboard', [
            'totalRegistros'        => Registro::count(),
            'totalHombres'          => Registro::where('genero', 'varonil')->count(),
            'totalMujeres'          => Registro::where('genero', 'femenil')->count(),
            'totalTallasPendientes' => Registro::whereNull('talla_playera')->count(),
            'registros'             => Registro::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validar los datos del formulario
            $validationRules = [
                'nombre_completo' => 'required|string',
                'correo_electronico' => 'required|email',
                'telefono' => 'required|string',
                'categoria' => 'required|string',
                'genero' => 'required|string',
                'payment' => 'required|file|mimes:jpeg,png,jpg,gif,pdf|max:2048',
            ];

            // Verificar disponibilidad de tallas
            $conteo = Registro::count();
            if ($conteo < 50) {
                $validationRules['talla_playera'] = 'required|string';
            }

            $request->validate($validationRules);

            // Guardar el archivo
            $paymentPath = null;
            if ($request->hasFile('payment')) {
                $paymentPath = $request->file('payment')->store('pagos', 'public');
            }

            // Crear registro en la base de datos
            $registro = new Registro();
            $registro->nombre_completo = $request->nombre_completo;
            $registro->correo_electronico = $request->correo_electronico;
            $registro->telefono = $request->telefono;
            $registro->categoria = $request->categoria;
            $registro->genero = $request->genero;
            $registro->talla_playera = $conteo >= 50 ? 'NO_DISPONIBLE' : $request->talla_playera;
            $registro->metodo_pago = 'transferencia';
            $registro->estado_pago = 'pendiente';
            $registro->comprobante_pago = $paymentPath;

            // Generar número de corredor
            $ultimoRegistro = Registro::latest()->first();
            $numero_corredor = $ultimoRegistro ? $ultimoRegistro->numero_corredor + 1 : 1001;
            $registro->numero_corredor = $numero_corredor;

            $registro->save();

            return response()->json([
                'success' => true,
                'numero_corredor' => $numero_corredor
            ]);

        } catch (Exception $e) {
            Log::error('Error al registrar participante: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error al procesar tu inscripción: ' . $e->getMessage()
            ], 500);
        }
    }

    public function confirmacion($numero_corredor)
    {
        $registro = Registro::where('numero_corredor', $numero_corredor)->first();
        if (!$registro) {
            return view('confirmacion', ['numero_corredor' => 'No encontrado']);
        }
        return view('confirmacion', ['numero_corredor' => $numero_corredor]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Registro $registro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registro $registro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegistroRequest $request, Registro $registro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registro $registro)
    {
        //
    }

    /**
     * Process datatables ajax request.
     */
    public function getData()
    {
        $registros = Registro::select(['nombre_completo', 'correo_electronico', 'genero', 'talla_playera as talla', 'categoria', 'captura_transferencia', 'created_at', 'id']);
        /* return en json */
        return DataTables::of($registros)
            ->addColumn('action', function ($registro) {
                return '<a href="#" class="btn btn-primary">Ver</a>';
            })
            ->editColumn('created_at', function ($registro) {
                return Carbon::parse($registro->created_at)->format('d/m/Y');
            })
            ->editColumn('captura_transferencia', function ($registro) {
                return '<img src="' . $registro->captura_transferencia . '" alt="Captura de Transferencia" class="img-thumbnail" style="width: 100px; cursor: pointer;" onclick="showModal(\'' . $registro->captura_transferencia . '\')">';
            })
            ->rawColumns(['captura_transferencia', 'action'])
            ->make(true);
    }

}
