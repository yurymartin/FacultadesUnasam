<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Escuela;
use Validator;
use Auth;
use DB;
use Storage;
use App\Persona;
use App\Tipouser;
use App\User;


class LibroEscuelaController extends Controller
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
            $modulo="libros";
            return view('libroescuela.index',compact('tipouser','modulo'));
        }
        else
        {
            return view('adminlte::home');           
        }
    }
    public function index(Request $request)
    {

        $buscar=$request->busca;

        $libros =DB::table('libros as l')
        ->join('escuelas as e','e.id','=','l.escuela_id')
        ->select('l.id','l.titulo', 'l.descripcion','l.fechapublicacion','l.imagen','l.ruta','l.autor','e.nombre','l.activo')
        ->where('l.borrado','0')
        ->where(function($query) use ($buscar){
            $query->where('l.titulo', 'like', '%'.$buscar.'%');
            $query->orWhere('l.descripcion', 'like', '%'.$buscar.'%');
            $query->orWhere('l.borrado', 'like', '%'.$buscar.'%');
        })
        ->orderBy('l.id','desc')
        ->paginate(10);

        $escuelas = Escuela::where('borrado', '0')
            ->get();

        return [
            'pagination'=>[
                'total'=> $libros->total(),
                'current_page'=> $libros->currentPage(),
                'per_page'=> $libros->perPage(),
                'last_page'=> $libros->lastPage(),
                'from'=> $libros->firstItem(),
                'to'=> $libros->lastItem(),
            ],
            'libros'=>$libros,
            'escuelas' => $escuelas
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
