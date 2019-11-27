<?php

namespace App\Http\Controllers;

use App\NosotrosEscuelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use Auth;
use DB;
use Storage;
use App\Persona;
use App\Tipouser;
use App\User;

class NosotrosEscuelasController extends Controller
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
            $modulo = "nosotrosescuelas";
            return view('nosotrosescuelas.index', compact('tipouser', 'modulo'));
        } else {
            return view('adminlte::home');
        }
    }
    public function index(Request $request)
    {
        $buscar = $request->busca;
        $nosotrosescuelas = DB::table('nosotrosescuelas as ne')
            ->join('escuelas as e', 'e.id', '=', 'ne.escuela_id')
            ->select('ne.id as idnos', 'ne.mision', 'ne.vision', 'ne.historia', 'ne.filosofia', 'ne.activo', 'e.id as idesc', 'e.nombre')
            ->where('ne.borrado', '=', 0)
            ->where(function ($query) use ($buscar) {
                $query->where('ne.mision', 'like', '%' . $buscar . '%');
                $query->orWhere('ne.vision', 'like', '%' . $buscar . '%');
                $query->orWhere('e.nombre', 'like', '%' . $buscar . '%');
            })
            ->orderBy('ne.id')
            ->paginate(10);

        $escuelas = DB::table('escuelas')
            ->where('borrado', '=', 0)
            ->get();

        return [
            'pagination' => [
                'total' => $nosotrosescuelas->total(),
                'current_page' => $nosotrosescuelas->currentPage(),
                'per_page' => $nosotrosescuelas->perPage(),
                'last_page' => $nosotrosescuelas->lastPage(),
                'from' => $nosotrosescuelas->firstItem(),
                'to' => $nosotrosescuelas->lastItem(),
            ],
            'nosotrosescuelas' => $nosotrosescuelas,
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
        $mision = $request->mision;
        $vision = $request->vision;
        $historia = $request->historia;
        $filosofia = $request->filosofia;
        $estado = $request->activo;
        $escuela_id = $request->escuela_id;

        $result = '1';
        $msj = '';
        $selector = '';

        $imagen = "";
        $segureImg = 0;

        $input1  = array('mision' => $mision);
        $reglas1 = array('mision' => 'required');
        $validator1 = Validator::make($input1, $reglas1);

        $input2  = array('vision' => $vision);
        $reglas2 = array('vision' => 'required');
        $validator2 = Validator::make($input2, $reglas2);

        $input3  = array('historia' => $historia);
        $reglas3 = array('historia' => 'required');
        $validator3 = Validator::make($input3, $reglas3);

        $input4  = array('filosofia' => $filosofia);
        $reglas4 = array('filosofia' => 'required');
        $validator4 = Validator::make($input4, $reglas4);

        if ($validator1->fails()) {
            $result = '0';
            $msj = 'Complete la Mision de la escuela';
            $selector = 'mision';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'Complete la vision de la escuela';
            $selector = 'vision';
        } else if ($validator3->fails()) {
            $result = '0';
            $msj = 'Complete la historia de la escuela';
            $selector = 'historia';
        } else if ($validator4->fails()) {
            $result = '0';
            $msj = 'Complete la filosofia de la escuela';
            $selector = 'filosofia';
        } else if ($escuela_id == 0) {
            $result = '0';
            $msj = 'Debe de Seleccionar la Escuela';
            $selector = 'cbEscuelas';
        } else {
            $newdescripcion = new NosotrosEscuelas();
            $newdescripcion->descripcion = $descripcion;
            $newdescripcion->mision = $mision;
            $newdescripcion->vision = $vision;
            $newdescripcion->historia = $historia;
            $newdescripcion->filosofia = $filosofia;
            $newdescripcion->activo = $estado;
            $newdescripcion->borrado = '0';
            $newdescripcion->escuela_id = $escuela_id;
            $newdescripcion->save();
            $msj = 'Nueva Descripcion de Escuelas fue Modificado con éxito';
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
        $mision = $request->mision;
        $vision = $request->vision;
        $historia = $request->historia;
        $filosofia = $request->filosofia;
        $estado = $request->activo;
        $escuela_id = $request->escuela_id;

        $result = '1';
        $msj = '';
        $selector = '';

        $imagen = "";
        $segureImg = 0;

        $input1  = array('mision' => $mision);
        $reglas1 = array('mision' => 'required');
        $validator1 = Validator::make($input1, $reglas1);

        $input2  = array('vision' => $vision);
        $reglas2 = array('vision' => 'required');
        $validator2 = Validator::make($input2, $reglas2);

        $input3  = array('historia' => $historia);
        $reglas3 = array('historia' => 'required');
        $validator3 = Validator::make($input3, $reglas3);

        $input4  = array('filosofia' => $filosofia);
        $reglas4 = array('filosofia' => 'required');
        $validator4 = Validator::make($input4, $reglas4);

        if ($validator1->fails()) {
            $result = '0';
            $msj = 'Complete la Mision de la escuela';
            $selector = 'mision';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'Complete la vision de la escuela';
            $selector = 'vision';
        } else if ($validator3->fails()) {
            $result = '0';
            $msj = 'Complete la historia de la escuela';
            $selector = 'historia';
        } else if ($validator4->fails()) {
            $result = '0';
            $msj = 'Complete la filosofia de la escuela';
            $selector = 'filosofia';
        } else if ($escuela_id == 0) {
            $result = '0';
            $msj = 'Debe de Seleccionar la Escuela';
            $selector = 'cbEscuelas';
        } else {
            $newdescripcion = NosotrosEscuelas::findOrFail($id);
            $newdescripcion->descripcion = $descripcion;
            $newdescripcion->mision = $mision;
            $newdescripcion->vision = $vision;
            $newdescripcion->historia = $historia;
            $newdescripcion->filosofia = $filosofia;
            $newdescripcion->escuela_id = $escuela_id;
            $newdescripcion->save();
            $msj = 'Nueva Descripcion de Escuelas fue registrado con éxito';
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
        $borrar = NosotrosEscuelas::findOrFail($id);
        $borrar->borrado = '1';
        $borrar->save();
        $msj = 'La Descripcion fue eliminado exitosamente';
        return response()->json(["result" => $result, 'msj' => $msj]);
    }

    public function altabaja($id, $activo)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = NosotrosEscuelas::findOrFail($id);
        $update->activo = $activo;
        $update->save();

        if (strval($activo) == "0") {
            $msj = 'La Descripcion fue Desactivada exitosamente';
        } elseif (strval($activo) == "1") {
            $msj = 'La Descripcion fue Activada exitosamente';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
