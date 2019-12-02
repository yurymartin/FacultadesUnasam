<?php

namespace App\Http\Controllers;

use App\Autoridades;
use App\BannersFacultades;
use App\DescripcionEscuelas;
use App\DescripcionFacultades;
use App\Escuela;
use App\EventoFacultades;
use App\GaleriaFacultades;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NoticiaFacultades;
use App\Organigrama;
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

        $carrerasprofesionales = DescripcionEscuelas::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->get();

        $videosFacultades = VideoFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->take(4)
            ->get();

        $decano = DB::table('autoridades as a')
            ->join('cargos as c', 'c.id', '=', 'a.cargo_id')
            ->join('personas as p', 'p.id', '=', 'a.persona_id')
            ->where('a.borrado', '0')
            ->where('c.id', '=', 1)
            ->orderBy('p.nombres')
            ->select('a.id as idauto', 'p.id as idper', 'p.dni', 'p.nombres', 'p.apellidos', 'p.genero', 'p.foto', 'c.cargo', 'a.descripcion', 'a.fechainicio', 'a.fechafin', 'a.activo', 'c.id as idcargo')
            ->take(1)
            ->get();

        $autoridades = DB::table('autoridades as a')
            ->join('cargos as c', 'c.id', '=', 'a.cargo_id')
            ->join('personas as p', 'p.id', '=', 'a.persona_id')
            ->where('a.borrado', '0')
            ->where('c.id', '<>', 1)
            ->orderBy('p.nombres')
            ->select('a.id as idauto', 'p.id as idper', 'p.dni', 'p.nombres', 'p.apellidos', 'p.genero', 'p.foto', 'c.cargo', 'a.descripcion', 'a.fechainicio', 'a.fechafin', 'a.activo', 'c.id as idcargo')
            ->get();

        return view('web.index', ['BannersFacultades' => $BannersFacultades, 'noticias' => $noticias, 'eventos' => $eventos, 'misionvision' => $misionvision, 'galeriaFacultades' => $galeriaFacultades, 'carrerasprofesionales' => $carrerasprofesionales, 'videosFacultades' => $videosFacultades, 'decano' => $decano, 'autoridades' => $autoridades]);
    }
    public function misionvision()
    {
        $misionvision = DescripcionFacultades::where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->get();

        return view('web.misionvision', ['misionvision' => $misionvision,'filosofia'=> $filosofia]);
    }
    public function filosofia(){
        $filosofia = DescripcionFacultades::where('borrado', '0')
        ->where('activo', '=', '1')
        ->orderBy('id', 'desc')
        ->get();

    return view('web.filosofia', ['filosofia'=> $filosofia]); 
    }
    public function organigrama(){
        $organigrama = Organigrama::where('borrado', '0')
        ->where('activo', '=', '1')
        ->orderBy('id', 'desc')
        ->get();

    return view('web.organigrama', ['organigrama'=> $organigrama]); 
    }
}
