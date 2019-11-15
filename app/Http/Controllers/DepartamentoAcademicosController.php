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
    public function index1()
    {
        if (accesoUser([1, 2])) {
            $idtipouser = Auth::user()->tipouser_id;
            $tipouser = Tipouser::find($idtipouser);
            $modulo = "departamentoacademicos";
            return view('departamentoacademicos.index', compact('tipouser', 'modulo'));
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
        $departamentos = DepartamentoAcademicos::where('borrado', '0')
            ->where(function ($query) use ($buscar) {
                $query->where('nombre', 'like', '%' . $buscar . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return [
            'pagination' => [
                'total' => $departamentos->total(),
                'current_page' => $departamentos->currentPage(),
                'per_page' => $departamentos->perPage(),
                'last_page' => $departamentos->lastPage(),
                'from' => $departamentos->firstItem(),
                'to' => $departamentos->lastItem(),
            ],
            'departamentos' => $departamentos
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
        $descripcion=$request->descripcion;
        $activo=$request->activo;
        $borrado=0;

        $result='1';
        $msj='';
        $selector='';

        $input1  = array('nombre' => $nombre);
        $reglas1 = array('nombre' => 'required');


        $validator1 = Validator::make($input1, $reglas1);


        if ($validator1->fails()) {
            $result='0';
            $msj='Ingrese el Nombre del departamento';
            $selector='txttitulo';
        }
       
        else{

            $newDepartamento = new DepartamentoAcademicos();
            $newDepartamento->nombre=$nombre;
            $newDepartamento->descripcion=$descripcion;
            $newDepartamento->activo=$activo;
            $newDepartamento->borrado='0';
            $newDepartamento->save();
            $msj='Nueva Departamento Academico registrado con éxito';
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
        $nombre=$request->nombre;
        $descripcion=$request->descripcion;
        $borrado=0;

        $result='1';
        $msj='';
        $selector='';

        $input1  = array('nombre' => $nombre);
        $reglas1 = array('nombre' => 'required');


        $validator1 = Validator::make($input1, $reglas1);


        if ($validator1->fails()) {
            $result='0';
            $msj='Ingrese el Nombre del departamento';
            $selector='txttitulo';
        }
       
        else{

            $newDepartamento =DepartamentoAcademicos::findOrFail($id);
            $newDepartamento->nombre=$nombre;
            $newDepartamento->descripcion=$descripcion;
            $newDepartamento->save();

            $msj='Nueva Departamento Academico fue modificado con éxito';
        }
        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    public function altabaja($id,$activo)
    {
        $result='1';
        $msj='';
        $selector='';

        $update = DepartamentoAcademicos::findOrFail($id);
        $update->activo=$activo;
        $update->save();

        if(strval($activo)=="0"){
            $msj='El Departamento Academico fue Desactivada exitosamente';
        }elseif(strval($activo)=="1"){
            $msj='El Departamento Academico fue Activada exitosamente';
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

        $consulta1=DB::table('facultades as f')
                    ->join('departamentoacademicos as da', 'f.departamentoacad_id', '=', 'da.id')
                    ->where('da.id',$id)->count();

        if($consulta1>0) {
            $result='0';
            $msj='No se puede eliminar el departamento porque tiene datos enlazados con otras entidades';
        }else{
        
        $borrar = DepartamentoAcademicos::findOrFail($id);
        //$task->delete();

        $borrar->borrado='1';

        $borrar->save();

        $msj='Departamento Academico eliminado exitosamente';
     }

        return response()->json(["result"=>$result,'msj'=>$msj]);
    }
}
