<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\GradoAcademicos;
use Validator;
use Auth;
use DB;
use Storage;
use App\Persona;
use App\Tipouser;
use App\User;

class GradoAcademicosController extends Controller
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
            $modulo = "gradoacademicos";
            return view('gradoacademicos.index', compact('tipouser', 'modulo'));
        } else {
            return view('adminlte::home');
        }
    }

    public function index(Request $request)
    {
        $buscar = $request->busca;
        $gradoacademicos = GradoAcademicos::where('borrado', '0')
            ->where(function ($query) use ($buscar) {
                $query->where('grado', 'like', '%' . $buscar . '%');
                $query->where('abreviatura', 'like', '%' . $buscar . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return [
            'pagination' => [
                'total' => $gradoacademicos->total(),
                'current_page' => $gradoacademicos->currentPage(),
                'per_page' => $gradoacademicos->perPage(),
                'last_page' => $gradoacademicos->lastPage(),
                'from' => $gradoacademicos->firstItem(),
                'to' => $gradoacademicos->lastItem(),
            ],
            'gradoacademicos' => $gradoacademicos
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
        $grado=$request->grado;
        $abreviatura=$request->abreviatura;
        $activo=$request->activo;
        $borrado=0;

        $result='1';
        $msj='';
        $selector='';

        $input1  = array('grado' => $grado);
        $reglas1 = array('grado' => 'required');


        $validator1 = Validator::make($input1, $reglas1);


        if ($validator1->fails()) {
            $result='0';
            $msj='Ingrese el grado academico';
            $selector='txtgrado';
        }
       
        else{

            $newGrados = new GradoAcademicos();
            $newGrados->grado=$grado;
            $newGrados->abreviatura=$abreviatura;
            $newGrados->activo=$activo;
            $newGrados->borrado='0';
            $newGrados->save();
            $msj='Nuevo Grado Academico registrado con éxito';
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
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
        $grado=$request->grado;
        $abreviatura=$request->abreviatura;
        $borrado=0;

        $result='1';
        $msj='';
        $selector='';

        $input1  = array('grado' => $grado);
        $reglas1 = array('grado' => 'required');


        $validator1 = Validator::make($input1, $reglas1);


        if ($validator1->fails()) {
            $result='0';
            $msj='Ingrese el grado academico';
            $selector='txtgrado';
        }
       
        else{

            $newGrados =GradoAcademicos::findOrFail($id);
            $newGrados->grado=$grado;
            $newGrados->abreviatura=$abreviatura;
            $newGrados->save();

            $msj='El Grado Academico fue modificado con éxito';
        }
        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    public function altabaja($id,$activo)
    {
        $result='1';
        $msj='';
        $selector='';

        $update = GradoAcademicos::findOrFail($id);
        $update->activo=$activo;
        $update->save();

        if(strval($activo)=="0"){
            $msj='El Grado Academico fue Desactivada exitosamente';
        }elseif(strval($activo)=="1"){
            $msj='El Grado Academico fue Activada exitosamente';
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
        $result='1';
        $msj='1';

        $consulta1=DB::table('docentes as d')
                    ->join('gradoacademicos as ga', 'd.gradoacademico_id', '=', 'ga.id')
                    ->where('ga.id',$id)->count();

        if($consulta1>0) {
            $result='0';
            $msj='No se puede eliminar el grado academico porque tiene datos enlazados con otras entidades';
        }else{
        
        $borrar = GradoAcademicos::findOrFail($id);
        //$task->delete();

        $borrar->borrado='1';

        $borrar->save();

        $msj='El Grado Academico fue eliminado exitosamente';
     }

        return response()->json(["result"=>$result,'msj'=>$msj]);
    }
}
