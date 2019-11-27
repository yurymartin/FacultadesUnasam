<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Perfiles;
use Validator;
use Auth;
use DB;
use Storage;
use App\Persona;
use App\Tipouser;
use App\User;

class PerfilesController extends Controller
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
            $modulo = "perfiles";
            return view('perfiles.index', compact('tipouser', 'modulo'));
        } else {
            return view('adminlte::home');
        }
    }
    public function index(Request $request)
    {
        $buscar = $request->busca;
        $perfiles = DB::table('perfiles as p')
            ->join('escuelas as e', 'e.id', '=', 'p.escuela_id')
            ->select('p.id as idper', 'p.descripcion', 'p.perfil', 'p.activo', 'e.id as idesc', 'e.nombre')
            ->where('p.borrado', '=', 0)
            ->where(function ($query) use ($buscar) {
                $query->where('p.descripcion', 'like', '%' . $buscar . '%');
                $query->orWhere('p.perfil', 'like', '%' . $buscar . '%');
                $query->orWhere('e.nombre', 'like', '%' . $buscar . '%');
            })
            ->orderBy('p.id')
            ->paginate(10);

        $escuelas = DB::table('escuelas')
            ->where('borrado', '=', 0)
            ->get();

        return [
            'pagination' => [
                'total' => $perfiles->total(),
                'current_page' => $perfiles->currentPage(),
                'per_page' => $perfiles->perPage(),
                'last_page' => $perfiles->lastPage(),
                'from' => $perfiles->firstItem(),
                'to' => $perfiles->lastItem(),
            ],
            'perfiles' => $perfiles,
            'escuelas' => $escuelas,
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
        $descripcion = $request->descripcion;
        $perfil = $request->perfil;
        $estado = $request->activo;
        $escuela_id = $request->escuela_id;

        $result = '1';
        $msj = '';
        $selector = '';

        $input1  = array('perfil' => $perfil);
        $reglas1 = array('perfil' => 'required');
        $validator1 = Validator::make($input1, $reglas1);

        if ($validator1->fails()) {
            $result = '0';
            $msj = 'Complete el perfil profesional de la escuela';
            $selector = 'perfil';
        } else if ($escuela_id == 0) {
            $result = '0';
            $msj = 'Debe de Seleccionar la Escuela';
            $selector = 'cbEscuelas';
        } else {
            $newdescripcion = new Perfiles();
            $newdescripcion->descripcion = $descripcion;
            $newdescripcion->perfil = $perfil;
            $newdescripcion->activo = $estado;
            $newdescripcion->borrado = '0';
            $newdescripcion->escuela_id = $escuela_id;
            $newdescripcion->save();
            $msj = 'el Nuevo Perfil fue creado con éxito';
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
        $descripcion = $request->descripcion;
        $perfil = $request->perfil;
        $escuela_id = $request->escuela_id;

        $result = '1';
        $msj = '';
        $selector = '';

        $input1  = array('perfil' => $perfil);
        $reglas1 = array('perfil' => 'required');
        $validator1 = Validator::make($input1, $reglas1);

        if ($validator1->fails()) {
            $result = '0';
            $msj = 'Complete el perfil profesional de la escuela';
            $selector = 'perfil';
        } else if ($escuela_id == 0) {
            $result = '0';
            $msj = 'Debe de Seleccionar la Escuela';
            $selector = 'cbEscuelas';
        } else {
            $newdescripcion = Perfiles::findOrFail($id);
            if ($descripcion == '') {
                $newdescripcion->descripcion = $descripcion;
                $newdescripcion->perfil = $perfil;
                $newdescripcion->escuela_id = $escuela_id;
                $newdescripcion->save();
            } else {
                $newdescripcion->perfil = $perfil;
                $newdescripcion->escuela_id = $escuela_id;
                $newdescripcion->save();
            }
            $msj = 'El Nuevo Perfil fue Modificado con éxito';
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
        $borrar = Perfiles::findOrFail($id);
        $borrar->borrado = '1';
        $borrar->save();
        $msj = 'El perfil profesional fue eliminado exitosamente';
        return response()->json(["result" => $result, 'msj' => $msj]);
    }

    public function altabaja($id, $activo)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = Perfiles::findOrFail($id);
        $update->activo = $activo;
        $update->save();

        if (strval($activo) == "0") {
            $msj = 'El perfil profesional fue Desactivada exitosamente';
        } elseif (strval($activo) == "1") {
            $msj = 'El perfil profesional fue Activada exitosamente';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
