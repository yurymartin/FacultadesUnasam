<?php

namespace App\Http\Controllers;

use App\CategoriaDocentes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Docentes;
use Validator;
use Auth;
use DB;
use Storage;
use App\Persona;
use App\Tipouser;
use App\User;


class DocentesController extends Controller
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
            $modulo = "docentes";
            return view('docentes.index', compact('tipouser', 'modulo'));
        } else {
            return view('adminlte::home');
        }
    }
    public function index(Request $request)
    {
        $buscar = $request->busca;
        $docentes = DB::table('docentes as d')
            ->join('gradoacademicos as ga', 'ga.id', '=', 'd.gradoacademico_id')
            ->join('categoriadocentes as cd', 'cd.id', '=', 'd.categoriadocente_id')
            ->join('personas as p', 'p.id', '=', 'd.persona_id')
            ->where('d.borrado', '0')
            ->where(function ($query) use ($buscar) {
                $query->where('p.dni', 'like', '%' . $buscar . '%');
                $query->orWhere('p.nombres', 'like', '%' . $buscar . '%');
                $query->orWhere('p.apellidos', 'like', '%' . $buscar . '%');
            })
            ->orderBy('p.nombres')
            ->select('d.id','p.dni', 'p.nombres', 'p.apellidos', 'p.foto', 'ga.grado', 'cd.categoria','d.tituloprofe', 'd.fechaingreso','d.activo')
            ->paginate(30);

        $categoriadocentes = CategoriaDocentes::where('borrado', '0')
            ->get();
        $gradoacademicos = DB::table('gradoacademicos')
            ->where('borrado', '0')
            ->get();

        return [
            'pagination' => [
                'total' => $docentes->total(),
                'current_page' => $docentes->currentPage(),
                'per_page' => $docentes->perPage(),
                'last_page' => $docentes->lastPage(),
                'from' => $docentes->firstItem(),
                'to' => $docentes->lastItem(),
            ],
            'docentes' => $docentes,
            'categoriadocentes' => $categoriadocentes,
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
        //
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

        $update = Docentes::findOrFail($id);
        $update->activo=$activo;
        $update->save();

        if(strval($activo)=="0"){
            $msj='El Docente fue Desactivada exitosamente';
        }elseif(strval($activo)=="1"){
            $msj='El Docente fue Activada exitosamente';
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
        $borrar = Docentes::findOrFail($id);
        $borrar->borrado='1';
        $borrar->save();
        $msj='El docente fue eliminado exitosamente';
        return response()->json(["result"=>$result,'msj'=>$msj]);
    }
}
