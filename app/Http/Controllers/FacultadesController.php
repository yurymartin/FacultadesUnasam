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
        $facultades = DB::table('facultades as f')
            ->join('departamentoacademicos as da', 'da.id', '=', 'f.departamentoacad_id')
            ->where('f.borrado', '0')
            ->where(function ($query) use ($buscar) {
                $query->where('f.nombre', 'like', '%' . $buscar . '%');
                $query->orWhere('f.codigo', 'like', '%' . $buscar . '%');
                $query->orWhere('da.nombre', 'like', '%' . $buscar . '%');
            })
            ->orderBy('f.nombre')
            ->orderBy('f.codigo')
            ->select('f.id', 'f.nombre', 'f.codigo', 'f.activo', 'da.nombre as nombredepar', 'da.id as iddepart')
            ->paginate(30);


        $departamentos = DepartamentoAcademicos::get();

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
            'departamentos' => $departamentos,
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
        $codigo = $request->codigo;
        $activo = $request->activo;
        $departamentoacad_id = $request->departamentoacad_id;

        $result = '1';
        $msj = '';
        $selector = '';

        $input1  = array('nombre' => $nombre);
        $reglas1 = array('nombre' => 'required');

        $input2  = array('codigo' => $codigo);
        $reglas2 = array('codigo' => 'required');


        $validator1 = Validator::make($input1, $reglas1);
        $validator2 = Validator::make($input2, $reglas2);



        if ($validator1->fails()) {
            $result = '0';
            $msj = 'Complete el nombre del nombre de la facultad';
            $selector = 'nombre';
        } elseif ($validator2->fails()) {
            $result = '0';
            $msj = 'Ingrese el codigo de la facultad';
            $selector = 'codigo';
        } elseif ($departamentoacad_id <= 0) {
            $result = '0';
            $msj = 'Seleccione el departamento academico';
            $selector = 'cbdepartamento';
        } else {

            $Facultad = new Facultades();
            $Facultad->nombre = $nombre;
            $Facultad->codigo = $codigo;
            $Facultad->activo = $activo;
            $Facultad->borrado = '0';
            $Facultad->departamentoacad_id = $departamentoacad_id;
            $Facultad->save();
            $msj = 'Nueva Facultad registrada con éxito';
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
        //
    }

    public function altabaja($id,$activo)
    {
        $result='1';
        $msj='';
        $selector='';

        $update = Facultades::findOrFail($id);
        $update->activo=$activo;    
        $update->save();

        if(strval($activo)=="0"){
            $msj='La facultad fue Desactivada exitosamente';
        }elseif(strval($activo)=="1"){
            $msj='La facultad fue Activada exitosamente';
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);

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
        $consulta1 = DB::table('escuelas as e')
            ->join('facultades as f', 'e.facultad_id', '=', 'f.id')
            ->where('f.id', $id)->count();
        if ($consulta1 > 0) {
            $result = '0';
            $msj='No se puede eliminar la facultad porque tiene datos enlazados con otras entidades';
        } else {
            $borrar = Facultades::findOrFail($id);
            $borrar->borrado = '1';
            $borrar->save();
            $msj = 'Facultad fue eliminada exitosamente';
        }

        return response()->json(["result" => $result, 'msj' => $msj]);
    }
}
