<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CategoriaDocentes;
use Validator;
use Auth;
use DB;
use Storage;
use App\Persona;
use App\Tipouser;
use App\User;

class CategoriaDocentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware(['permission:create categoriadocente'],['only' => ['create','store']]);
        $this->middleware(['permission:read categoriadocente'],['only' => ['index1','index']]);
        $this->middleware(['permission:update categoriadocente'],['only' => ['edit','update','altabaja']]);
        $this->middleware(['permission:delete categoriadocente'],['only' => ['delete']]);
    }
    
    public function index1()
    {
        $modulo = "categoriadocentes";
        return view('categoriadocentes.index', compact('modulo'));
    }

    public function index(Request $request)
    {
        $buscar = $request->busca;
        $catdocentes = CategoriaDocentes::where('borrado', '0')
            ->where(function ($query) use ($buscar) {
                $query->where('categoria', 'like', '%' . $buscar . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return [
            'pagination' => [
                'total' => $catdocentes->total(),
                'current_page' => $catdocentes->currentPage(),
                'per_page' => $catdocentes->perPage(),
                'last_page' => $catdocentes->lastPage(),
                'from' => $catdocentes->firstItem(),
                'to' => $catdocentes->lastItem(),
            ],
            'catdocentes' => $catdocentes
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
        $categoria=$request->categoria;
        $activo=$request->activo;
        $borrado=0;

        $result='1';
        $msj='';
        $selector='';

        $input1  = array('categoria' => $categoria);
        $reglas1 = array('categoria' => 'required');


        $validator1 = Validator::make($input1, $reglas1);


        if ($validator1->fails()) {
            $result='0';
            $msj='FALTA INGRESAR LA CATEGORIA DE DOCENTES';
            $selector='txtcategoria';
        }
       
        else{

            $newCategoria = new CategoriaDocentes();
            $newCategoria->categoria=$categoria;
            $newCategoria->activo=$activo;
            $newCategoria->borrado='0';
            $newCategoria->save();
            $msj='LA NUEVA CATEGORIA FUE REGISTRADA EXITOSAMENTE';
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
        $categoria=$request->categoria;
        $borrado=0;

        $result='1';
        $msj='';
        $selector='';

        $input1  = array('categoria' => $categoria);
        $reglas1 = array('categoria' => 'required');


        $validator1 = Validator::make($input1, $reglas1);


        if ($validator1->fails()) {
            $result='0';
            $msj='FALTA INGRESAR LA CATEGORIA DE DOCENTES';
            $selector='txtcategoria';
        }
       
        else{

            $newCategoria =CategoriaDocentes::findOrFail($id);
            $newCategoria->categoria=$categoria;
            $newCategoria->save();

            $msj='LA NUEVA CATEGORIA FUE MODIFICADA EXITOSAMENTE';
        }
        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    public function altabaja($id,$activo)
    {
        $result='1';
        $msj='';
        $selector='';

        $update = CategoriaDocentes::findOrFail($id);
        $update->activo=$activo;
        $update->save();

        if(strval($activo)=="0"){
            $msj='LA CATEGORIA FUE DESACTIVADA EXITOSAMENTE';
        }elseif(strval($activo)=="1"){
            $msj='LA CATEGORIA FUE ACTIVADA EXITOSAMENTE';
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
        $borrar = CategoriaDocentes::findOrFail($id);
        $borrar->borrado='1';
        $borrar->save();
        $msj='LA CATEGORIA FUE ELIMINADA EXITOSAMENTE';
        return response()->json(["result"=>$result,'msj'=>$msj]);
    }
}
