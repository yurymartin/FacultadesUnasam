<?php

namespace App\Http\Controllers;

use App\Autoridades;
use App\BannersFacultades;
use App\DescripcionEscuelas;
use App\DescripcionFacultades;

use App\DocumentoFacultades;
use App\Escuela;
use App\EventoFacultades;
use App\GaleriaFacultades;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Investigaciones;
use App\Libros;
use App\NoticiaFacultades;
use App\Organigrama;
use App\VideoFacultades;
use App\Temas;
use App\Cargo;
use App\CategoriaDocentes;
use App\Estilo;
use App\Facultades;
use App\Publicacion;
use App\RedesFacultad;
use App\Tipopublicacion;
use App\User;
use DB;
use Auth;
use Carbon\Carbon;



class IndexWebController extends Controller
{
    public function inicio()
    {
        $facultad = DB::table('descripcionfacultades as df')
            ->join('facultades as f', 'f.id', '=', 'df.facultad_id')
            ->select('df.id', 'df.imagen', 'f.id as idfac', 'f.nombre', 'f.abreviatura')
            ->where('f.activo', '=', '1')
            ->orderBy('df.id', 'asc')
            ->get();

        return view('web.inicio', ['facultades' => $facultad]);
    }

    public function Index($idfacultad)
    {
        $BannersFacultades = BannersFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->get();

        $noticias = NoticiaFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        $eventos = EventoFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        $misionvision = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->latest()
            ->first();

        $galeriaFacultades = GaleriaFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->take(8)
            ->get();

        $carrerasprofesionales = DB::table('descripcionescuelas as de')
            ->join('escuelas as e', 'e.id', '=', 'de.escuela_id')
            ->join('departamentoacademicos as da', 'da.id', '=', 'e.departamentoacademico_id')
            ->where('da.facultad_id', '=', $idfacultad)
            ->where('de.borrado', '=', '0')
            ->where('de.activo', '=', '1')
            ->orderBy('de.id', 'desc')
            ->get();

        $videosFacultades = VideoFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->take(4)
            ->get();

        $documentos = DocumentoFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->take(8)
            ->get();

        $autoridades = DB::table('autoridades as a')
            ->join('cargos as c', 'c.id', '=', 'a.cargo_id')
            ->join('personas as p', 'p.id', '=', 'a.persona_id')
            ->join('facultades as f', 'f.id', '=', 'c.facultad_id')
            ->where('a.borrado', '0')
            ->where('c.facultad_id', '=', $idfacultad)
            ->select('a.id as idauto', 'p.id as idper', 'p.dni', 'p.nombres', 'p.apellidos', 'p.genero', 'p.foto', 'c.cargo', 'a.descripcion', 'a.fechainicio', 'a.fechafin', 'a.activo', 'c.id as idcargo', 'f.id as idfac', 'f.nombre', 'f.abreviatura')
            ->orderBy('a.id', 'desc')
            ->get();

        $logos = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->first();

        $escuelas = DB::table('escuelas as e')
            ->join('departamentoacademicos as da', 'da.id', '=', 'e.departamentoacademico_id')
            ->select('e.id', 'e.nombre', 'da.facultad_id')
            ->where('da.facultad_id', '=', $idfacultad)
            ->where('e.borrado', '0')
            ->where('e.activo', '=', '1')
            ->orderBy('e.id', 'desc')
            ->get();

        $cargosAutoridades = DB::table('autoridades as a')
            ->join('cargos as c', 'c.id', '=', 'a.cargo_id')
            ->select('a.id', 'a.descripcion', 'a.fechainicio', 'a.fechafin', 'a.cargo_id', 'c.id as idcargo', 'c.cargo', 'c.descripcion', 'c.facultad_id')
            ->where('a.borrado', '0')
            ->where('a.activo', '=', '1')
            ->where('c.facultad_id', '=', $idfacultad)
            ->orderBy('a.id', 'asc')
            ->get();

        $estilos = Estilo::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        $facultad = Facultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        $redesfacultades = RedesFacultad::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->first();

        //d($redesfacultades);

        return view('web.index', ['BannersFacultades' => $BannersFacultades, 'noticias' => $noticias, 'eventos' => $eventos, 'misionvision' => $misionvision, 'galeriaFacultades' => $galeriaFacultades, 'carrerasprofesionales' => $carrerasprofesionales, 'videosFacultades' => $videosFacultades, 'autoridades' => $autoridades, 'documentos' => $documentos, 'logos' => $logos, 'escuelas' => $escuelas, 'cargosAutoridades' => $cargosAutoridades, 'estilos' => $estilos, 'facultad' => $facultad, 'redesfacultades' => $redesfacultades]);
    }

    public function historiaF($idfacultad)
    {
        $historia = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->latest()
            ->first();

        $logos = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->latest()
            ->first();

        $escuelas = DB::table('escuelas as e')
            ->join('departamentoacademicos as da', 'da.id', '=', 'e.departamentoacademico_id')
            ->select('e.id', 'e.nombre', 'da.facultad_id')
            ->where('da.facultad_id', '=', $idfacultad)
            ->where('e.borrado', '0')
            ->where('e.activo', '=', '1')
            ->orderBy('e.id', 'desc')
            ->get();

        $cargosAutoridades = DB::table('autoridades as a')
            ->join('cargos as c', 'c.id', '=', 'a.cargo_id')
            ->select('a.id', 'a.descripcion', 'a.fechainicio', 'a.fechafin', 'a.cargo_id', 'c.id as idcargo', 'c.cargo', 'c.descripcion', 'c.facultad_id')
            ->where('a.borrado', '0')
            ->where('a.activo', '=', '1')
            ->where('c.facultad_id', '=', $idfacultad)
            ->orderBy('a.id', 'asc')
            ->get();

        $estilos = Estilo::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        $redesfacultades = RedesFacultad::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->first();

        $facultad = Facultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        return view('web.historia', ['historia' => $historia, 'logos' => $logos, 'escuelas' => $escuelas, 'cargosAutoridades' => $cargosAutoridades, 'estilos' => $estilos, 'redesfacultades' => $redesfacultades, 'facultad' => $facultad]);
    }

    //FALTA VIEW
    public function departacademico()
    {
        $departacademico = DB::table('autoridades as a')
            ->join('cargos as c', 'c.id', '=', 'a.cargo_id')
            ->join('personas as p', 'p.id', '=', 'a.persona_id')
            ->where('a.borrado', '0')
            ->where('c.cargo', '=', 'JEFE DE DEPARTAMENTO')
            ->orderBy('a.id')
            ->select('a.id as idauto', 'p.id as idper', 'p.dni', 'p.nombres', 'p.apellidos', 'p.genero', 'p.foto', 'c.cargo', 'a.descripcion', 'a.fechainicio', 'a.fechafin', 'a.activo', 'c.id as idcargo')
            ->get();

        $logos = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->latest()
            ->first();

        $escuelas = Escuela::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->get();

        $estilos = Estilo::first();

        $redesfacultades = RedesFacultad::first();

        $facultad = Facultades::first();

        return view('web.departacademico', ['logos' => $logos, 'departacademico' => $departacademico, 'escuelas' => $escuelas, 'estilos' => $estilos, 'redesfacultades' => $redesfacultades, 'facultad' => $facultad]);
    }

    public function misionvision($idfacultad)
    {
        $logos = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', $idfacultad)
            ->orderBy('id', 'desc')
            ->latest()
            ->first();

        $misionvision = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', $idfacultad)
            ->orderBy('id', 'desc')
            ->latest()
            ->first();

        $escuelas = DB::table('escuelas as e')
            ->join('departamentoacademicos as da', 'da.id', '=', 'e.departamentoacademico_id')
            ->select('e.id', 'e.nombre', 'da.facultad_id')
            ->where('da.facultad_id', '=', $idfacultad)
            ->where('e.borrado', '0')
            ->where('e.activo', '=', '1')
            ->orderBy('e.id', 'desc')
            ->get();


        $cargosAutoridades = DB::table('autoridades as a')
            ->join('cargos as c', 'c.id', '=', 'a.cargo_id')
            ->select('a.id', 'a.descripcion', 'a.fechainicio', 'a.fechafin', 'a.cargo_id', 'c.id as idcargo', 'c.cargo', 'c.descripcion', 'c.facultad_id')
            ->where('a.borrado', '0')
            ->where('a.activo', '=', '1')
            ->where('c.facultad_id', '=', $idfacultad)
            ->orderBy('a.id', 'asc')
            ->get();

        $estilos = Estilo::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        $redesfacultades = RedesFacultad::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->first();

        $facultad = Facultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        return view('web.misionvision', ['misionvision' => $misionvision, 'logos' => $logos, 'escuelas' => $escuelas, 'cargosAutoridades' => $cargosAutoridades, 'estilos' => $estilos, 'redesfacultades' => $redesfacultades, 'facultad' => $facultad]);
    }

    public function filosofia($idfacultad)
    {
        $filosofia = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', $idfacultad)
            ->orderBy('id', 'desc')
            ->first();

        $logos = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', $idfacultad)
            ->orderBy('id', 'desc')
            ->first();

        $escuelas = DB::table('escuelas as e')
            ->join('departamentoacademicos as da', 'da.id', '=', 'e.departamentoacademico_id')
            ->select('e.id', 'e.nombre', 'da.facultad_id')
            ->where('da.facultad_id', '=', $idfacultad)
            ->where('e.borrado', '0')
            ->where('e.activo', '=', '1')
            ->orderBy('e.id', 'desc')
            ->get();

        $cargosAutoridades = DB::table('autoridades as a')
            ->join('cargos as c', 'c.id', '=', 'a.cargo_id')
            ->select('a.id', 'a.descripcion', 'a.fechainicio', 'a.fechafin', 'a.cargo_id', 'c.id as idcargo', 'c.cargo', 'c.descripcion', 'c.facultad_id')
            ->where('a.borrado', '0')
            ->where('a.activo', '=', '1')
            ->where('c.facultad_id', '=', $idfacultad)
            ->orderBy('a.id', 'asc')
            ->get();

        $estilos = Estilo::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        $redesfacultades = RedesFacultad::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->first();

        $facultad = Facultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        return view('web.filosofia', ['filosofia' => $filosofia, 'logos' => $logos, 'escuelas' => $escuelas, 'cargosAutoridades' => $cargosAutoridades, 'estilos' => $estilos, 'redesfacultades' => $redesfacultades, 'facultad' => $facultad]);
    }

    public function organigrama($idfacultad)
    {
        $logos = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', $idfacultad)
            ->orderBy('id', 'desc')
            ->first();

        $escuelas = DB::table('escuelas as e')
            ->join('departamentoacademicos as da', 'da.id', '=', 'e.departamentoacademico_id')
            ->select('e.id', 'e.nombre', 'da.facultad_id')
            ->where('da.facultad_id', '=', $idfacultad)
            ->where('e.borrado', '0')
            ->where('e.activo', '=', '1')
            ->orderBy('e.id', 'desc')
            ->get();

        $organigramas = Organigrama::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->latest()
            ->first();

        $cargosAutoridades = DB::table('autoridades as a')
            ->join('cargos as c', 'c.id', '=', 'a.cargo_id')
            ->select('a.id', 'a.descripcion', 'a.fechainicio', 'a.fechafin', 'a.cargo_id', 'c.id as idcargo', 'c.cargo', 'c.descripcion', 'c.facultad_id')
            ->where('a.borrado', '0')
            ->where('a.activo', '=', '1')
            ->where('c.facultad_id', '=', $idfacultad)
            ->orderBy('a.id', 'asc')
            ->get();

        $estilos = Estilo::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        $redesfacultades = RedesFacultad::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->first();

        $facultad = Facultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        return view('web.organigrama', ['logos' => $logos, 'escuelas' => $escuelas, 'organigramas' => $organigramas, 'cargosAutoridades' => $cargosAutoridades, 'estilos' => $estilos, 'redesfacultades' => $redesfacultades, 'facultad' => $facultad]);
    }

    public function publicacionesweb(Request $request, $idfacultad)
    {
        $buscar = $request->buscar;

        $tipopublicaciones = Tipopublicacion::where('borrado', '0')
            ->where('activo', '=', '1')
            ->get();

        $librosweb = DB::table('publicaciones as p')
            ->join('escuelas as e', 'e.id', '=', 'p.escuela_id')
            ->join('departamentoacademicos as da', 'da.id', '=', 'e.departamentoacademico_id')
            ->join('facultades as f', 'f.id', '=', 'da.facultad_id')
            ->where('p.borrado', '0')
            ->where('p.activo', '=', '1')
            ->where('p.tema_id', 'like', '%' . $buscar . '%')
            ->where('f.id', '=', $idfacultad)
            ->orderBy('f.id', 'desc')
            ->get();

        $temas = Temas::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->get();

        $logos = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->latest()
            ->first();

        $escuelas = DB::table('escuelas as e')
            ->join('departamentoacademicos as da', 'da.id', '=', 'e.departamentoacademico_id')
            ->select('e.id', 'e.nombre', 'da.facultad_id')
            ->where('da.facultad_id', '=', $idfacultad)
            ->where('e.borrado', '0')
            ->where('e.activo', '=', '1')
            ->orderBy('e.id', 'desc')
            ->get();

        $cargosAutoridades = DB::table('autoridades as a')
            ->join('cargos as c', 'c.id', '=', 'a.cargo_id')
            ->select('a.id', 'a.descripcion', 'a.fechainicio', 'a.fechafin', 'a.cargo_id', 'c.id as idcargo', 'c.cargo', 'c.descripcion', 'c.facultad_id')
            ->where('a.borrado', '0')
            ->where('a.activo', '=', '1')
            ->where('c.facultad_id', '=', $idfacultad)
            ->orderBy('a.id', 'asc')
            ->get();

        $estilos = Estilo::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        $redesfacultades = RedesFacultad::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->first();

        $facultad = Facultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        return view('web.librosweb', ['logos' => $logos, 'escuelas' => $escuelas, 'librosweb' => $librosweb, 'temas' => $temas, 'cargosAutoridades' => $cargosAutoridades, 'estilos' => $estilos, 'redesfacultades' => $redesfacultades, 'facultad' => $facultad, 'tipopublicaciones' => $tipopublicaciones]);
    }

    public function comestudiantil($idfacultad)
    {

        $logos = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->latest()
            ->first();

        $escuelas = DB::table('escuelas as e')
            ->join('departamentoacademicos as da', 'da.id', '=', 'e.departamentoacademico_id')
            ->select('e.id', 'e.nombre', 'da.facultad_id')
            ->where('da.facultad_id', '=', $idfacultad)
            ->where('e.borrado', '0')
            ->where('e.activo', '=', '1')
            ->orderBy('e.id', 'desc')
            ->get();

        $comiestudiantiles = DB::table('comiestudiantiles')
            ->where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->get();

        $alumnos = DB::table('alumnos as a')
            ->join('comiestudiantiles as ce', 'ce.id', '=', 'a.comiestudiantil_id')
            ->join('personas as p', 'p.id', '=', 'a.persona_id')
            ->join('facultades as f', 'f.id', '=', 'a.facultad_id')
            ->where('a.facultad_id', '=', $idfacultad)
            ->where('a.borrado', '0')
            ->where('a.activo', '=', '1')
            ->get();

        $cargosAutoridades = DB::table('autoridades as a')
            ->join('cargos as c', 'c.id', '=', 'a.cargo_id')
            ->select('a.id', 'a.descripcion', 'a.fechainicio', 'a.fechafin', 'a.cargo_id', 'c.id as idcargo', 'c.cargo', 'c.descripcion', 'c.facultad_id')
            ->where('a.borrado', '0')
            ->where('a.activo', '=', '1')
            ->where('c.facultad_id', '=', $idfacultad)
            ->orderBy('a.id', 'asc')
            ->get();

        $estilos = Estilo::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        $redesfacultades = RedesFacultad::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->first();

        $facultad = Facultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        return view('web.comestudiantil', ['logos' => $logos, 'escuelas' => $escuelas, 'comiestudiantiles' => $comiestudiantiles, 'alumnos' => $alumnos, 'cargosAutoridades' => $cargosAutoridades, 'estilos' => $estilos, 'redesfacultades' => $redesfacultades, 'facultad' => $facultad]);
    }

    public function contacto($idfacultad)
    {
        $logos = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->first();

        $escuelas = DB::table('escuelas as e')
            ->join('departamentoacademicos as da', 'da.id', '=', 'e.departamentoacademico_id')
            ->select('e.id', 'e.nombre', 'da.facultad_id')
            ->where('da.facultad_id', '=', $idfacultad)
            ->where('e.borrado', '0')
            ->where('e.activo', '=', '1')
            ->orderBy('e.id', 'desc')
            ->get();

        $cargosAutoridades = DB::table('autoridades as a')
            ->join('cargos as c', 'c.id', '=', 'a.cargo_id')
            ->select('a.id', 'a.descripcion', 'a.fechainicio', 'a.fechafin', 'a.cargo_id', 'c.id as idcargo', 'c.cargo', 'c.descripcion', 'c.facultad_id')
            ->where('a.borrado', '0')
            ->where('a.activo', '=', '1')
            ->where('c.facultad_id', '=', $idfacultad)
            ->orderBy('a.id', 'asc')
            ->get();

        $estilos = Estilo::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        $redesfacultades = RedesFacultad::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->first();

        $facultad = Facultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        return view('web.contacto', ['logos' => $logos, 'escuelas' => $escuelas, 'cargosAutoridades' => $cargosAutoridades, 'estilos' => $estilos, 'redesfacultades' => $redesfacultades, 'facultad' => $facultad]);
    }

    public function escuelas($idfacultad, $idescuela)
    {
        $bannerescuelas = DB::table('bannersescuelas as be')
            ->join('escuelas as e', 'e.id', '=', 'be.escuela_id')
            ->where('be.borrado', '0')
            ->where('be.activo', '=', '1')
            ->where('e.id', '=', $idescuela)
            ->orderBy('be.id', 'desc')
            ->get();


        $logos = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', $idfacultad)
            ->orderBy('id', 'desc')
            ->first();

        $escuelas = DB::table('escuelas as e')
            ->join('departamentoacademicos as da', 'da.id', '=', 'e.departamentoacademico_id')
            ->select('e.id', 'e.nombre', 'da.facultad_id')
            ->where('da.facultad_id', '=', $idfacultad)
            ->where('e.borrado', '0')
            ->where('e.activo', '=', '1')
            ->orderBy('e.id', 'desc')
            ->get();

        $descripciones  = DB::table('descripcionescuelas as ne')
            ->join('escuelas as e', 'e.id', '=', 'ne.escuela_id')
            ->where('ne.activo', '=', '1')
            ->where('ne.borrado', '0')
            ->where('e.id', '=', $idescuela)
            ->select('ne.id', 'ne.descripcion', 'e.nombre', 'ne.gradoacade', 'ne.tituloprofesional', 'ne.duracion', 'ne.logo')
            ->orderBy('ne.id', 'desc')
            ->first();

        $campoLaborales = DB::table('campolaborales as ne')
            ->join('escuelas as e', 'e.id', '=', 'ne.escuela_id')
            ->where('ne.activo', '=', '1')
            ->where('ne.borrado', '0')
            ->where('e.id', '=', $idescuela)
            ->orderBy('ne.id', 'desc')
            ->get();

        $perfiles = DB::table('perfiles as ne')
            ->join('escuelas as e', 'e.id', '=', 'ne.escuela_id')
            ->where('ne.activo', '=', '1')
            ->where('ne.borrado', '0')
            ->where('e.id', '=', $idescuela)
            ->select('ne.descripcion', 'ne.perfil')
            ->orderBy('ne.id', 'desc')
            ->get();

        $mallas = DB::table('mallas as m')
            ->join('escuelas as e', 'e.id', '=', 'm.escuela_id')
            ->where('m.activo', '=', '1')
            ->where('m.borrado', '0')
            ->where('e.id', '=', $idescuela)
            ->select('m.imagen', 'm.numcurricula')
            ->orderBy('m.id', 'desc')
            ->first();

        $galeriaEscuelas = DB::table('galeriaescuelas as m')
            ->join('escuelas as e', 'e.id', '=', 'm.escuela_id')
            ->where('m.activo', '=', '1')
            ->where('m.borrado', '0')
            ->where('e.id', '=', $idescuela)
            ->orderBy('m.id', 'desc')
            ->get();

        $videoescuelas = DB::table('videoescuelas as m')
            ->join('escuelas as e', 'e.id', '=', 'm.escuela_id')
            ->where('m.activo', '=', '1')
            ->where('m.borrado', '0')
            ->where('e.id', '=', $idescuela)
            ->orderBy('m.id', 'desc')
            ->get();

        $cargosAutoridades = DB::table('autoridades as a')
            ->join('cargos as c', 'c.id', '=', 'a.cargo_id')
            ->select('a.id', 'a.descripcion', 'a.fechainicio', 'a.fechafin', 'a.cargo_id', 'c.id as idcargo', 'c.cargo', 'c.descripcion', 'c.facultad_id')
            ->where('a.borrado', '0')
            ->where('a.activo', '=', '1')
            ->where('c.facultad_id', '=', $idfacultad)
            ->orderBy('a.id', 'asc')
            ->get();

        $redesescuelas = DB::table('redesescuelas as m')
            ->join('escuelas as e', 'e.id', '=', 'm.escuela_id')
            ->where('m.activo', '=', '1')
            ->where('m.borrado', '0')
            ->where('e.id', '=', $idescuela)
            ->orderBy('m.id', 'desc')
            ->first();

        $estilos = Estilo::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        $redesfacultades = RedesFacultad::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->first();

        $facultad = Facultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        return view('web.escuelas', ['logos' => $logos, 'escuelas' => $escuelas, 'descripciones' => $descripciones, 'campoLaborales' => $campoLaborales, 'perfiles' => $perfiles, 'bannerescuelas' => $bannerescuelas, 'mallas' => $mallas, 'galeriaEscuelas' => $galeriaEscuelas, 'videoescuelas' => $videoescuelas, 'cargosAutoridades' => $cargosAutoridades, 'estilos' => $estilos, 'redesfacultades' => $redesfacultades, 'facultad' => $facultad, 'redesescuelas' => $redesescuelas]);
    }

    public function autoridadesF($idfacultad, $idautoridad)
    {
        $logos = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->latest()
            ->first();

        $escuelas = DB::table('escuelas as e')
            ->join('departamentoacademicos as da', 'da.id', '=', 'e.departamentoacademico_id')
            ->select('e.id', 'e.nombre', 'da.facultad_id')
            ->where('da.facultad_id', '=', $idfacultad)
            ->where('e.borrado', '0')
            ->where('e.activo', '=', '1')
            ->orderBy('e.id', 'desc')
            ->get();

        $cargosAutoridades = DB::table('autoridades as a')
            ->join('cargos as c', 'c.id', '=', 'a.cargo_id')
            ->select('a.id', 'a.descripcion', 'a.fechainicio', 'a.fechafin', 'a.cargo_id', 'c.id as idcargo', 'c.cargo', 'c.descripcion', 'c.facultad_id')
            ->where('a.borrado', '0')
            ->where('a.activo', '=', '1')
            ->where('c.facultad_id', '=', $idfacultad)
            ->orderBy('a.id', 'asc')
            ->get();

        $autoridades = DB::table('autoridades as a')
            ->join('cargos as c', 'c.id', '=', 'a.cargo_id')
            ->join('personas as p', 'p.id', '=', 'a.persona_id')
            ->join('facultades as f', 'f.id', '=', 'c.facultad_id')
            ->join('gradoacademicos as g', 'g.id', 'a.gradoacademico_id')
            ->where('c.facultad_id', '=', $idfacultad)
            ->where('a.id', '=', $idautoridad)
            ->where('a.borrado', '0')
            ->select('a.id as idauto', 'p.id as idper', 'p.dni', 'p.nombres', 'p.apellidos', 'p.genero', 'p.foto', 'c.cargo', 'c.descripcion as descripcioncargo', 'a.descripcion', 'a.fechainicio', 'a.fechafin', 'a.activo', 'c.id as idcargo', 'f.id as idfac', 'f.nombre', 'f.abreviatura', 'g.grado')
            ->orderBy('a.id', 'desc')
            ->first();

        $estilos = Estilo::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        $redesfacultades = RedesFacultad::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->first();

        $facultad = Facultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        return view('web.autoridades', ['logos' => $logos, 'escuelas' => $escuelas, 'cargosAutoridades' => $cargosAutoridades, 'autoridades' => $autoridades, 'estilos' => $estilos, 'redesfacultades' => $redesfacultades, 'facultad' => $facultad]);
    }

    function docentesweb(Request $request, $idfacultad)
    {
        $buscar = $request->buscar;

        $logos = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->latest()
            ->first();

        $escuelas = DB::table('escuelas as e')
            ->join('departamentoacademicos as da', 'da.id', '=', 'e.departamentoacademico_id')
            ->select('e.id', 'e.nombre', 'da.facultad_id')
            ->where('da.facultad_id', '=', $idfacultad)
            ->where('e.borrado', '0')
            ->where('e.activo', '=', '1')
            ->orderBy('e.id', 'desc')
            ->get();

        $cargosAutoridades = DB::table('autoridades as a')
            ->join('cargos as c', 'c.id', '=', 'a.cargo_id')
            ->select('a.id', 'a.descripcion', 'a.fechainicio', 'a.fechafin', 'a.cargo_id', 'c.id as idcargo', 'c.cargo', 'c.descripcion', 'c.facultad_id')
            ->where('a.borrado', '0')
            ->where('a.activo', '=', '1')
            ->where('c.facultad_id', '=', $idfacultad)
            ->orderBy('a.id', 'asc')
            ->get();

        if ($buscar != 0) {
            $docenteweb = DB::table('docentes as d')
                ->join('gradoacademicos as ga', 'ga.id', '=', 'd.gradoacademico_id')
                ->join('categoriadocentes as cd', 'cd.id', '=', 'd.categoriadocente_id')
                ->join('personas as p', 'p.id', '=', 'd.persona_id')
                ->join('departamentoacademicos as da', 'da.id', '=', 'd.departamentoacademico_id')
                ->where('d.borrado', '0')
                ->where('d.activo', '=', '1')
                ->where('cd.id', '=', $buscar)
                ->where('da.facultad_id', '=', $idfacultad)
                ->orderBy('p.nombres')
                ->select('d.id as doc', 'p.id as idper', 'p.dni', 'p.nombres', 'p.apellidos', 'p.genero', 'p.foto', 'd.tituloprofe', 'ga.grado', 'ga.abreviatura', 'cd.categoria', 'd.fechaingreso')
                ->get();
        } else {
            $docenteweb = DB::table('docentes as d')
                ->join('gradoacademicos as ga', 'ga.id', '=', 'd.gradoacademico_id')
                ->join('categoriadocentes as cd', 'cd.id', '=', 'd.categoriadocente_id')
                ->join('personas as p', 'p.id', '=', 'd.persona_id')
                ->join('departamentoacademicos as da', 'da.id', '=', 'd.departamentoacademico_id')
                ->where('d.borrado', '0')
                ->where('d.activo', '=', '1')
                ->where('da.facultad_id', '=', $idfacultad)
                ->orderBy('p.nombres')
                ->select('d.id as doc', 'p.id as idper', 'p.dni', 'p.nombres', 'p.apellidos', 'p.genero', 'p.foto', 'd.tituloprofe', 'ga.grado', 'ga.abreviatura', 'cd.categoria', 'd.fechaingreso')
                ->get();
        }


        $categoria = CategoriaDocentes::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->get();

        $estilos = Estilo::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        $redesfacultades = RedesFacultad::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->first();

        $facultad = Facultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        return view('web.docentesweb', ['logos' => $logos, 'escuelas' => $escuelas, 'docenteweb' => $docenteweb, 'categoria' => $categoria, 'cargosAutoridades' => $cargosAutoridades, 'estilos' => $estilos, 'redesfacultades' => $redesfacultades, 'facultad' => $facultad]);
    }

    public function noticiasfacultad($idfacultad)
    {
        $noticias = NoticiaFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->get();

        $logos = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->first();

        $escuelas = DB::table('escuelas as e')
            ->join('departamentoacademicos as da', 'da.id', '=', 'e.departamentoacademico_id')
            ->select('e.id', 'e.nombre', 'da.facultad_id')
            ->where('da.facultad_id', '=', $idfacultad)
            ->where('e.borrado', '0')
            ->where('e.activo', '=', '1')
            ->orderBy('e.id', 'desc')
            ->get();

        $cargosAutoridades = DB::table('autoridades as a')
            ->join('cargos as c', 'c.id', '=', 'a.cargo_id')
            ->select('a.id', 'a.descripcion', 'a.fechainicio', 'a.fechafin', 'a.cargo_id', 'c.id as idcargo', 'c.cargo', 'c.descripcion', 'c.facultad_id')
            ->where('a.borrado', '0')
            ->where('a.activo', '=', '1')
            ->where('c.facultad_id', '=', $idfacultad)
            ->orderBy('a.id', 'asc')
            ->get();

        $estilos = Estilo::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        $redesfacultades = RedesFacultad::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->first();

        $facultad = Facultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        return view('web.noticias', ['noticias' => $noticias, 'logos' => $logos, 'escuelas' => $escuelas, 'cargosAutoridades' => $cargosAutoridades, 'estilos' => $estilos, 'redesfacultades' => $redesfacultades, 'facultad' => $facultad]);
    }

    public function eventosfacultad($idfacultad)
    {
        $eventos = EventoFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->get();

        $logos = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->latest()
            ->first();

        $escuelas = DB::table('escuelas as e')
            ->join('departamentoacademicos as da', 'da.id', '=', 'e.departamentoacademico_id')
            ->select('e.id', 'e.nombre', 'da.facultad_id')
            ->where('da.facultad_id', '=', $idfacultad)
            ->where('e.borrado', '0')
            ->where('e.activo', '=', '1')
            ->orderBy('e.id', 'desc')
            ->get();

        $cargosAutoridades = DB::table('autoridades as a')
            ->join('cargos as c', 'c.id', '=', 'a.cargo_id')
            ->select('a.id', 'a.descripcion', 'a.fechainicio', 'a.fechafin', 'a.cargo_id', 'c.id as idcargo', 'c.cargo', 'c.descripcion', 'c.facultad_id')
            ->where('a.borrado', '0')
            ->where('a.activo', '=', '1')
            ->where('c.facultad_id', '=', $idfacultad)
            ->orderBy('a.id', 'asc')
            ->get();

        $estilos = Estilo::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        $redesfacultades = RedesFacultad::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->first();

        $facultad = Facultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        return view('web.eventos', ['eventos' => $eventos, 'logos' => $logos, 'escuelas' => $escuelas, 'cargosAutoridades' => $cargosAutoridades, 'estilos' => $estilos, 'redesfacultades' => $redesfacultades, 'facultad' => $facultad]);
    }

    public function documentosfacultad($idfacultad)
    {
        $documentos = DocumentoFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->get();

        $logos = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->first();

        $escuelas = DB::table('escuelas as e')
            ->join('departamentoacademicos as da', 'da.id', '=', 'e.departamentoacademico_id')
            ->select('e.id', 'e.nombre', 'da.facultad_id')
            ->where('da.facultad_id', '=', $idfacultad)
            ->where('e.borrado', '0')
            ->where('e.activo', '=', '1')
            ->orderBy('e.id', 'desc')
            ->get();

        $cargosAutoridades = DB::table('autoridades as a')
            ->join('cargos as c', 'c.id', '=', 'a.cargo_id')
            ->select('a.id', 'a.descripcion', 'a.fechainicio', 'a.fechafin', 'a.cargo_id', 'c.id as idcargo', 'c.cargo', 'c.descripcion', 'c.facultad_id')
            ->where('a.borrado', '0')
            ->where('a.activo', '=', '1')
            ->where('c.facultad_id', '=', $idfacultad)
            ->orderBy('a.id', 'asc')
            ->get();

        $estilos = Estilo::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        $redesfacultades = RedesFacultad::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->first();

        $facultad = Facultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        return view('web.documentos', ['documentos' => $documentos, 'logos' => $logos, 'escuelas' => $escuelas, 'cargosAutoridades' => $cargosAutoridades, 'estilos' => $estilos, 'redesfacultades' => $redesfacultades, 'facultad' => $facultad]);
    }

    public function galeriasfacultad($idfacultad)
    {
        $galeriaEscuelas = GaleriaFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->get();

        $logos = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->latest()
            ->first();

        $escuelas = DB::table('escuelas as e')
            ->join('departamentoacademicos as da', 'da.id', '=', 'e.departamentoacademico_id')
            ->select('e.id', 'e.nombre', 'da.facultad_id')
            ->where('da.facultad_id', '=', $idfacultad)
            ->where('e.borrado', '0')
            ->where('e.activo', '=', '1')
            ->orderBy('e.id', 'desc')
            ->get();

        $cargosAutoridades = DB::table('autoridades as a')
            ->join('cargos as c', 'c.id', '=', 'a.cargo_id')
            ->select('a.id', 'a.descripcion', 'a.fechainicio', 'a.fechafin', 'a.cargo_id', 'c.id as idcargo', 'c.cargo', 'c.descripcion', 'c.facultad_id')
            ->where('a.borrado', '0')
            ->where('a.activo', '=', '1')
            ->where('c.facultad_id', '=', $idfacultad)
            ->orderBy('a.id', 'asc')
            ->get();

        $estilos = Estilo::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        $redesfacultades = RedesFacultad::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->first();

        $facultad = Facultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        return view('web.galeriasFacultad', ['galeriaEscuelas' => $galeriaEscuelas, 'logos' => $logos, 'escuelas' => $escuelas, 'cargosAutoridades' => $cargosAutoridades, 'estilos' => $estilos, 'redesfacultades' => $redesfacultades, 'facultad' => $facultad]);
    }

    public function videosfacultad($idfacultad)
    {
        $videofacultades = videofacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->get();

        $logos = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->latest()
            ->first();

        $escuelas = DB::table('escuelas as e')
            ->join('departamentoacademicos as da', 'da.id', '=', 'e.departamentoacademico_id')
            ->select('e.id', 'e.nombre', 'da.facultad_id')
            ->where('da.facultad_id', '=', $idfacultad)
            ->where('e.borrado', '0')
            ->where('e.activo', '=', '1')
            ->orderBy('e.id', 'desc')
            ->get();

        $cargosAutoridades = DB::table('autoridades as a')
            ->join('cargos as c', 'c.id', '=', 'a.cargo_id')
            ->select('a.id', 'a.descripcion', 'a.fechainicio', 'a.fechafin', 'a.cargo_id', 'c.id as idcargo', 'c.cargo', 'c.descripcion', 'c.facultad_id')
            ->where('a.borrado', '0')
            ->where('a.activo', '=', '1')
            ->where('c.facultad_id', '=', $idfacultad)
            ->orderBy('a.id', 'asc')
            ->get();

        $estilos = Estilo::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        $redesfacultades = RedesFacultad::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('facultad_id', '=', $idfacultad)
            ->orderBy('id', 'desc')
            ->first();

        $facultad = Facultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('id', '=', $idfacultad)
            ->orderBy('id', 'asc')
            ->first();

        return view('web.videosfacultad', ['videofacultades' => $videofacultades, 'logos' => $logos, 'escuelas' => $escuelas, 'cargosAutoridades' => $cargosAutoridades, 'estilos' => $estilos, 'redesfacultades' => $redesfacultades, 'facultad' => $facultad]);
    }

    public function cambiar(Request $request, $id)
    {
        $estilos = Estilo::findOrFail($id);
        $estilos->fondoheader = $request->codigofondoheader;
        $estilos->textoheader = $request->codigotextoheader;
        $estilos->fondofooter = $request->codigofondofooter;
        $estilos->textofooter = $request->codigotextofooter;
        $estilos->fondonavbar = $request->codigofondonavbar;
        $estilos->textonavbar = $request->codigotextonavbar;
        $estilos->save();
        return redirect()->action(
            'IndexWebController@index',
            ['idfacultad' => $id]
        );
    }
}
