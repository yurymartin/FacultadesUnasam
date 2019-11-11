<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Banner;
use App\AgendaRectoral;
use App\Noticia;
use App\Evento;
use App\Video;
use App\Galeria;
use App\Instrumento;
use App\Calendario;
use MadHatter\LaravelFullCalendar\Facades\Calendar;
use Carbon\Carbon;



class IndexWebController extends Controller
{
    public function Index()
    {   
        $contador = 1;
        $contadore = 1;
        $contadores = 1;
        
        $bannerActivo = Banner::where('borrado','0')
        ->where('activo','=','1')
        ->orderBy('id','desc')
        ->take(1)
        ->get();
        
        $banner = Banner::where('borrado','0')
        ->where('activo','=','1')
        ->orderBy('id','desc')
        ->skip(1)
        ->take(20)
        ->get();

        $agendaRectoral = AgendaRectoral::where('borrado','0')
        ->where('activo','=','1')
        ->orderBy('id','desc')
        ->take(1)
        ->get();

        $noticia = Noticia::where('borrado','0')
        ->where('activo','=','1')
        ->orderBy('id','desc')
        ->take(2)
        ->get();

        $eventoActivo = Evento::where('borrado','0')
        ->where('activo','=','1')
        ->orderBy('id','desc')
        ->take(1)
        ->get();

        $evento = Evento::where('borrado','0')
        ->where('activo','=','1')
        ->orderBy('id','desc')
        ->skip(1)
        ->take(20)
        ->get();

        $videoFace = Video::where('borrado','0')
        ->where('activo','=','1')
        ->where('tipovideo_id','=','2')
        ->orderBy('id','desc')
        ->take(1)
        ->get();

        $videoYoutube = Video::where('borrado','0')
        ->where('activo','=','1')
        ->where('tipovideo_id','=','1')
        ->orderBy('id','desc')
        ->take(1)
        ->get();

        $galeriaActivo = Galeria::where('borrado','0')
        ->where('activo','=','1')
        ->orderBy('id','desc')
        ->take(1)
        ->get();

        $galeria = Galeria::where('borrado','0')
        ->where('activo','=','1')
        ->orderBy('id','desc')
        ->skip(1)
        ->take(20)
        ->get();

        $instrumentos = Instrumento::where('borrado','0')
        ->where('activo','=','1')
        ->orderBy('id','asc')
        ->get();

        $events = Calendario::where('borrado','0')
        ->where('activo','=','1')
        ->orderBy('id','asc')
        ->get();

        $date = Carbon::now();
        $date = $date->format('d-m-Y');

        $mes = substr($date, 3, 2);
        $anio = substr($date, 6, 4);

        $cargarFechas = DB::select('select c.id,c.tituloCalendario,c.descrCalendario,c.color, day(c.fechaini) as diafechaini,month(c.fechaini) as mesfechaini,year(c.fechaini) as aniofechaini,
        day(c.fechafin) as diafechafin,month(c.fechafin) as mesfechafin,year(c.fechafin) as aniofechafin,
        (ifnull((select ca.id from calendarios ca where  c.id=ca.id and month(ca.fechaini)=month(curdate()) AND year(ca.fechaini)=year(curdate())),0)) as cant
         FROM calendarios c where month(c.fechaini) = '.$mes.' and year(c.fechaini) = '.$anio.'  order by c.fechaini;');
       
   
        $event = [];        
        foreach($events as $row){
            $enddate = $row->fechafin."24:00:00";
            
            $event[]=\Calendar::event( $row->tituloCalendario,
            false,
            new \DateTime($row->fechaini),
            new \DateTime($row->fechafin),
            $row->id,
            [
                'color' => $row->color,
            ]               
            );
        }

        $calendar=\Calendar::addEvents($event);


        return view('web.index',['banner' => $banner,'bannerActivo' => $bannerActivo,'contador' => $contador,'agendaRectoral' => $agendaRectoral,'noticia' => $noticia,'evento' => $evento,'eventoActivo' => $eventoActivo,'contadore' => $contadore,'videoFace' => $videoFace, 'galeria' => $galeria, 'galeriaActivo' => $galeriaActivo,'contadores' => $contadores,'videoYoutube' => $videoYoutube,'calendar' => $calendar,'cargarFechas' => $cargarFechas,'instrumentos' => $instrumentos]);
    }

    // ESCUELAS
    public function Administracion()
    {

        return view('web.Escadministracion');
    }

    public function Arqueologia()
    {

        return view('web.Escarqueologia');
    }

    public function Arquitectura()
    {

        return view('web.Escarquitectura');
    }

    public function Comunicacion()
    {

        return view('web.Esccomunicacion');
    }

    public function Contabilidad()
    {

        return view('web.Esccontabilidad');
    }

    public function Derecho()
    {

        return view('web.Escderecho');
    }

    public function Economia()
    {

        return view('web.Esceconomia');
    }

    public function Educacion()
    {

        return view('web.Esceducacion');
    }

    public function Enfermeria()
    {

        return view('web.Escenfermeria');
    }

    public function Estadistica()
    {

        return view('web.Escestadistica');
    }

    public function IngAgricola()
    {

        return view('web.Escingagricola');
    }

    public function IngAgronomia()
    {

        return view('web.Escingagronomia');
    }

    public function IngAlimentaria()
    {

        return view('web.Escingalimentaria');
    }

    public function IngAmbiental()
    {

        return view('web.Escingambiental');
    }

    public function IngCivil()
    {

        return view('web.Escingcivil');
    }

    
    public function IngIndustrial()
    {

        return view('web.Escingindustrial');
    }

    public function Ingles()
    {

        return view('web.Escingles');
    }

    public function IngMinas()
    {

        return view('web.Escingminas');
    }

    public function IngSanitaria()
    {

        return view('web.Escingsanitaria');
    }

    public function IngSistemas()
    {

        return view('web.Escingsistemas');
    }

    public function Literatura()
    {

        return view('web.Escliteratura');
    }

    public function Matematica()
    {

        return view('web.Escmatematica');
    }

    public function MatematicaInformatica()
    {

        return view('web.Escmatematicainformatica');
    }

    public function Obstetricia()
    {

        return view('web.Escobstetricia');
    }

    public function Turismo()
    {

        return view('web.Escturismo');
    }


    

    // ORGANOS DE GOBIERNO
    public function AsambleaUniversitaria()
    {

        return view('web.Orgasambleauniv');
    }

    public function ConsejoUniversitario()
    {

        return view('web.Orgconsejouniv');
    }

    public function Ejes()
    {

        return view('web.Ejes');
    }


    
    // OFICINAS ADMINISTRATIVAS
    public function AsesoriaJuridica()
    {

        return view('web.Ofiasesoriajuridica');
    }
    
    public function DirAcadEstGenerales()
    {

        return view('web.Diracadestgenerales');
    }

    public function DirCentrosInvestigacion()
    {

        return view('web.Dircentrosinvestigacion');
    }

    public function DirGeneralAdministracion()
    {

        return view('web.Dirgeneraladm');
    }

    public function DireccionInvestigacion()
    {

        return view('web.Dirinvestigacion');
    }

    public function OficinaAdmision()
    {

        return view('web.Ofiadmision');
    }

    public function BienestarUniversitario()
    {

        return view('web.Ofibienestaruniv');
    }

    public function CalidadUniversitaria()
    {

        return view('web.Oficalidaduniv');
    }

    public function DesarrolloFisico()
    {

        return view('web.Ofidesarrollofisico');
    }

    public function OficGeneralEstudios()
    {

        return view('web.Oficgeneralestudios');
    }

    public function ImagenInstitucional()
    {

        return view('web.Oficimageninstitucional');
    }

    public function CooperacionTecnica()
    {

        return view('web.Oficcooperaciontecnica');
    }

    public function PlanificacionPresupuesto()
    {

        return view('web.Oficplanpresupuesto');
    }

    public function Procuraduria()
    {

        return view('web.Oficprocuraduria');
    }

    public function ResponsabilidadSocial()
    {

        return view('web.Oficrespsocial');
    }

    public function SecretariaGeneral()
    {

        return view('web.Oficsecretariageneral');
    }

    public function ServiciosAcademicos()
    {

        return view('web.Oficservacademicos');
    }

    public function TecnologiasInformacion()
    {

        return view('web.Ofictecinformacion');
    }

    public function ControlInstitucional()
    {

        return view('web.Oficcontrolinstitucional');
    }

    public function Rectorado()
    {

        return view('web.Rectorado');
    }

    public function VicerrectoradoAcademico()
    {

        return view('web.VicerrectoradoAcademico');
    }

    public function VicerrectoradoInv()
    {

        return view('web.VicerrectoradoInv');
    }



    // AMBIENTES

    public function Auditorio()
    {

        return view('web.Ambauditorio');
    }

    public function Biblioteca()
    {

        return view('web.Ambbiblioteca');
    }

    public function Comedor()
    {

        return view('web.Ambcomedor');
    }

    // SERVICIOS

    public function Becas()
    {

        return view('web.Servbecas');
    }

    public function CentroMedico()
    {

        return view('web.Servcentromedico');
    }

    public function Convocatorias()
    {

        $contador=1;
        $contadore=1;

        $convocatoriaV=DB::table('convocatorias')
            ->join('tipoconvocatorias', 'tipoconvocatorias.id', '=', 'convocatorias.tipoconvocatoria_id')
            ->join('facultads','facultads.id','=','convocatorias.facultad_id')
            ->where('convocatorias.borrado','0')
            ->where('convocatorias.activo','1')
            ->where('convocatorias.condicion','1')
            ->select('convocatorias.id as idC','convocatorias.convocatoria','convocatorias.requerido','convocatorias.asignaturas','convocatorias.nroplazas','convocatorias.fechaini','convocatorias.fechafin','convocatorias.ruta','convocatorias.condicion','tipoconvocatorias.id as idTC','tipoconvocatorias.nombre as tipoconvocatoria','facultads.id as idFacu','facultads.nombre as facultad')
            ->get();

            $convocatoriaC=DB::table('convocatorias')
            ->join('tipoconvocatorias', 'tipoconvocatorias.id', '=', 'convocatorias.tipoconvocatoria_id')
            ->join('facultads','facultads.id','=','convocatorias.facultad_id')
            ->where('convocatorias.borrado','0')
            ->where('convocatorias.activo','1')
            ->where('convocatorias.condicion','0')
            ->select('convocatorias.id as idC','convocatorias.convocatoria','convocatorias.requerido','convocatorias.asignaturas','convocatorias.nroplazas','convocatorias.fechaini','convocatorias.fechafin','convocatorias.ruta','convocatorias.condicion','tipoconvocatorias.id as idTC','tipoconvocatorias.nombre as tipoconvocatoria','facultads.id as idFacu','facultads.nombre as facultad')
            ->get();

        return view('web.Servconvocatoria',['convocatoriaV' => $convocatoriaV,'convocatoriaC' => $convocatoriaC,'contador' => $contador,'contadore' => $contadore]);

    }

    //OTROS

    public function Galeria()
    {

        $galeria = Galeria::where('borrado','0')
        ->where('activo','=','1')
        ->orderBy('id','desc')
        ->get();

        return view('web.Galeria',['galeria'=>$galeria]);
    }

    public function Gimnasio()
    {
        return view('web.Gimnasio');
    }

    public function Himno()
    {
        return view('web.Himno');
    }

    public function Historia()
    {
        return view('web.Historia');
    }

    public function InstrumentosGestion()
    {
        $contador = 1;

        $instrumentos = Instrumento::where('borrado','0')
        ->where('activo','=','1')
        ->orderBy('id','desc')
        ->get();

        return view('web.Instrumentosgestion',['instrumentos'=>$instrumentos, 'contador'=>$contador]);
    }

    public function MisionVision()
    {
        return view('web.Misionvision');
    }

    public function Noticias()
    {
        $noticias = Noticia::where('borrado','0')
        ->where('activo','=','1')
        ->orderBy('id','desc')
        ->paginate(10);

        return view('web.Noticias',['noticias'=>$noticias]);
    }

    public function verNoticia($id)
    {
        
        $noticias = DB::select("SELECT * FROM noticias where id=" . $id . ";");
        

        return view('web.Descrnoticia', compact('noticias'));
    }

    public function Organigrama()
    {
        return view('web.Organigrama');
    }

    public function PagosVirtuales()
    {

        return view('web.Pagosvirtuales');
    }

    public function Pilares()
    {

        return view('web.Pilares');
    }

    public function Politicas()
    {

        return view('web.Politicas');
    }

    public function Servicios()
    {

        return view('web.Servicios');
    }


}