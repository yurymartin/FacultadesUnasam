<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use Auth;
use DB;
use Storage;
use App\Persona;
use App\Temas;
use App\Tipouser;
use App\User;

class TemasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
        if (accesoUser([1, 2])) {
            $idtipouser = Auth::user()->tipouser_id;
            $tipouser = Tipouser::find($idtipouser);
            $modulo = "temas";
            return view('temas.index', compact('tipouser', 'modulo'));
        } else {
            return view('adminlte::home');
        }
    }
    public function index(Request $request)
    {
        $buscar = $request->busca;
        $temas = DB::table('temas')
            ->where('borrado', '=', 0)
            ->where(function ($query) use ($buscar) {
                $query->where('tema', 'like', '%' . $buscar . '%');
            })
            ->orderBy('id')
            ->paginate(10);

        return [
            'pagination' => [
                'total' => $temas->total(),
                'current_page' => $temas->currentPage(),
                'per_page' => $temas->perPage(),
                'last_page' => $temas->lastPage(),
                'from' => $temas->firstItem(),
                'to' => $temas->lastItem(),
            ],
            'temas' => $temas,
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
        $tema = $request->tema;
        $estado = $request->activo;

        $result = '1';
        $msj = '';
        $selector = '';

        $input1  = array('tema' => $tema);
        $reglas1 = array('tema' => 'required');
        $validator1 = Validator::make($input1, $reglas1);

        if ($validator1->fails()) {
            $result = '0';
            $msj = 'Falta completar el tema';
            $selector = 'tema';
        } else {
            $newdescripcion = new Temas();
            $newdescripcion->tema = $tema;
            $newdescripcion->activo = $estado;
            $newdescripcion->borrado = '0';
            $newdescripcion->save();
            $msj = 'El nuevo tema fue creado con éxito';
        }
        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
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
        $tema = $request->tema;
        $estado = $request->activo;

        $result = '1';
        $msj = '';
        $selector = '';

        $input1  = array('tema' => $tema);
        $reglas1 = array('tema' => 'required');
        $validator1 = Validator::make($input1, $reglas1);

        if ($validator1->fails()) {
            $result = '0';
            $msj = 'Falta completar el tema';
            $selector = 'tema';
        } else {
            $newdescripcion = Temas::findOrFail($id);
            $newdescripcion->tema = $tema;
            $newdescripcion->save();
            $msj = 'El nuevo tema fue modificado con éxito';
        }
        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
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
        $borrar = Temas::findOrFail($id);
        $borrar->borrado = '1';
        $borrar->save();
        $msj = 'El tema de estudio fue eliminado exitosamente';
        return response()->json(["result" => $result, 'msj' => $msj]);
    }

    public function altabaja($id, $activo)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = Temas::findOrFail($id);
        $update->activo = $activo;
        $update->save();

        if (strval($activo) == "0") {
            $msj = 'El tema de estudio fue Desactivada exitosamente';
        } elseif (strval($activo) == "1") {
            $msj = 'El tema de estudio fue Activada exitosamente';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
