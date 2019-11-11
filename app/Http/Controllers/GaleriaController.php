<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeria;
use Validator;
use Auth;
use DB;
use Storage;

use App\Persona;
use App\Tipouser;
use App\User;

class GaleriaController extends Controller
{
    
    public function index1()
    {
        if(accesoUser([1,2])){

            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);

            $modulo="galeria";
            return view('galeria.index',compact('tipouser','modulo'));
        }
        else
        {
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

        $buscar=$request->busca;

        $galerias = Galeria::where('borrado','0')
        ->where(function($query) use ($buscar){
            $query->where('tituloFoto', 'like', '%'.$buscar.'%');
            $query->orWhere('descrFoto', 'like', '%'.$buscar.'%');
            $query->orWhere('borrado', 'like', '%'.$buscar.'%');
        })
        ->orderBy('id','desc')
        ->paginate(10);

        return [
            'pagination'=>[
                'total'=> $galerias->total(),
                'current_page'=> $galerias->currentPage(),
                'per_page'=> $galerias->perPage(),
                'last_page'=> $galerias->lastPage(),
                'from'=> $galerias->firstItem(),
                'to'=> $galerias->lastItem(),
            ],
            'galerias'=>$galerias
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
        $fecha=$request->fecha;
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
                $subir = Storage::disk('galerias')->put($nuevoNombre, \File::get($img));

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

            Storage::disk('galerias')->delete($imagen);

        }else{
            $newGaleria = new Galeria();
            $newGaleria->tituloFoto=$titulo;
            $newGaleria->descrFoto=$descripcion;
            $newGaleria->fechaFoto=$fecha;
            $newGaleria->ruta=$imagen;
            $newGaleria->user_id=Auth::user()->id;
            $newGaleria->activo=$estado;
            $newGaleria->borrado='0';

            $newGaleria->save();

            $msj='Nueva Fotografía registrada con éxito.';
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
        $result='1';
        $msj='';
        $selector='';

        $idGaleria=$request->idGaleria;
        $editTitulo=$request->editTitulo;
        $editDescr=$request->editDescr;
        $editFecha=$request->editFecha;
        $editEstado=$request->editEstado;
        $img=$request->imagen;

        $imagen="";
        $segureImg=0;
 
        $oldImagen=$request->oldImagen;

        if ($request->hasFile('imagen')) { 

            $aux=date('d-m-Y') . '-' . date('H-i-s');;
            $input  = array('image' => $img) ;
            $reglas = array('image' => 'required|image|mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE');
            $validator = Validator::make($input, $reglas);

            if ($validator->fails())
            {
                $segureImg=1;
                $msj="El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario";
                $result='0';
                $selector='archivo';
            }else{

                if(strlen($oldImagen)>0){
                    Storage::disk('galerias')->delete($oldImagen);
                }

                $extension=$img->getClientOriginalExtension();
                $nuevoNombre=$aux.".".$extension;
                $subir=Storage::disk('galerias')->put($nuevoNombre, \File::get($img));

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
            Storage::disk('galerias')->delete($imagen);
        }
        else
        {

            $editGaleria = Galeria::findOrFail($idGaleria);

            if(strlen($imagen)==0){

                $editGaleria->tituloFoto=$editTitulo;
                $editGaleria->descrFoto=$editDescr;
                $editGaleria->fechaFoto=$editFecha;
                $editGaleria->activo=$editEstado;
                $editGaleria->save();

            }else{

                $editGaleria->tituloFoto=$editTitulo;
                $editGaleria->descrFoto=$editDescr;
                $editGaleria->fechaFoto=$editFecha;
                $editGaleria->ruta=$imagen;
                $editGaleria->activo=$editEstado;
                $editGaleria->save();

            }

            $msj='La Fotografía fue modificada con éxito.';
             
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

        $borrar = Galeria::findOrFail($id);
        $borrar->borrado='1';
        $borrar->user_id=Auth::user()->id;
        $borrar->save();

        $msj='La Fotografía seleccionada fue eliminada exitosamente.';


        return response()->json(["result"=>$result,'msj'=>$msj]);
    }

    public function altabaja($id,$estado)
    {
        $result='1';
        $msj='';
        $selector='';

        $update = Galeria::findOrFail($id);
        $update->activo=$estado;
        $update->user_id=Auth::user()->id;
        $update->save();

        if(strval($estado)=="0"){
            $msj='La Fotografía fue Desactivado exitosamente.';
        }elseif(strval($estado)=="1"){
            $msj='La Fotografía fue Activado exitosamente.';
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);

    }
}