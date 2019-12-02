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
use App\NosotrosEscuelas;
use App\NoticiaFacultades;
use App\VideoFacultades;
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
        $decano = DB::table('autoridades as a')
            ->join('cargos as c', 'c.id', '=', 'a.cargo_id')
            ->join('personas as p', 'p.id', '=', 'a.persona_id')
            ->where('a.borrado', '0')
            ->where('c.cargo', '=', 'decano')
            ->orderBy('p.nombres')
            ->select('a.id as idauto', 'p.id as idper', 'p.dni', 'p.nombres', 'p.apellidos', 'p.genero', 'p.foto', 'c.cargo', 'a.descripcion', 'a.fechainicio', 'a.fechafin', 'a.activo', 'c.id as idcargo')
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

        return view('web.decano', ['decano' => $decano, 'logos' => $logos, 'escuelas' => $escuelas]);
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
    public function ingenieriadesistemaseinformatica()
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

        $descripciones  = DB::table('descripcionescuelas as ne')
            ->join('escuelas as e', 'e.id', '=', 'ne.escuela_id')
            ->where('ne.activo', '=', '1')
            ->where('ne.borrado', '0')
            ->where('e.nombre', '=', 'INGENIERIA DE SISTEMAS E INFORMATICA')
            ->select('ne.id', 'ne.descripcion', 'e.nombre', 'ne.gradoacade', 'ne.titulo', 'ne.duracion', 'ne.logo')
            ->orderBy('ne.id', 'desc')
            ->take(1)
            ->get();

        $campoLaborales = DB::table('campolaborales as ne')
            ->join('escuelas as e', 'e.id', '=', 'ne.escuela_id')
            ->where('ne.activo', '=', '1')
            ->where('ne.borrado', '0')
            ->where('e.nombre', '=', 'INGENIERIA DE SISTEMAS E INFORMATICA')
            ->orderBy('ne.id', 'desc')
            ->take(1)
            ->get();

        $perfiles = DB::table('perfiles as ne')
            ->join('escuelas as e', 'e.id', '=', 'ne.escuela_id')
            ->where('ne.activo', '=', '1')
            ->where('ne.borrado', '0')
            ->where('e.nombre', '=', 'INGENIERIA DE SISTEMAS E INFORMATICA')
            ->select('ne.descripcion')
            ->orderBy('ne.id', 'desc')
            ->get();

        return view('web.ingenieriadesistemaseinformatica', ['logos' => $logos, 'escuelas' => $escuelas, 'descripciones' => $descripciones, 'campoLaborales' => $campoLaborales, 'perfiles' => $perfiles]);
    }
}
