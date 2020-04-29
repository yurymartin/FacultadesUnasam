<?php

namespace App\Http\Controllers;

use App\Cargo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use DB;
use Storage;
use App\Persona;
use App\Tipouser;
use App\User;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['permission:create cargos'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read cargos'], ['only' => ['index1', 'index']]);
        $this->middleware(['permission:update cargos'], ['only' => ['edit', 'update', 'altabaja']]);
        $this->middleware(['permission:delete cargos'], ['only' => ['delete']]);
    }

    public function index1()
    {
        $modulo = "cargos";
        return view('cargo.index', compact('modulo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscar = $request->busca;
        $cargos = DB::table('cargos as c')
            ->join('facultades as f', 'f.id', '=', 'c.facultad_id')
            ->select('c.id', 'c.cargo', 'c.descripcion', 'c.activo', 'c.borrado', 'f.id as idfac', 'f.nombre', 'f.abreviatura')
            ->where('c.borrado', '0')
            ->where(function ($query) {
                if (!auth()->user()->hasRole('super-admin')) {
                    $query->where('c.facultad_id', '=', auth()->user()->facultad_id);
                }
            })
            ->where(function ($query) use ($buscar) {
                $query->where('c.cargo', 'like', '%' . $buscar . '%');
                $query->orWhere('f.nombre', 'like', '%' . $buscar . '%');
                $query->orWhere('f.abreviatura', 'like', '%' . $buscar . '%');
            })
            ->orderBy('c.id', 'desc')
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
                'total' => $cargos->total(),
                'current_page' => $cargos->currentPage(),
                'per_page' => $cargos->perPage(),
                'last_page' => $cargos->lastPage(),
                'from' => $cargos->firstItem(),
                'to' => $cargos->lastItem(),
            ],
            'cargos' => $cargos,
            'facultades' => $facultades
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
        $facultad_id = $request->facultad_id;
        $cargo = $request->cargo;
        $descripcion = $request->descripcion;
        $activo = $request->activo;

        $result = '1';
        $msj = '';
        $selector = '';

        $input1  = array('cargo' => $cargo);
        $reglas1 = array('cargo' => 'required');

        $input2 = array('descripcion' => $descripcion);
        $reglas2 = array('descripcion' => 'required');

        $validator1 = Validator::make($input1, $reglas1);
        $validator2 = Validator::make($input2, $reglas2);


        if ($facultad_id == '0') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA FACULTAD';
            $selector = 'facultad_id';
        } else if ($validator1->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL CARGO';
            $selector = 'txttitulo';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LA DESCRIPCION DEL CARGO';
            $selector = 'descripcion';
        } else {

            $newCargo = new Cargo();
            $newCargo->cargo = $cargo;
            $newCargo->descripcion = $descripcion;
            $newCargo->activo = $activo;
            $newCargo->borrado = '0';
            $newCargo->facultad_id = $facultad_id;
            $newCargo->save();
            $msj = 'EL CARGO FUE REGISTRADO EXITOSAMENTE';
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
        $cargo = $request->cargo;
        $descripcion = $request->descripcion;

        $result = '1';
        $msj = '';
        $selector = '';

        $input1  = array('cargo' => $cargo);
        $reglas1 = array('cargo' => 'required');

        $input2 = array('descripcion' => $descripcion);
        $reglas2 = array('descripcion' => 'required');

        $validator1 = Validator::make($input1, $reglas1);
        $validator2 = Validator::make($input2, $reglas2);


        if ($facultad_id == '0') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA FACULTAD';
            $selector = 'facultad_id';
        } else if ($validator1->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL CARGO';
            $selector = 'txttitulo';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LA DESCRIPCION DEL CARGO';
            $selector = 'descripcion';
        } else {

            $newCargo = Cargo::findOrFail($id);
            $newCargo->cargo = $cargo;
            $newCargo->descripcion = $descripcion;
            $newCargo->facultad_id = $facultad_id;
            $newCargo->save();

            $msj = 'EL CARGO FUE MODIFICADO EXITOSAMENTE';
        }
        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }


    public function altabaja($id, $activo)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = Cargo::findOrFail($id);
        $update->activo = $activo;
        $update->save();

        if (strval($activo) == "0") {
            $msj = 'EL CARGO FUE DESACTIVADO EXITOSAMENTE';
        } elseif (strval($activo) == "1") {
            $msj = 'EL CARGO FUE ACTIVADO EXITOSAMENTE';
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


        $borrar = Cargo::findOrFail($id);
        //$task->delete();

        $borrar->borrado = '1';

        $borrar->save();

        $msj = 'EL CARGO FUE ELIMINADO EXITOSAMENTE';

        return response()->json(["result" => $result, 'msj' => $msj]);
    }
}
