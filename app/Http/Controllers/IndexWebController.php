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
use DB;
use Auth;
use Carbon\Carbon;



class IndexWebController extends Controller
{
    public function Index()
    {
        $BannersFacultades = BannersFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->get();

        $noticias = NoticiaFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        $eventos = EventoFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        $misionvision = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->take(1)
            ->get();

        $galeriaFacultades = GaleriaFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->take(8)
            ->get();

        $carrerasprofesionales = DB::table('descripcionescuelas as de')
            ->join('escuelas as e', 'e.id', '=', 'de.escuela_id')
            ->where('de.borrado', '=', '0')
            ->where('de.activo', '=', '1')
            ->orderBy('de.id', 'desc')
            ->take(8)
            ->get();

        $videosFacultades = VideoFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->take(4)
            ->get();

        $documentos = DocumentoFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->get();

        $decano = DB::table('autoridades as a')
            ->join('cargos as c', 'c.id', '=', 'a.cargo_id')
            ->join('personas as p', 'p.id', '=', 'a.persona_id')
            ->where('a.borrado', '0')
            ->where('c.cargo', '=', 'decano')
            ->orderBy('p.nombres')
            ->select('a.id as idauto', 'p.id as idper', 'p.dni', 'p.nombres', 'p.apellidos', 'p.genero', 'p.foto', 'c.cargo', 'a.descripcion', 'a.fechainicio', 'a.fechafin', 'a.activo', 'c.id as idcargo')
            ->take(1)
            ->get();

        $autoridades = DB::table('autoridades as a')
            ->join('cargos as c', 'c.id', '=', 'a.cargo_id')
            ->join('personas as p', 'p.id', '=', 'a.persona_id')
            ->where('a.borrado', '0')
            ->where('c.cargo', '<>', 'decano')
            ->orderBy('p.nombres')
            ->select('a.id as idauto', 'p.id as idper', 'p.dni', 'p.nombres', 'p.apellidos', 'p.genero', 'p.foto', 'c.cargo', 'a.descripcion', 'a.fechainicio', 'a.fechafin', 'a.activo', 'c.id as idcargo')
            ->get();

        $logos = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->take(1)
            ->get();

        $escuelas = Escuela::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->get();

        return view('web.index', ['BannersFacultades' => $BannersFacultades, 'noticias' => $noticias, 'eventos' => $eventos, 'misionvision' => $misionvision, 'galeriaFacultades' => $galeriaFacultades, 'carrerasprofesionales' => $carrerasprofesionales, 'videosFacultades' => $videosFacultades, 'decano' => $decano, 'autoridades' => $autoridades, 'documentos' => $documentos, 'logos' => $logos, 'escuelas' => $escuelas]);
    }
    public function historiaF()
    {
        $historia = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->take(1)
            ->get();

        $logos = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->take(1)
            ->get();

        $escuelas = Escuela::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->get();

        return view('web.historia', ['historia' => $historia, 'logos' => $logos, 'escuelas' => $escuelas]);
    }
    public function decano()
    {
        $decanos = DB::table('autoridades as a')
            ->join('cargos as c', 'c.id', '=', 'a.cargo_id')
            ->join('personas as p', 'p.id', '=', 'a.persona_id')
            ->join('gradoacademicos as ga', 'ga.id', '=', 'a.gradoacademico_id')
            ->where('a.borrado', '0')
            ->where('c.cargo', '=', 'decano')
            ->orderBy('p.nombres')
            ->select('a.id as idauto', 'p.id as idper', 'p.dni', 'p.nombres', 'p.apellidos', 'p.genero', 'p.foto', 'c.cargo', 'c.descripcion', 'a.fechainicio', 'a.fechafin', 'a.activo', 'c.id as idcargo', 'ga.abreviatura')
            ->take(1)
            ->get();

        $logos = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->take(1)
            ->get();

        $escuelas = Escuela::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->get();

        return view('web.decano', ['decanos' => $decanos, 'logos' => $logos, 'escuelas' => $escuelas]);
    }
    public function consejo()
    {
        $consejos = DB::table('autoridades as a')
            ->join('cargos as c', 'c.id', '=', 'a.cargo_id')
            ->join('personas as p', 'p.id', '=', 'a.persona_id')
            ->where('a.borrado', '0')
            ->where('c.cargo', '=', 'consejo de facultad')
            ->orderBy('a.id')
            ->select('a.id as idauto', 'p.id as idper', 'p.dni', 'p.nombres', 'p.apellidos', 'p.genero', 'p.foto', 'c.cargo', 'a.descripcion', 'a.fechainicio', 'a.fechafin', 'a.activo', 'c.id as idcargo')
            ->get();

        $logos = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->take(1)
            ->get();

        $escuelas = Escuela::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->get();
        return view('web.consejo', ['logos' => $logos, 'consejos' => $consejos, 'escuelas' => $escuelas]);
    }
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
            ->take(1)
            ->get();

        $escuelas = Escuela::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->get();
        return view('web.departacademico', ['logos' => $logos, 'departacademico' => $departacademico, 'escuelas' => $escuelas]);
    }
    
    public function misionvision()
    {
        $logos = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->take(1)
            ->get();

        $misionvision = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->get();

        $escuelas = Escuela::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->get();

        return view('web.misionvision', ['misionvision' => $misionvision, 'logos' => $logos, 'escuelas' => $escuelas]);
    }
    public function filosofia()
    {
        $filosofia = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->get();

        $logos = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->take(1)
            ->get();

        $escuelas = Escuela::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->get();

        return view('web.filosofia', ['filosofia' => $filosofia, 'logos' => $logos, 'escuelas' => $escuelas]);
    }
    public function organigrama()
    {
        $organigrama = Organigrama::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->take(1)
            ->get();

        $logos = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->take(1)
            ->get();

        $escuelas = Escuela::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->get();

        return view('web.organigrama', ['organigrama' => $organigrama, 'logos' => $logos, 'escuelas' => $escuelas]);
    }
    public function investigacionesfacultad(Request $request)
    {
        $buscar = $request->buscar;
        $revista = Investigaciones::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('tema_id', 'like', '%' . $buscar . '%')
            ->orderBy('id', 'desc')
            ->get();

        $temas = Temas::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->get();

        $logos = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->take(1)
            ->get();
        $escuelas = Escuela::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->get();

        return view('web.investigacionesfacultad', ['revista' => $revista, 'logos' => $logos, 'escuelas' => $escuelas, 'temas'=>$temas]);
    }
    public function librosweb(Request $request)
    {
        $buscar = $request->buscar;
        $librosweb = Libros::where('borrado', '0')
            ->where('activo', '=', '1')
            ->where('tema_id', 'like', '%' . $buscar . '%')
            ->orderBy('id', 'desc')
            ->get();

        $temas = Temas::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->get();

        $logos = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->take(1)
            ->get();

        $escuelas = Escuela::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->get();
        

        return view('web.librosweb', ['logos' => $logos, 'escuelas' => $escuelas, 'librosweb' => $librosweb,'temas'=>$temas]);
    }


    public function comestudiantil()
    {

        $logos = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->take(1)
            ->get();

        $escuelas = Escuela::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->get();
        
        $comiestudiantiles = DB::table('comiestudiantiles')
            ->where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->get();

        $alumnos = DB::table('alumnos as a')
            ->join('comiestudiantiles as ce','ce.id','=','a.comiestudiantil_id')
            ->join('personas as p','p.id','=','a.persona_id')
            ->where('a.borrado', '0')
            ->where('a.activo', '=', '1')
            ->get();

        return view('web.comestudiantil', ['logos' => $logos, 'escuelas' => $escuelas,'comiestudiantiles'=>$comiestudiantiles,'alumnos'=>$alumnos]);
    }





/*---------------------------------ESCUELAS PROFESIONALES------------------------------------------------------------*/
    public function escuelas($idescuela)
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
            ->orderBy('id', 'desc')
            ->get();

        $escuelas = Escuela::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->get();

        $descripciones  = DB::table('descripcionescuelas as ne')
            ->join('escuelas as e', 'e.id', '=', 'ne.escuela_id')
            ->where('ne.activo', '=', '1')
            ->where('ne.borrado', '0')
            ->where('e.id', '=', $idescuela)
            ->select('ne.id', 'ne.descripcion', 'e.nombre', 'ne.gradoacade', 'ne.tituloprofesional', 'ne.duracion', 'ne.logo')
            ->orderBy('ne.id', 'desc')
            ->get();

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
            ->select('ne.descripcion','ne.perfil')
            ->orderBy('ne.id', 'desc')
            ->get();

        $mallas = DB::table('mallas as m')
            ->join('escuelas as e', 'e.id', '=', 'm.escuela_id')
            ->where('m.activo', '=', '1')
            ->where('m.borrado', '0')
            ->where('e.id', '=', $idescuela)
            ->select('m.imagen','m.numcurricula')
            ->orderBy('m.id', 'desc')
            ->get();

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

        return view('web.escuelas', ['logos' => $logos, 'escuelas' => $escuelas, 'descripciones' => $descripciones, 'campoLaborales' => $campoLaborales, 'perfiles' => $perfiles,'bannerescuelas'=>$bannerescuelas,'mallas'=>$mallas,'galeriaEscuelas'=>$galeriaEscuelas,'videoescuelas'=>$videoescuelas]);
    }
/*------------------------------------------------------------------------------------------------------------------ */
}
