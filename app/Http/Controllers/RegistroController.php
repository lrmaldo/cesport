<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistroRequest;
use App\Http\Requests\UpdateRegistroRequest;
use App\Models\Registro;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

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
    public function store(StoreRegistroRequest $request)
    {
        # dd($request->file('payment'));

        /* guardar captura */
        $file = $request->file('payment');
        $img  = Storage::disk('public')->put('capturas', $file);

        /* generar numero corredor */
        $categoria      = $request->categoria;
        $ultimoRegistro = Registro::latest('id')->first();
        $ultimoNumero   = $ultimoRegistro ? $ultimoRegistro->id : 0;

// Generar el número de corredor
        $letraInicial           = 'A';
        $numeroCorredor         = $ultimoNumero + 1;
        $numeroCorredor         = str_pad($numeroCorredor, 4, '0', STR_PAD_LEFT);
        $numeroCorredorConLetra = $letraInicial . $numeroCorredor;

        $registro                        = new Registro();
        $registro->nombre_completo       = $request->nombre_completo;
        $registro->telefono              = $request->telefono;
        $registro->correo_electronico    = $request->correo_electronico;
        $registro->categoria             = $categoria;
        $registro->genero                = $request->genero;
        $registro->talla_playera         = $request->talla_playera;
        $registro->captura_transferencia = Storage::url($img);
        $registro->numero_corredor       = $numeroCorredorConLetra;
        $registro->save();

        return response()->json(['success' => true, 'message' => 'Registro guardado correctamente', 'numero_corredor' => $registro->numero_corredor]);
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
