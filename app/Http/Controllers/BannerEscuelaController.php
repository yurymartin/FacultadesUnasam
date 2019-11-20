<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BannerEscuela;
use Validator;
use Auth;
use DB;
use Storage;

use App\Persona;
use App\Tipouser;
use App\User;

class BannerEscuelaController extends Controller
{
  
    public function index1()
    {
        if(accesoUser([1,2])){

            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);
            $modulo="bannersescuelas";
            return view('bannerescuela.index',compact('tipouser','modulo'));
        }
        else
        {
            return view('adminlte::home');           
        }
    }
    public function index(Request $request)
    {

        $buscar=$request->busca;

        $banners = BannerEscuela::where('borrado','0')
        ->where(function($query) use ($buscar){
            $query->where('titulo', 'like', '%'.$buscar.'%');
            $query->orWhere('descripcion', 'like', '%'.$buscar.'%');
            $query->orWhere('borrado', 'like', '%'.$buscar.'%');
        })
        ->orderBy('id','desc')
        ->paginate(10);

        return [
            'pagination'=>[
                'total'=> $banners->total(),
                'current_page'=> $banners->currentPage(),
                'per_page'=> $banners->perPage(),
                'last_page'=> $banners->lastPage(),
                'from'=> $banners->firstItem(),
                'to'=> $banners->lastItem(),
            ],
            'banners'=>$banners
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
        $titulo=$request->titulo;
        $descripcion=$request->descripcion;
        $img=$request->imagen;
        $estado=$request->estado;

        $result='1';
        $msj='';
        $selector='';

        $imagen="";
        $segureImg=0;

   
        if ($img == 'null')
        {
            $result='0';
            $msj='Debe de Ingresar una Imagen';
            $selector='txttituloE';

        }else{

        if ($request->hasFile('imagen')) {

            $aux=date('d-m-Y') . '-' . date('H-i-s');
            $input  = array('image' => $img) ;
            $reglas = array('image' => 'required|image|mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE');
            $validator = Validator::make($input, $reglas);

            if ($validator->fails())
            {
                $segureImg=1;
                $msj="El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario";
                $result='0';
                $selector='archivo';
            }
            else{

                $extension=$img->getClientOriginalExtension();
                $nuevoNombre=$aux.".".$extension;
                $subir = Storage::disk('banners')->put($nuevoNombre, \File::get($img));

                if($subir){
                    $imagen=$nuevoNombre;
                }
                else{
                    $msj="Error al subir la imagen, intentelo nuevamente luego";
                    $segureImg=1;
                    $result='0';
                    $selector='archivo';
                }
            }

        }
        
        if($segureImg==1){ 

            Storage::disk('banners')->delete($imagen);

        }else{
            $newBanner = new BannerEscuela();
            $newBanner->titulo=$titulo;
            $newBanner->descripcion=$descripcion;
            $newBanner->ruta=$imagen;
            $newBanner->fecha=date('Y/m/d');
            $newBanner->user_id=Auth::user()->id;
            $newBanner->activo=$estado;
            $newBanner->borrado='0';

            $newBanner->save();

            $msj='Nuevo Banner registrado con éxito';
        }
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
