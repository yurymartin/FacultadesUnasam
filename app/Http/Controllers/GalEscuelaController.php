<?php

namespace App\Http\Controllers;

use App\GalEscuela;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use DB;
use Storage;
use App\Persona;
use App\Tipouser;
use App\User;
use App\Escuela;


class GalEscuelaController extends Controller
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
            $modulo="galeriaescuelas";
            return view('galeriaescuela.index',compact('tipouser','modulo'));
        }
        else
        {
            return view('adminlte::home');           
        }
    }
    public function index(Request $request)
    {

        $buscar=$request->busca;

        $galeriaescuelas =DB::table('galescuelas as be')
        ->join('escuelas as e','e.id','=','be.escuela_id')
        ->select('be.id','be.imagen','be.descripcion','e.nombre','be.activo','e.id as idescu')
        ->where('be.borrado','0')
        ->where(function($query) use ($buscar){
            $query->where('be.descripcion', 'like', '%'.$buscar.'%');
            $query->orWhere('be.borrado', 'like', '%'.$buscar.'%');
        })
        ->orderBy('be.id','desc')
        ->paginate(10);

        $escuelas = Escuela::where('borrado', '0')
            ->get();

        return [
            'pagination'=>[
                'total'=> $galeriaescuelas->total(),
                'current_page'=> $galeriaescuelas->currentPage(),
                'per_page'=> $galeriaescuelas->perPage(),
                'last_page'=> $galeriaescuelas->lastPage(),
                'from'=> $galeriaescuelas->lastItem(),
            ],
            'galeriaescuelas'=>$galeriaescuelas,
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
        $titulo=$request->titulo;
        $descripcion=$request->descripcion;
        $img=$request->imagen;
        $estado=$request->activo;
        $escuela_id=$request->escuela_id;

        $result='1';
        $msj='';
        $selector='';

        $imagen="";
        $segureImg=0;

   
        if ($img == 'null')
        {
            $result='0';
            $msj='Debe de Ingresar una Imagen';
            $selector='archivo';
        } else if ($descripcion == null) {
            $result = '0';
            $msj = 'Debe de Ingresar una descripción';
            $selector = 'txtdescripcion';
        } else if ($escuela_id == 0) {
            $result = '0';
            $msj = 'Debe seleccionar una escuela';
            $selector = 'cbescuela';
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
                $subir = Storage::disk('galeriaE')->put($nuevoNombre, \File::get($img));

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

            Storage::disk('galeriaE')->delete($imagen);

        }else{
            $newBanner = new GalEscuela();
            $newBanner->imagen=$imagen;
            $newBanner->descripcion=$descripcion;
            $newBanner->activo=$estado;
            $newBanner->borrado='0';            
            $newBanner->escuela_id=$escuela_id;
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
        $result = '1';
        $msj = '';
        $selector = '';

        $idGalEscuela = $request->idGalEscuela;
        $img = $request->imagen;
        $editDescripcion = $request->editDescripcion;
        $editEstado = $request->editEstado;
        $escuela_id=$request->escuela_id;
        
       
        $imagen = "";
        $segureImg = 0;

        $oldImagen = $request->oldImagen;

        if ($request->hasFile('imagen')) {

            $aux = date('d-m-Y') . '-' . date('H-i-s');;
            $input  = array('image' => $img);
            $reglas = array('image' => 'required|image|mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE');
            $validator = Validator::make($input, $reglas);

            if ($validator->fails()) {
                $segureImg = 1;
                $msj = "El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario";
                $result = '0';
                $selector = 'archivo';
            } else {

                if (strlen($oldImagen) > 0) {
                    Storage::disk('banners')->delete($oldImagen);
                }

                $extension = $img->getClientOriginalExtension();
                $nuevoNombre = $aux . "." . $extension;
                $subir = Storage::disk('galeriaE')->put($nuevoNombre, \File::get($img));

                if ($subir) {
                    $imagen = $nuevoNombre;
                } else {
                    $msj = "Error al subir la imagen, intentelo nuevamente luego";
                    $segureImg = 1;
                    $result = '0';
                    $selector = 'archivo';
                }
            }
        }

        if ($segureImg == 1) {
            Storage::disk('galeriaE')->delete($imagen);
        } else {

            $editBanner = GalEscuela::findOrFail($idGalEscuela);

            if (strlen($imagen) == 0) {

                
                $editBanner->descripcion = $editDescripcion;
                $editBanner->activo = $editEstado;
                $editBanner->escuela_id=$escuela_id;
                $editBanner->save();
            } else {

                $editBanner->imagen = $imagen;
                $editBanner->descripcion = $editDescripcion;                
                $editBanner->activo = $editEstado;
            $editBanner->escuela_id=$escuela_id;
                $editBanner->save();
            }

            $msj = 'El Banner fue modificada con éxito';
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
        $consulta1 = DB::table('galescuelas as ge')
            ->join('escuelas as e', 'e.id', '=', 'ge.escuela_id')
            ->where('ge.escuela_id', $id)
            ->count();
        if ($consulta1 > 0) {
            $result = '0';
            $msj='No se puede eliminar bannersescuelas enlazados con otras entidades';
        } else {
            $borrar = GalEscuela::findOrFail($id);
            $borrar->borrado = '1';
            $borrar->save();
            $msj = 'Facultad fue eliminada exitosamente';
        }

        return response()->json(["result" => $result, 'msj' => $msj]);
    }
    public function altabaja($id, $estado)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = GalEscuela::findOrFail($id);
        $update->activo = $estado;
        
        $update->save();

        if (strval($estado) == "0") {
            $msj = 'La galeria de escuela fue Desactivado exitosamente.';
        } elseif (strval($estado) == "1") {
            $msj = 'La galeria de escuela fue Activado exitosamente.';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
