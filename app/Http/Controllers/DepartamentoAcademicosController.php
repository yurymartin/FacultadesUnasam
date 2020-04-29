<?php

namespace App\Http\Controllers;

use App\DepartamentoAcademicos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use DB;
use Storage;
use App\Persona;
use App\Tipouser;
use App\User;

class DepartamentoAcademicosController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:create departamentoacademico'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read departamentoacademico'], ['only' => ['index1', 'index']]);
        $this->middleware(['permission:update departamentoacademico'], ['only' => ['edit', 'update', 'altabaja']]);
        $this->middleware(['permission:delete departamentoacademico'], ['only' => ['delete']]);
    }

    public function index1()
    {
        $modulo = "departamentoacademicos";
        return view('departamentoacademicos.index', compact('modulo'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscar = $request->busca;
        $departamentos = DB::table('departamentoacademicos as d')
            ->join('facultades as f', 'f.id', '=', 'd.facultad_id')
            ->select('d.id', 'd.nombre', 'd.descripcion', 'd.activo', 'd.borrado', 'd.facultad_id', 'f.id as idfac', 'f.nombre as nombrefac', 'f.abreviatura')
            ->where(function ($query) {
                if (!auth()->user()->hasRole('super-admin')) {
                    $query->where('d.facultad_id', '=', auth()->user()->facultad_id);
                }
            })
            ->where('d.borrado', '0')
            ->where(function ($query) use ($buscar) {
                $query->where('d.nombre', 'like', '%' . $buscar . '%');
                $query->orwhere('f.nombre', 'like', '%' . $buscar . '%');
                $query->orwhere('f.abreviatura', 'like', '%' . $buscar . '%');
            })
            ->orderBy('d.id', 'desc')
            ->paginate(10);

        $facultades = DB::table('facultades')
            ->where(function ($query) {
                if (!auth()->user()->hasRole('super-admin')) {
                    $query->where('id', '=', auth()->user()->facultad_id);
                }
            })
            ->where('activo', '1')
            ->where('borrado', '0')
            ->get();

        return [
            'pagination' => [
                'total' => $departamentos->total(),
                'current_page' => $departamentos->currentPage(),
                'per_page' => $departamentos->perPage(),
                'last_page' => $departamentos->lastPage(),
                'from' => $departamentos->firstItem(),
                'to' => $departamentos->lastItem(),
            ],
            'departamentos' => $departamentos,
            'facultades' => $facultades
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
        $facultad_id = $request->facultad_id;
        $nombre = $request->nombre;
        $descripcion = $request->descripcion;
        $activo = $request->activo;
        $borrado = 0;

        $result = '1';
        $msj = '';
        $selector = '';

        $input1  = array('nombre' => $nombre);
        $reglas1 = array('nombre' => 'required');


        $validator1 = Validator::make($input1, $reglas1);
        if ($facultad_id == '0') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA FACULTAD';
            $selector = 'facultad_id';
        } else if ($validator1->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL NOMBRE DEL DEPARTAMENTO ACADEMICO';
            $selector = 'txttitulo';
        } else {

            $newDepartamento = new DepartamentoAcademicos();
            $newDepartamento->nombre = $nombre;
            $newDepartamento->descripcion = $descripcion;
            $newDepartamento->activo = $activo;
            $newDepartamento->borrado = '0';
            $newDepartamento->facultad_id = $facultad_id;
            $newDepartamento->save();
            $msj = 'EL DEPARTAMENTO ACADEMICO FUE REGISTRADO EXITOSAMENTE';
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
        $facultad_id = $request->facultad_id;
        $nombre = $request->nombre;
        $descripcion = $request->descripcion;
        $borrado = 0;

        $result = '1';
        $msj = '';
        $selector = '';

        $input1  = array('nombre' => $nombre);
        $reglas1 = array('nombre' => 'required');


        $validator1 = Validator::make($input1, $reglas1);


        if ($facultad_id == '0') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA FACULTAD';
            $selector = 'facultad_id';
        } else if ($validator1->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL NOMBRE DEL DEPARTAMENTO ACADEMICO';
            $selector = 'txttituloE';
        } else {

            $newDepartamento = DepartamentoAcademicos::findOrFail($id);
            $newDepartamento->nombre = $nombre;
            $newDepartamento->descripcion = $descripcion;
            $newDepartamento->facultad_id = $facultad_id;
            $newDepartamento->save();

            $msj = 'EL DEPARTAMENTO ACADEMICO FUE REGISTRADO EXITOSAMENTE';
        }
        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }

    public function altabaja($id, $activo)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = DepartamentoAcademicos::findOrFail($id);
        $update->activo = $activo;
        $update->save();

        if (strval($activo) == "0") {
            $msj = 'EL DEPARTAMENTO ACADEMICO FUE DESACTIVADO EXITOSAMENTE';
        } elseif (strval($activo) == "1") {
            $msj = 'EL DEPARTAMENTO ACADEMICO FUE ACTIVADO EXITOSAMENTE';
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
        $borrar = DepartamentoAcademicos::findOrFail($id);
        $borrar->borrado = '1';
        $borrar->save();
        $msj = 'EL DEPARTAMENTO ACADEMICO FUE ELIMINADO EXITOSAMENTE';
        return response()->json(["result" => $result, 'msj' => $msj]);
    }
}
