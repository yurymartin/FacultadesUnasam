<?php

namespace App\Http\Controllers;

use App\Alumnos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use DB;
use Storage;
use App\User;
use App\Persona;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['permission:create alumnos'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read alumnos'], ['only' => ['index1', 'index']]);
        $this->middleware(['permission:update alumnos'], ['only' => ['edit', 'update', 'altabaja']]);
        $this->middleware(['permission:delete alumnos'], ['only' => ['delete']]);
    }

    public function index1()
    {
        $modulo = "alumnos";
        return view('alumnos.index', compact('modulo'));
    }
    public function index(Request $request)
    {
        $buscar = $request->busca;
        $alumnos = DB::table('alumnos as a')
            ->join('comiestudiantiles as c', 'c.id', '=', 'a.comiestudiantil_id')
            ->join('personas as p', 'p.id', '=', 'a.persona_id')
            ->join('facultades as f', 'f.id', '=', 'a.facultad_id')
            ->where('a.borrado', '0')
            ->where(function ($query) {
                if (!auth()->user()->hasRole('super-admin')) {
                    $query->where('a.facultad_id', '=', auth()->user()->facultad_id);
                }
            })
            ->where(function ($query) use ($buscar) {
                $query->where('p.dni', 'like', '%' . $buscar . '%');
                $query->orWhere('p.nombres', 'like', '%' . $buscar . '%');
                $query->orWhere('p.apellidos', 'like', '%' . $buscar . '%');
            })
            ->orderBy('p.nombres')
            ->select('a.id as idalu', 'p.id as idper', 'p.dni', 'p.nombres', 'p.apellidos', 'p.genero', 'p.foto', 'c.titulo', 'a.activo', 'c.id as idcomi', 'a.facultad_id', 'f.id as idfac', 'f.nombre', 'f.abreviatura')
            ->paginate(10);

        $comiestudiantiles = DB::table('comiestudiantiles')
            ->where('borrado', '0')
            ->get();

        $facultades = DB::table('facultades')
            ->where(function ($query) {
                if (!auth()->user()->hasRole('super-admin')) {
                    $query->where('id', '=', auth()->user()->facultad_id);
                }
            })
            ->where('activo', '1')
            ->where('borrado', '0')
            ->get();

        $personas = Persona::get();
        return [
            'pagination' => [
                'total' => $alumnos->total(),
                'current_page' => $alumnos->currentPage(),
                'per_page' => $alumnos->perPage(),
                'last_page' => $alumnos->lastPage(),
                'from' => $alumnos->firstItem(),
                'to' => $alumnos->lastItem(),
            ],
            'alumnos' => $alumnos,
            'comiestudiantiles' => $comiestudiantiles,
            'personas' => $personas,
            'facultades' => $facultades
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

        $facultad_id = $request->facultad_id;
        $dni = $request->dni;
        $nombres = $request->nombres;
        $apellidos = $request->apellidos;
        $img = $request->imagen;
        $genero = $request->genero;

        $estado = $request->estado;
        $comiestudiantil_id = $request->comiestudiantil_id;


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

        if ($facultad_id == '0') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA FACULTAD';
            $selector = 'facultad_id';
        } else if ($validator1->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL DNI DEL ALUMNO O EL DNI TIENE MAS DE 8 DIGITOS';
            $selector = 'dni';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LOS NOMBRES DEL ALUMNO';
            $selector = 'nombres';
        } else if ($validator3->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LOS APELLIDOS DEL ALUMNO';
            $selector = 'apellidos';
        } else if ($comiestudiantil_id == 0) {
            $result = '0';
            $msj = 'DEBES SELECCIONAR EL COMITE ESTUDIANTIL AL QUE PERTENECE EL ALUMNO';
            $selector = 'comite';
        } else if ($img == 'null') {
            $result = '0';
            $msj = 'FALTA INGRESAR LA FOTO DEL ALUMNO';
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
                    //$subir = true;
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

                $docente = new Alumnos();
                $docente->activo = $estado;
                $docente->borrado = '0';
                $docente->persona_id = $persona->id;
                $docente->comiestudiantil_id  = $comiestudiantil_id;
                $docente->facultad_id = $facultad_id;
                $docente->save();
                $msj = 'EL ALUMNO FUE REGISTRADO EXITOSAMENTE';
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

        $idPersona = $request->idper;
        $idalumno = $request->idalu;

        $facultad_id = $request->facultad_id;
        $dni = $request->dni;
        $nombres = $request->nombres;
        $apellidos = $request->apellidos;
        $img = $request->imagen;
        $genero = $request->genero;

        $comiestudiantil_id = $request->comiestudiantil_id;


        $imagen = "";

        $input1  = array('dni' => $dni);
        $reglas1 = array('dni' => 'required|max:8');
        $validator1 = Validator::make($input1, $reglas1);

        $input2  = array('nombres' => $nombres);
        $reglas2 = array('nombres' => 'required');
        $validator2 = Validator::make($input2, $reglas2);

        $input3  = array('apellidos' => $apellidos);
        $reglas3 = array('apellidos' => 'required');
        $validator3 = Validator::make($input3, $reglas3);


        if ($facultad_id == '0') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA FACULTAD';
            $selector = 'facultad_id';
        } else if ($validator1->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL DNI O EL DNI TIENE MAS DE 8 DIGITOS';
            $selector = 'dniE';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LOS NOMBRES DEL ALUMNO';
            $selector = 'nombresE';
        } else if ($validator3->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LOS APELLIDOS DEL ALUMNO';
            $selector = 'ApellidosE';
        } else if ($comiestudiantil_id == 0) {
            $result = '0';
            $msj = 'DEBE SELECCIONAR UN COMITE ESTUDIANTIL';
            $selector = 'cdCargoE';
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
            $persona = Persona::findOrFail($idPersona);
            $docente = Alumnos::findOrFail($idalumno);
            if ($request->hasFile('imagen')) {
                $persona->dni = $dni;
                $persona->nombres = $nombres;
                $persona->apellidos = $apellidos;
                $persona->foto = $imagen;
                $persona->genero = $genero;
                $persona->save();

                $docente->comiestudiantil_id  = $comiestudiantil_id;
                $docente->facultad_id = $facultad_id;
                $docente->save();
            } else {
                $persona->dni = $dni;
                $persona->nombres = $nombres;
                $persona->apellidos = $apellidos;
                $persona->genero = $genero;
                $persona->save();

                $docente->comiestudiantil_id  = $comiestudiantil_id;
                $docente->facultad_id = $facultad_id;
                $docente->save();
            }

            $msj = 'EL ALUMNO FUE MODIFICADO EXITOSAMENTE';
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
        $borrar = Alumnos::findOrFail($id);
        $borrar->borrado = '1';
        $borrar->save();
        $msj = 'EL ALUMNO FUE ELIMINADO EXITOSAMENTE';
        return response()->json(["result" => $result, 'msj' => $msj]);
    }

    public function altabaja($id, $activo)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = Alumnos::findOrFail($id);
        $update->activo = $activo;
        $update->save();

        if (strval($activo) == "0") {
            $msj = 'EL ALUMNO FUE DESACTIVADO EXITOSAMENTE';
        } elseif (strval($activo) == "1") {
            $msj = 'EL ALUMNO FUE ACTIVADO EXITOSAMENTE';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
