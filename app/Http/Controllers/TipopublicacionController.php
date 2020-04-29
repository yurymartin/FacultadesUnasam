<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Tipopublicacion;
use Validator;

class TipopublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['permission:create tipo publicacion'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read tipo publicacion'], ['only' => ['index1', 'index']]);
        $this->middleware(['permission:update tipo publicacion'], ['only' => ['edit', 'update', 'altabaja']]);
        $this->middleware(['permission:delete tipo publicacion'], ['only' => ['delete']]);
    }

    public function index1()
    {
        $modulo = "tipopublicaciones";
        return view('tipopublicaciones.index', compact('modulo'));
    }

    public function index(Request $request)
    {
        $buscar = $request->busca;
        $tipopublicaciones = Tipopublicacion::where('borrado', '0')
            ->where(function ($query) use ($buscar) {
                $query->where('tipo', 'like', '%' . $buscar . '%');
            })
            ->orderBy('id')
            ->paginate(10);

        return [
            'pagination' => [
                'total' => $tipopublicaciones->total(),
                'current_page' => $tipopublicaciones->currentPage(),
                'per_page' => $tipopublicaciones->perPage(),
                'last_page' => $tipopublicaciones->lastPage(),
                'from' => $tipopublicaciones->firstItem(),
                'to' => $tipopublicaciones->lastItem(),
            ],
            'tipopublicaciones' => $tipopublicaciones,
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo = $request->tipo;
        $activo = $request->activo;

        $result = '1';
        $msj = '';
        $selector = '';

        $input = array('tipo' => $tipo);
        $reglas = array('tipo' => 'required');
        $validator = Validator::make($input, $reglas);


        if ($validator->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL TIPO';
            $selector = 'tipo';
        } else {
            $newtipo = new Tipopublicacion();
            $newtipo->tipo = $tipo;
            $newtipo->activo = $activo;
            $newtipo->borrado = '0';
            $newtipo->save();
            $msj = 'EL TIPO DE PUBLICACION FUE CREADO EXITOSAMENTE';
        }

        return  response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tipo = $request->tipo;
        $activo = $request->activo;

        $result = '1';
        $msj = '';
        $selector = '';

        $input = array('tipo' => $tipo);
        $reglas = array('tipo' => 'required');
        $validator = Validator::make($input, $reglas);


        if ($validator->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL TIPO';
            $selector = 'tipo';
        } else {
            $newtipo = Tipopublicacion::findOrFail($id);
            $newtipo->tipo = $tipo;
            $newtipo->save();
            $msj = 'EL TIPO DE PUBLICACION FUE MODIFICADO EXITOSAMENTE';
        }

        return  response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = '1';
        $msj = '1';
        
        $tipo = Tipopublicacion::findOrFail($id);
        $tipo->borrado = '1';
        $tipo->save();
        $msj = 'EL TIPO DE PUBLICACION FUE ELIMINADO EXITOSAMENTE';
        return response()->json(["result" => $result, 'msj' => $msj]);
    }

    public function altabaja($id, $activo)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = Tipopublicacion::findOrFail($id);
        $update->activo = $activo;
        $update->save();

        if (strval($activo) == "0") {
            $msj = 'EL TIPO DE PUBLICACION FUE DESACTIVADO EXITOSAMENTE';
        } elseif (strval($activo) == "1") {
            $msj = 'EL TIPO DE PUBLICACION FUE ACTIVADO EXITOSAMENTE';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
