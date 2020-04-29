<?php

namespace App\Http\Controllers;

use App\Escuela;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use DB;
use Storage;
use App\Persona;
use App\Tipouser;
use App\User;

class EscuelaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['permission:create escuelas'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read escuelas'], ['only' => ['index1', 'index']]);
        $this->middleware(['permission:update escuelas'], ['only' => ['edit', 'update', 'altabaja']]);
        $this->middleware(['permission:delete escuelas'], ['only' => ['delete']]);
    }

    public function index1()
    {
        $modulo = "escuelas";
        return view('escuelas.index', compact('modulo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscar = $request->busca;
        $escuelas = DB::table('escuelas as e')
            ->join('departamentoacademicos as d', 'd.id', '=', 'e.departamentoacademico_id')
            ->select('e.id', 'e.nombre', 'e.telefono', 'e.direccion', 'e.email', 'e.activo', 'e.borrado', 'e.departamentoacademico_id', 'd.id as idfac', 'd.nombre as nombredep')
            ->where(function ($query) {
                if (!auth()->user()->hasRole('super-admin')) {
                    $query->where('d.facultad_id', '=', auth()->user()->facultad_id);
                }
            })
            ->where('e.borrado', '0')
            ->where(function ($query) use ($buscar) {
                $query->where('e.nombre', 'like', '%' . $buscar . '%');
                $query->where('d.nombre', 'like', '%' . $buscar . '%');
            })
            ->orderBy('e.id', 'desc')
            ->paginate(10);

        $departamentoacademicos = DB::table('departamentoacademicos')
            ->where('activo', '1')
            ->where('borrado', '0')
            ->where(function ($query) {
                if (!auth()->user()->hasRole('super-admin')) {
                    $query->where('facultad_id', '=', auth()->user()->facultad_id);
                }
            })
            ->get();

        return [
            'pagination' => [
                'total' => $escuelas->total(),
                'current_page' => $escuelas->currentPage(),
                'per_page' => $escuelas->perPage(),
                'last_page' => $escuelas->lastPage(),
                'from' => $escuelas->firstItem(),
                'to' => $escuelas->lastItem(),
            ],
            'escuelas' => $escuelas,
            'departamentoacademicos' => $departamentoacademicos
        ];
    }
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
        $departamentoacademico_id = $request->departamentoacademico_id;
        $nombre = $request->nombre;
        $telefono = $request->telefono;
        $direccion = $request->direccion;
        $email = $request->email;
        $activo = $request->activo;
        $borrado = 0;

        $result = '1';
        $msj = '';
        $selector = '';

        $input1  = array('nombre' => $nombre);
        $reglas1 = array('nombre' => 'required');


        $validator1 = Validator::make($input1, $reglas1);


        if ($departamentoacademico_id == '0') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR EL DEPARTAMENTO ACADEMICO';
            $selector = 'departamentoacademico_id';
        } else if ($validator1->fails()) {
            $result = '0';
            $msj = 'Ingrese el Nombre de la escuela';
            $selector = 'txttitulo';
        } else {

            $newEscuela = new Escuela();
            $newEscuela->nombre = $nombre;
            $newEscuela->telefono = $telefono;
            $newEscuela->direccion = $direccion;
            $newEscuela->email = $email;
            $newEscuela->activo = $activo;
            $newEscuela->borrado = '0';
            $newEscuela->departamentoacademico_id = $departamentoacademico_id;
            $newEscuela->save();
            $msj = 'LA NUEVA ESCUELA PROFESIONAL FUE CREADO EXITOSAMENTE';
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
        $departamentoacademico_id = $request->departamentoacademico_id;
        $nombre = $request->nombre;
        $telefono = $request->telefono;
        $direccion = $request->direccion;
        $email = $request->email;
        $borrado = 0;

        $result = '1';
        $msj = '';
        $selector = '';

        $input1  = array('nombre' => $nombre);
        $reglas1 = array('nombre' => 'required');


        $validator1 = Validator::make($input1, $reglas1);


        if ($validator1->fails()) {
            $result = '0';
            $msj = 'Complete el dni del docente';
            $selector = 'dniE';
        } else if ($departamentoacademico_id == '0') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR EL DEPARTAMENTO ACADEMICO';
            $selector = 'departamentoacademico_id';
        } else if ($validator1->fails()) {
            $result = '0';
            $msj = 'Ingrese el Nombre de la escuela';
            $selector = 'txttitulo';
        } else {

            $newEscuela = Escuela::findOrFail($id);
            $newEscuela->nombre = $nombre;
            $newEscuela->telefono = $telefono;
            $newEscuela->direccion = $direccion;
            $newEscuela->email = $email;
            $newEscuela->departamentoacademico_id = $departamentoacademico_id;
            $newEscuela->save();
            $msj = 'LA ESCUELA PROFESIONAL FUE MODIFICADO EXITOSAMENTE';
        }
        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
    public function altabaja($id, $activo)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = Escuela::findOrFail($id);
        $update->activo = $activo;
        $update->save();

        if (strval($activo) == "0") {
            $msj = 'LA ESCUELA PROFESIONAL FUE DESACTIVADA EXITOSAMENTE';
        } elseif (strval($activo) == "1") {
            $msj = 'LA ESCUELA PROFESIONAL FUE ACTIVADA EXITOSAMENTE';
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

        $consulta = DB::table('bannersescuelas')
            ->where('escuela_id', '=', $id)
            ->count();

        $consulta1 = DB::table('campolaborales')
            ->where('escuela_id', '=', $id)
            ->count();

        $consulta2 = DB::table('perfiles')
            ->where('escuela_id', '=', $id)
            ->count();

        $consulta3 = DB::table('descripcionescuelas')
            ->where('escuela_id', '=', $id)
            ->count();

        $consulta4 = DB::table('galeriaescuelas')
            ->where('escuela_id', '=', $id)
            ->count();

        $consulta5 = DB::table('mallas')
            ->where('escuela_id', '=', $id)
            ->count();



        if ($consulta > 0 || $consulta1 > 0 || $consulta2 > 0 || $consulta3 > 0 || $consulta4 > 0 || $consulta5 > 0) {
            $result = '0';
            $msj = 'NO SE PUEDE ELIMINAR LA ESCUELA PROFESIONAL PORQUE CAUSARIA PROBLEMAS EN EL SISTEMA';
        } else {
            $borrar = Escuela::findOrFail($id);
            $borrar->borrado = '1';
            $borrar->save();
            $msj = 'LA ESCUELA PROFESIONAL FUE ELIMINADO EXITOSAMENTE';
        }
        return response()->json(["result" => $result, 'msj' => $msj]);
    }
}
