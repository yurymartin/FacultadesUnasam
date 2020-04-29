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

    public function __construct()
    {
        $this->middleware(['permission:create perfilprofesional escuelas'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read perfilprofesional escuelas'], ['only' => ['index1', 'index']]);
        $this->middleware(['permission:update perfilprofesional escuelas'], ['only' => ['edit', 'update', 'altabaja']]);
        $this->middleware(['permission:delete perfilprofesional escuelas'], ['only' => ['delete']]);
    }

    public function index1()
    {
        $modulo = "perfiles";
        return view('perfiles.index', compact('modulo'));
    }
    public function index(Request $request)
    {
        $buscar = $request->busca;
        $perfiles = DB::table('perfiles as p')
            ->join('escuelas as e', 'e.id', '=', 'p.escuela_id')
            ->join('departamentoacademicos as da', 'da.id', '=', 'e.departamentoacademico_id')
            ->select('p.id as idper', 'p.descripcion', 'p.perfil', 'p.activo', 'e.id as idesc', 'e.nombre')
            ->where(function ($query) {
                if (!auth()->user()->hasRole('super-admin')) {
                    $query->where('da.facultad_id', '=', auth()->user()->facultad_id);
                }
            })
            ->where('p.borrado', '=', 0)
            ->where(function ($query) use ($buscar) {
                $query->where('p.descripcion', 'like', '%' . $buscar . '%');
                $query->orWhere('p.perfil', 'like', '%' . $buscar . '%');
                $query->orWhere('e.nombre', 'like', '%' . $buscar . '%');
            })
            ->orderBy('p.id')
            ->paginate(10);

        $escuelas = DB::table('escuelas as e')
            ->join('departamentoacademicos as da', 'da.id', '=', 'e.departamentoacademico_id')
            ->select('e.id', 'e.nombre')
            ->where('e.borrado', '0')
            ->where(function ($query) {
                if (!auth()->user()->hasRole('super-admin')) {
                    $query->where('da.facultad_id', '=', auth()->user()->facultad_id);
                }
            })
            ->where('e.activo', '=', '1')
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
            $msj = 'FALTA COMPLETAR EL PERFIL PROFESIONAL';
            $selector = 'perfil';
        } else if ($escuela_id == 0) {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA ESCUELA PROFESIONAL';
            $selector = 'cbEscuelas';
        } else {
            $newdescripcion = new Perfiles();
            $newdescripcion->descripcion = $descripcion;
            $newdescripcion->perfil = $perfil;
            $newdescripcion->activo = $estado;
            $newdescripcion->borrado = '0';
            $newdescripcion->escuela_id = $escuela_id;
            $newdescripcion->save();
            $msj = 'EL NUEVO PERFIL PROFESIONAL FUE REGISTRADO EXITOSAMENTE';
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
            $msj = 'FALTA COMPLETAR EL PERFIL PROFESIONAL';
            $selector = 'perfil';
        } else if ($escuela_id == 0) {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA ESCUELA PROFESIONAL';
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
            $msj = 'EL PERFIL PROFESIONAL FUE MODIFICADO EXITOSAMENTE';
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
        $msj = 'EL PERFIL PROFESIONAL FUE ELIMINADO EXITOSAMENTE';
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
            $msj = 'EL PERFIL PROFESIONAL FUE DESACTIVADO EXITOSAMENTE';
        } elseif (strval($activo) == "1") {
            $msj = 'EL PERFIL PROFESIONAL FUE ACTIVADO EXITOSAMENTE';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
