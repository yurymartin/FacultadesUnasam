<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipopersona;
use App\Escuela;
use Validator;
use Auth;
use DB;

use App\Persona;
use App\Tipouser;
use App\User;


class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index1()
    {
        if(accesoUser([1,2])){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);


            $modulo="persona";
            return view('persona.index',compact('tipouser','modulo'));
        }
        else
        {
            return view('adminlte::home');           
        }
    }


    public function index(Request $request)
    {   
     $buscar=$request->busca;

     $personas = DB::table('personas')
     ->join('tipopersonas', 'tipopersonas.id', '=', 'personas.tipopersona_id')
     ->leftjoin('escuelas', 'escuelas.id', '=', 'personas.escuela_id')
     ->where('personas.borrado','0')
     ->where(function($query) use ($buscar){
        $query->where('personas.nombre','like','%'.$buscar.'%');
        $query->orWhere('personas.dni_ruc','like','%'.$buscar.'%');
        $query->orWhere('personas.codigo_alumno','like','%'.$buscar.'%');
        $query->orWhere('escuelas.nombre','like','%'.$buscar.'%');
        $query->orWhere('tipopersonas.tipo','like','%'.$buscar.'%');
        })
     ->orderBy('personas.nombre')
     ->orderBy('personas.dni_ruc')
     ->select('personas.id','personas.nombre','personas.dni_ruc','personas.codigo_alumno','personas.direccion','personas.escuela_id','personas.tipopersona_id','personas.activo', 'tipopersonas.id as idtip','tipopersonas.tipo','escuelas.nombre as escuela','escuelas.id as idesc')
     ->paginate(30);

     $escuelas=Escuela::where('borrado','0')->where('activo','1')->orderBy('nombre')->get();
     $tipopersonas=Tipopersona::get();

     return [
        'pagination'=>[
            'total'=> $personas->total(),
            'current_page'=> $personas->currentPage(),
            'per_page'=> $personas->perPage(),
            'last_page'=> $personas->lastPage(),
            'from'=> $personas->firstItem(),
            'to'=> $personas->lastItem(),
        ],
        'personas'=>$personas,
        'escuelas'=>$escuelas,
        'tipopersonas'=>$tipopersonas,
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
        $nombre=$request->nombre;
        $dni_ruc=$request->dni_ruc;
        $codigo_alumno=$request->codigo_alumno;
        $direccion=$request->direccion;
        $activo=$request->activo;
        $escuela_id=$request->escuela_id;
        $tipopersona_id=$request->tipopersona_id;

        if($escuela_id=="0"){
            $escuela_id=null;
        }

        $result='1';
        $msj='';
        $selector='';

        $input1  = array('nombre' => $nombre);
        $reglas1 = array('nombre' => 'required');

       /* $input2  = array('nombre' => $nombre);
        $reglas2 = array('nombre' => 'unique:escuelas,nombre'.',1,borrado');*/

        $input2  = array('dni_ruc' => $dni_ruc);
        $reglas2 = array('dni_ruc' => 'required');


        $validator1 = Validator::make($input1, $reglas1);
        $validator2 = Validator::make($input2, $reglas2);


        if($tipopersona_id==0){
            $result='0';
            $msj='Seleccione el tipo de Persona';
            $selector='cbstipopersona';
        }
        elseif ($validator1->fails())
        {
            $result='0';
            $msj='Complete el nombre de la Persona';
            $selector='txtnom';

        }elseif ($validator2->fails()) {
            $result='0';
            $msj='Ingrese el DNI o RUC de la Persona';
            $selector='txtdni';
        }
       
        else{

            $newPersona = new Persona();
            $newPersona->nombre=$nombre;
            $newPersona->dni_ruc=$dni_ruc;
            $newPersona->codigo_alumno=$codigo_alumno;
            $newPersona->direccion=$direccion;
            $newPersona->activo=$activo;
            $newPersona->borrado='0';
            $newPersona->escuela_id=$escuela_id;
            $newPersona->tipopersona_id=$tipopersona_id;

            $newPersona->save();

            $msj='Nueva Persona registrada con éxito';
        }




       //Areaunasam::create($request->all());

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
        $nombre=$request->nombre;
        $dni_ruc=$request->dni_ruc;
        $codigo_alumno=$request->codigo_alumno;
        $direccion=$request->direccion;
        $activo=$request->activo;
        $escuela_id=$request->escuela_id;
        $tipopersona_id=$request->tipopersona_id;

        if($escuela_id=="0"){
            $escuela_id=null;
        }



        $result='1';
        $msj='';
        $selector='';

        $input1  = array('nombre' => $nombre);
        $reglas1 = array('nombre' => 'required');

       /* $input2  = array('nombre' => $nombre);
        $reglas2 = array('nombre' => 'unique:escuelas,nombre'.',1,borrado');*/

        $input2  = array('dni_ruc' => $dni_ruc);
        $reglas2 = array('dni_ruc' => 'required');


        $validator1 = Validator::make($input1, $reglas1);
        $validator2 = Validator::make($input2, $reglas2);


        if($tipopersona_id==0){
            $result='0';
            $msj='Seleccione el tipo de Persona';
            $selector='cbstipopersonaE';
        }
        elseif ($validator1->fails())
        {
            $result='0';
            $msj='Complete el nombre de la Persona';
            $selector='txtnomE';

        }elseif ($validator2->fails()) {
            $result='0';
            $msj='Ingrese el DNI o RUC de la Persona';
            $selector='txtdniE';
        }
       
        else{

            $newPersona =Persona::findOrFail($id);
            $newPersona->nombre=$nombre;
            $newPersona->dni_ruc=$dni_ruc;
            $newPersona->codigo_alumno=$codigo_alumno;
            $newPersona->direccion=$direccion;
            $newPersona->activo=$activo;
            $newPersona->escuela_id=$escuela_id;
            $newPersona->tipopersona_id=$tipopersona_id;

            $newPersona->save();

            $msj='Nueva Persona registrada con éxito';
        }




       //Areaunasam::create($request->all());

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }


    public function altabaja($id,$activo)
    {
        $result='1';
        $msj='';
        $selector='';

        $update = Persona::findOrFail($id);
        $update->activo=$activo;
        $update->save();

        if(strval($activo)=="0"){
            $msj='La Persona fue Desactivada exitosamente';
        }elseif(strval($activo)=="1"){
            $msj='La Persona fue Activada exitosamente';
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

        $consulta1=DB::table('recibos')
                    ->join('personas', 'recibos.persona_id', '=', 'personas.id')
                    ->where('personas.id',$id)->count();



        if($consulta1>0) {
            $result='0';
            $msj='La Persona Seleccionada no se puede eliminar debido a que cuenta con registros de Recibos registrados en ella';
        }else{
        
        $borrar = Persona::findOrFail($id);
        //$task->delete();

        $borrar->borrado='1';

        $borrar->save();

        $msj='Persona eliminada exitosamente';
     }

        return response()->json(["result"=>$result,'msj'=>$msj]);
    }


}
