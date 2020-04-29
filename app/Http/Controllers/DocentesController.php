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

    public function __construct()
    {
        $this->middleware(['permission:create docentes'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read docentes'], ['only' => ['index1', 'index']]);
        $this->middleware(['permission:update docentes'], ['only' => ['edit', 'update', 'altabaja']]);
        $this->middleware(['permission:delete docentes'], ['only' => ['delete']]);
    }

    public function index1()
    {
        $modulo = "docentes";
        return view('docentes.index', compact('modulo'));
    }
    public function index(Request $request)
    {
        $buscar = $request->busca;
        $docentes = DB::table('docentes as d')
            ->join('gradoacademicos as ga', 'ga.id', '=', 'd.gradoacademico_id')
            ->join('categoriadocentes as cd', 'cd.id', '=', 'd.categoriadocente_id')
            ->join('personas as p', 'p.id', '=', 'd.persona_id')
            ->join('departamentoacademicos as dp', 'dp.id', '=', 'd.departamentoacademico_id')
            ->where(function ($query) {
                if (!auth()->user()->hasRole('super-admin')) {
                    $query->where('dp.facultad_id', '=', auth()->user()->facultad_id);
                }
            })
            ->where('d.borrado', '0')
            ->where(function ($query) use ($buscar) {
                $query->where('p.dni', 'like', '%' . $buscar . '%');
                $query->orWhere('p.nombres', 'like', '%' . $buscar . '%');
                $query->orWhere('p.apellidos', 'like', '%' . $buscar . '%');
            })
            ->orderBy('p.nombres')
            ->select('d.id as iddoc', 'p.id as idper', 'p.dni', 'p.nombres', 'p.apellidos', 'p.genero', 'p.foto', 'ga.grado', 'cd.categoria', 'd.tituloprofe', 'd.fechaingreso', 'd.activo', 'ga.id as idgrado', 'cd.id as idcat', 'd.departamentoacademico_id', 'dp.id as idfac', 'dp.nombre as nombredep')
            ->paginate(10);

        $categoriadocentes = CategoriaDocentes::where('borrado', '0')
            ->where('activo', '=', '1')
            ->get();

        $gradoacademicos = DB::table('gradoacademicos')
            ->where('borrado', '0')
            ->where('activo', '=', '1')
            ->get();

        $departamentoacademicos = DB::table('departamentoacademicos')
            ->where('activo', '1')
            ->where('borrado', '0')
            ->where(function ($query) {
                if (!auth()->user()->hasRole('super-admin')) {
                    $query->where('facultad_id', '=', auth()->user()->facultad_id);
                }
            })
            ->get();

        $personas = Persona::get();
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
            'gradoacademicos' => $gradoacademicos,
            'personas' => $personas,
            'departamentoacademicos' => $departamentoacademicos
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
        $result = '1';
        $msj = '';
        $selector = '';

        $departamentoacademico_id = $request->departamentoacademico_id;
        $dni = $request->dni;
        $nombres = $request->nombres;
        $apellidos = $request->apellidos;
        $img = $request->imagen;
        $genero = $request->genero;
        $tituloprofe = $request->tituloprofe;
        $fechaingreso = $request->fechaingreso;
        $estado = $request->estado;
        $gradoacademico_id = $request->gradoacademico_id;
        $categoriadocente_id = $request->categoriadocente_id;


        $imagen = "";
        $segureImg = 0;

        $input1  = array('dni' => $dni);
        $reglas1 = array('dni' => 'required|max:8');
        $validator1 = Validator::make($input1, $reglas1);

        $input2  = array('nombres' => $nombres);
        $reglas2 = array('nombres' => 'required');
        $validator2 = Validator::make($input2, $reglas2);

        $input3  = array('apellidos' => $apellidos);
        $reglas3 = array('apellidos' => 'required');
        $validator3 = Validator::make($input3, $reglas3);

        if ($departamentoacademico_id == '0') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR EL DEPARTAMENTO ACADEMICO';
            $selector = 'departamentoacademico_id';
        } else if ($validator1->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL DNI DEL DOCENTE ';
            $selector = 'dni';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LOS NOMBRES DEL DOCENTE';
            $selector = 'nombres';
        } else if ($validator3->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LOS APELLIDOS DEL DOCENTE';
            $selector = 'apellidos';
        } else if ($gradoacademico_id == 0) {
            $result = '0';
            $msj = 'FALTA SELECCIONAR EL GRADO ACADEMICO DEL DOCENTE';
            $selector = 'cbGrado';
        } else if ($categoriadocente_id == 0) {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA CATEGORIA ALA QUE PERTENECE EL DOCENTE';
            $selector = 'cbcategoria';
        } else if ($img == 'null') {
            $result = '0';
            $msj = 'FALTA COMPLETAR LA FOTO DEL DOCENTE';
            $selector = 'archivo';
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
                    $subir = Storage::disk('personas')->put($nuevoNombre, \File::get($img));
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
                Storage::disk('personas')->delete($imagen);
            } else {
                $persona = new Persona();
                $persona->dni = $dni;
                $persona->nombres = $nombres;
                $persona->apellidos = $apellidos;
                $persona->foto = $imagen;
                $persona->genero = $genero;
                $persona->save();

                $docente = new Docentes();
                $docente->curricula = '';
                $docente->tituloprofe = $tituloprofe;
                $docente->fechaingreso = $fechaingreso;
                $docente->activo = $estado;
                $docente->borrado = '0';
                $docente->gradoacademico_id  = $gradoacademico_id;
                $docente->categoriadocente_id  = $categoriadocente_id;
                $docente->persona_id  = $persona->id;
                $docente->departamentoacademico_id = $departamentoacademico_id;
                $docente->save();

                $msj = 'EL NUEVO DOCENTE FUE REGISTRADO EXITOSAMENTE';
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

        $idPersona = $request->idPersona;
        $idDocente = $request->idDocente;

        $departamentoacademico_id = $request->departamentoacademico_id;
        $dni = $request->dni;
        $nombres = $request->nombres;
        $apellidos = $request->apellidos;
        $img = $request->imagen;
        $genero = $request->genero;
        $tituloprofe = $request->tituloprofe;
        $fechaingreso = $request->fechaingreso;
        $gradoacademico_id = $request->gradoacademico_id;
        $categoriadocente_id = $request->categoriadocente_id;


        $imagen = "";
        $segureImg = 0;

        $oldImagen = $request->oldImagen;

        $input1  = array('dni' => $dni);
        $reglas1 = array('dni' => 'required|max:8');
        $validator1 = Validator::make($input1, $reglas1);

        $input2  = array('nombres' => $nombres);
        $reglas2 = array('nombres' => 'required');
        $validator2 = Validator::make($input2, $reglas2);

        $input3  = array('apellidos' => $apellidos);
        $reglas3 = array('apellidos' => 'required');
        $validator3 = Validator::make($input3, $reglas3);


        if ($validator1->fails()) {
            $result = '0';
            $msj = 'Complete el dni del docente';
            $selector = 'dniE';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'Complete los nombres del docente';
            $selector = 'nombresE';
        } else if ($validator3->fails()) {
            $result = '0';
            $msj = 'Complete los apellidos del docente';
            $selector = 'apellidosE';
        } else if ($gradoacademico_id == 0) {
            $result = '0';
            $msj = 'Seleccione el grado del docente';
            $selector = 'cbGradoE';
        } else if ($categoriadocente_id == 0) {
            $result = '0';
            $msj = 'Seleccione la categoria del docente';
            $selector = 'cbcategoriaE';
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

                    if (strlen($oldImagen) > 0) {
                        Storage::disk('persona')->delete($oldImagen);
                    }

                    $extension = $img->getClientOriginalExtension();
                    $nuevoNombre = $aux . "." . $extension;
                    $subir = Storage::disk('personas')->put($nuevoNombre, \File::get($img));
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
                Storage::disk('personas')->delete($imagen);
            } else {
                $persona = Persona::findOrFail($idPersona);
                $docente = Docentes::findOrFail($idDocente);
                if ($request->hasFile('imagen')) {
                    $persona->dni = $dni;
                    $persona->nombres = $nombres;
                    $persona->apellidos = $apellidos;
                    $persona->foto = $imagen;
                    $persona->genero = $genero;
                    $persona->save();

                    $docente->tituloprofe = $tituloprofe;
                    $docente->fechaingreso = $fechaingreso;
                    $docente->gradoacademico_id  = $gradoacademico_id;
                    $docente->categoriadocente_id  = $categoriadocente_id;
                    $docente->save();
                } else {
                    $persona->dni = $dni;
                    $persona->nombres = $nombres;
                    $persona->apellidos = $apellidos;
                    $persona->genero = $genero;
                    $persona->save();

                    $docente->tituloprofe = $tituloprofe;
                    $docente->fechaingreso = $fechaingreso;
                    $docente->gradoacademico_id  = $gradoacademico_id;
                    $docente->categoriadocente_id  = $categoriadocente_id;
                    $docente->departamentoacademico_id = $departamentoacademico_id;
                    $docente->save();
                }
                $msj = 'EL DOCENTE FUE MODIFICADO EXITOSAMENTE';
            }
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }

    public function altabaja($id, $activo)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = Docentes::findOrFail($id);
        $update->activo = $activo;
        $update->save();

        if (strval($activo) == "0") {
            $msj = 'EL DOCENTE FUE DESACTIVADO EXITOSAMENTE';
        } elseif (strval($activo) == "1") {
            $msj = 'EL DOCENTE FUE ACTIVADO EXITOSAMENTE';
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
        $consulta = DB::table('investigacion')
            ->where('docente_id', '=', $id)
            ->count();

        if ($consulta > 0) {
            $result = '0';
            $msj = "NO SE PUEDE ELIMINAR EL DOCENTE PORQUE CAUSARIA PROBLEMAS EN EL SISTEMA";
        } else {
            $borrar = Docentes::findOrFail($id);
            $borrar->borrado = '1';
            $borrar->save();
            $msj = 'EL DOCENTE FUE ELIMINADO EXITOSAMENTE';
        }
        return response()->json(["result" => $result, 'msj' => $msj]);
    }
}
