<?php

namespace App\Http\Controllers;

use App\DepartamentoAcademicos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Facultades;
use Validator;
use Auth;
use DB;
use Storage;
use App\Persona;
use App\Tipouser;
use App\User;

class FacultadesController extends Controller
{
    public function index1()
    {
        if (accesoUser([1, 2])) {
            $idtipouser = Auth::user()->tipouser_id;
            $tipouser = Tipouser::find($idtipouser);
            $modulo = "facultades";
            return view('facultades.index', compact('tipouser', 'modulo'));
        } else {
            return view('adminlte::home');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        $buscar = $request->busca;
        $facultades = DB::table('facultades')
            ->where('borrado', '0')
            ->where(function ($query) use ($buscar) {
                $query->where('nombre', 'like', '%' . $buscar . '%');
                $query->orWhere('abreviatura', 'like', '%' . $buscar . '%');
            })
            ->orderBy('id')
            ->paginate(30);

        $cant_filas = DB::table('facultades')
            ->select(DB::raw('count(*) as filas'))
            ->first();

        return [
            'pagination' => [
                'total' => $facultades->total(),
                'current_page' => $facultades->currentPage(),
                'per_page' => $facultades->perPage(),
                'last_page' => $facultades->lastPage(),
                'from' => $facultades->firstItem(),
                'to' => $facultades->lastItem(),
            ],
            'facultades' => $facultades,
            'cant_filas' => $cant_filas,
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
        $nombre = $request->nombre;
        $abreviatura = $request->abreviatura;
        $activo = $request->activo;

        $result = '1';
        $msj = '';
        $selector = '';

        $input1  = array('nombre' => $nombre);
        $reglas1 = array('nombre' => 'required');

        $input2  = array('abreviatura' => $abreviatura);
        $reglas2 = array('abreviatura' => 'required');

        $validator1 = Validator::make($input1, $reglas1);
        $validator2 = Validator::make($input2, $reglas2);



        if ($validator1->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL NOMBRE DE LA FACULTAD';
            $selector = 'nombre';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LA ABREVIATURA DEL NOMBRE DE LA FACULTAD';
            $selector = 'codigo';
        } else {

            $Facultad = new Facultades();
            $Facultad->nombre = $nombre;
            $Facultad->abreviatura = $abreviatura;
            $Facultad->activo = $activo;
            $Facultad->borrado = '0';
            $Facultad->save();
            $msj = 'LA NUEVA FACULTAD FUE REGISTRADA EXITOSAMENTE';
        }




        //Areaunasam::create($request->all());

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
        $nombre = $request->nombre;
        $abreviatura = $request->abreviatura;

        $result = '1';
        $msj = '';
        $selector = '';

        $input1  = array('nombre' => $nombre);
        $reglas1 = array('nombre' => 'required');

        $input2  = array('abreviatura' => $abreviatura);
        $reglas2 = array('abreviatura' => 'required');

        $validator1 = Validator::make($input1, $reglas1);
        $validator2 = Validator::make($input2, $reglas2);

        if ($validator1->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL NOMBRE DEL FACULTAD';
            $selector = 'nombre';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LA ABREVIATURA DEL NOMBRE DE LA FACULTAD';
            $selector = 'codigoE';
        } else {
            $Facultad = Facultades::findOrFail($id);
            $Facultad->nombre = $nombre;
            $Facultad->abreviatura = $abreviatura;
            $Facultad->save();
            $msj = 'LA FACULTAD FUE MODIFICADO EXITOSAMENTE';
        }
        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }

    public function altabaja($id, $activo)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = Facultades::findOrFail($id);
        $update->activo = $activo;
        $update->save();

        if (strval($activo) == "0") {
            $msj = 'LA FACULTAD FUE DESACTIVADA EXITOSAMENTE';
        } elseif (strval($activo) == "1") {
            $msj = 'LA FACULTAD FUE ACTIVADA EXITOSAMENTE';
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

        $borrar = Facultades::findOrFail($id);
        $borrar->borrado = '1';
        $borrar->save();
        $msj = 'LA FACULTAD FUE ELIMINADO EXITOSAMENTE';

        return response()->json(["result" => $result, 'msj' => $msj]);
    }
}
