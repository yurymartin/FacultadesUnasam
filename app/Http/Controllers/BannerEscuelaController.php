<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BannerEscuela;
use App\Escuela;
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
        if (accesoUser([1, 2])) {

            $idtipouser = Auth::user()->tipouser_id;
            $tipouser = Tipouser::find($idtipouser);
            $modulo = "bannersescuelas";
            return view('bannerescuela.index', compact('tipouser', 'modulo'));
        } else {
            return view('adminlte::home');
        }
    }
    public function index(Request $request)
    {

        $buscar = $request->busca;

        $bannersescuelas = DB::table('bannersescuelas as be')
            ->join('escuelas as e', 'e.id', '=', 'be.escuela_id')
            ->select('be.id', 'be.titulo', 'be.descripcion', 'e.nombre', 'be.imagen', 'be.fechapublica', 'be.activo', 'e.id as idescu')
            ->where('be.borrado', '0')
            ->where(function ($query) use ($buscar) {
                $query->where('be.titulo', 'like', '%' . $buscar . '%');
                $query->orWhere('be.descripcion', 'like', '%' . $buscar . '%');
                $query->orWhere('e.nombre', 'like', '%' . $buscar . '%');
            })
            ->orderBy('be.id', 'desc')
            ->paginate(10);

        $escuelas = Escuela::where('borrado', '0')
            ->where('activo', '=', '1')
            ->get();

        return [
            'pagination' => [
                'total' => $bannersescuelas->total(),
                'current_page' => $bannersescuelas->currentPage(),
                'per_page' => $bannersescuelas->perPage(),
                'last_page' => $bannersescuelas->lastPage(),
                'from' => $bannersescuelas->firstItem(),
                'to' => $bannersescuelas->lastItem(),
            ],
            'bannersescuelas' => $bannersescuelas,
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
        $titulo = $request->titulo;
        $descripcion = $request->descripcion;
        $img = $request->imagen;
        $estado = $request->activo;
        $escuela_id = $request->escuela_id;

        $result = '1';
        $msj = '';
        $selector = '';

        $imagen = "";
        $segureImg = 0;


        if ($titulo == null) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL TITULO DEL BANNER DE LA ESCUELA';
            $selector = 'txttitulo';
        } else if ($descripcion == null) {
            $result = '0';
            $msj = 'FALTA INGRESAR LA DESCRIPCION DEL BANNER DE LA ESCUELA';
            $selector = 'txtdescripcion';
        } else if ($img == 'null') {
            $result = '0';
            $msj = 'FALTA INGRESAR EL BANNER DE LA ESCUELA';
            $selector = 'archivo';
        } else if ($escuela_id == 0) {
            $result = '0';
            $msj = 'FALTA SELECCIONAR ALA ESCUELA QUE PERTENECE EL BANNER';
            $selector = 'cbescuela';
        } else {

            if ($request->hasFile('imagen')) {

                $aux = date('d-m-Y') . '-' . date('H-i-s');
                $input  = array('image' => $img);
                $reglas = array('image' => 'required|image|mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE');
                $validator = Validator::make($input, $reglas);

                if ($validator->fails()) {
                    $segureImg = 1;
                    $msj = "El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario";
                    $result = '0';
                    $selector = 'archivo';
                } else {

                    $extension = $img->getClientOriginalExtension();
                    $nuevoNombre = $aux . "." . $extension;
                    $subir = Storage::disk('bannersE')->put($nuevoNombre, \File::get($img));

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

                Storage::disk('bannersE')->delete($imagen);
            } else {
                $newBanner = new BannerEscuela();
                $newBanner->titulo = $titulo;
                $newBanner->descripcion = $descripcion;
                $newBanner->imagen = $imagen;
                $newBanner->fechapublica = date('Y/m/d');
                $newBanner->escuela_id = $escuela_id;
                $newBanner->activo = $estado;
                $newBanner->borrado = '0';

                $newBanner->save();

                $msj = 'EL NUEVO BANNER FUE REGISTRADO EXITOSAMENTE';
            }
        }

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
        $result = '1';
        $msj = '';
        $selector = '';

        $idBanner = $request->idBanner;
        $editTitulo = $request->editTitulo;
        $editDescripcion = $request->editDescripcion;
        $escuela_id = $request->escuela_id;
        $img = $request->imagen;

        $imagen = "";
        $segureImg = 0;

        $oldImagen = $request->oldImagen;
        if ($editTitulo == null) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL TITULO DEL BANNER DE LA ESCUELA';
            $selector = 'txttitulo';
        } else if ($editDescripcion == null) {
            $result = '0';
            $msj = 'FALTA INGRESAR LA DESCRIPCION DEL BANNER DE LA ESCUELA';
            $selector = 'txtdescripcion';
        } else if ($escuela_id == 0) {
            $result = '0';
            $msj = 'FALTA SELECCIONAR ALA ESCUELA QUE PERTENECE EL BANNER';
            $selector = 'cbescuela';
        } else {
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
                    $subir = Storage::disk('bannersE')->put($nuevoNombre, \File::get($img));

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
                Storage::disk('bannersE')->delete($imagen);
            } else {

                $editGalEscu = BannerEscuela::findOrFail($idBanner);

                if (strlen($imagen) == 0) {

                    $editGalEscu->titulo = $editTitulo;
                    $editGalEscu->descripcion = $editDescripcion;
                    $editGalEscu->escuela_id = $escuela_id;
                    $editGalEscu->save();
                } else {

                    $editGalEscu->titulo = $editTitulo;
                    $editGalEscu->descripcion = $editDescripcion;
                    $editGalEscu->imagen = $imagen;
                    $editGalEscu->fechapublica = date('Y/m/d');
                    $editGalEscu->escuela_id = $escuela_id;
                    $editGalEscu->save();
                }

                $msj = 'EL BANNER FUE MODIFICADO EXITOSAMENTE';
            }
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

        $borrar = BannerEscuela::findOrFail($id);
        $borrar->borrado = '1';
        $borrar->save();
        $msj = 'EL BANNER FUE ELIMINADO EXITOSAMENTE';

        return response()->json(["result" => $result, 'msj' => $msj]);
    }

    public function altabaja($id, $estado)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = BannerEscuela::findOrFail($id);
        $update->activo = $estado;

        $update->save();

        if (strval($estado) == "0") {
            $msj = 'EL BANNER FUE DESACTIVADO EXITOSAMENTE';
        } elseif (strval($estado) == "1") {
            $msj = 'EL BANNER FUE ACTIVADO EXITOSAMENTE';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
