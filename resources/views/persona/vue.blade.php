<script type="text/javascript">
    let app = new Vue({
el: '#app',
data:{
       titulo:"Mantenimiento",
       subtitulo: "Gestión de Personas",
       subtitulo2: "Principal",

   subtitle2:false,
   subtitulo2:"",

   tipouserPerfil:'{{ $tipouser->nombre }}',
   userPerfil:'{{ Auth::user()->name }}',
   mailPerfil:'{{ Auth::user()->email }}',

   
   divloader0:true,
   divloader1:false,
   divloader2:false,
   divloader3:false,
   divloader4:false,
   divloader5:false,
   divloader6:false,
   divloader7:false,
   divloader8:false,
   divloader9:false,
   divloader10:false,
   divtitulo:true,
   classTitle:'fa fa-users',
   classMenu0:'',
   classMenu1:'',
   classMenu2:'active',
   classMenu3:'',
   classMenu4:'',
   classMenu5:'',
   classMenu6:'',
   classMenu7:'',
   classMenu8:'',
   classMenu9:'',
   classMenu10:'',
   classMenu11:'',
   classMenu12:'',


   divprincipal:false,

   tipopersonas: [],
   personas: [],
   personas: [],
   errors:[],

   fillPersona:{'id':'', 'nombre':'', 'dni_ruc':'','codigo_alumno':'','direccion':'','activo':'','escuela_id':'','tipopersona_id':0},

   pagination: {
   'total': 0,
           'current_page': 0,
           'per_page': 0,
           'last_page': 0,
           'from': 0,
           'to': 0
           },
           offset: 9,
   buscar:'',
   divNuevo:false,
   divloaderNuevo:false,
   divloaderEdit:false,

   thispage:'1',

   tipopersona_id:0,
   escuela_id:0,
   activo:'1',
   direccion:'',
   codigo_alumno:'',
   dni_ruc:'',
   nombre:'',



},
created:function () {
   this.getPersona(this.thispage);

   $("#cbsescuelaE").select2();
},
mounted: function () {
   this.divloader0=false;
   this.divprincipal=true;
   $("#divtitulo").show('slow');

},
computed:{
   isActived: function(){
       return this.pagination.current_page;
   },
   pagesNumber: function () {
       if(!this.pagination.to){
           return [];
       }

       var from=this.pagination.current_page - this.offset 
       var from2=this.pagination.current_page - this.offset 
       if(from<1){
           from=1;
       }

       var to= from2 + (this.offset*2); 
       if(to>=this.pagination.last_page){
           to=this.pagination.last_page;
       }

       var pagesArray = [];
       while(from<=to){
           pagesArray.push(from);
           from++;
       }
       return pagesArray;
   }
},

methods: {
   getPersona: function (page) {
       var busca=this.buscar;
       var url = 'persona?page='+page+'&busca='+busca;

       axios.get(url).then(response=>{
           this.personas= response.data.personas.data;
           this.pagination= response.data.pagination;
           this.escuelas= response.data.escuelas;
           this.tipopersonas= response.data.tipopersonas;

           if(this.personas.length==0 && this.thispage!='1'){
               var a = parseInt(this.thispage) ;
               a--;
               this.thispage=a.toString();
               this.changePage(this.thispage);
           }
       })
   },
   changePage:function (page) {
       this.pagination.current_page=page;
       this.getPersona(page);
       this.thispage=page;
   },
   buscarBtn: function () {
       this.getPersona();
       this.thispage='1';
   },
   nuevo:function () {
       this.divNuevo=true;
       //$("#txtespecialidad").focus();
       //$('#txtespecialidad').focus();
       this.$nextTick(function () {
       this.cancelFormNuevo();
     })
       
   },
   cerrarFormNuevo: function () {
       this.divNuevo=false;
       this.cancelFormNuevo();
   },
   cancelFormNuevo: function () {
       $('#cbstipopersona').focus();
       
        this.tipopersona_id=0;
        this.escuela_id=0;
        this.activo='1';
        this.direccion='';
        this.codigo_alumno='';
        this.dni_ruc='';
        this.nombre='';

       

       $(".form-control").css("border","1px solid #d2d6de");
   },
   seltipo:function(){

    if(this.tipopersona_id==3){
        $("#cbsescuela").select2();
        $('#cbsescuela').val('0').trigger('change');
        this.$nextTick(function () {
            $("#cbsescuela").select2();
        $('#cbsescuela').val('0').trigger('change');
     })
    }else{
        this.escuela_id=0;
        $('#cbsescuela').val('0').trigger('change');
        this.codigo_alumno='';
    }
    
    $('#txtnom').focus();
   },

   seltipoE:function(){

if(this.fillPersona.tipopersona_id==3){
    $("#cbsescuelaE").select2();
    $('#cbsescuelaE').val('0').trigger('change');
    this.$nextTick(function () {
        $("#cbsescuelaE").select2();
    $('#cbsescuelaE').val('0').trigger('change');
 })
}else{
    this.fillPersona.escuela_id=0;
    $('#cbsescuelaE').val('0').trigger('change');
    this.fillPersona.codigo_alumno='';
}

$('#txtnom').focus();
},
   create:function () {

       this.escuela_id=$("#cbsescuela").val();
       var url='persona';
       $("#btnGuardar").attr('disabled', true);
       $("#btnCancel").attr('disabled', true);
       $("#btnClose").attr('disabled', true);
       this.divloaderNuevo=true;
       $(".form-control").css("border","1px solid #d2d6de");
       axios.post(url,{tipopersona_id:this.tipopersona_id, escuela_id:this.escuela_id, activo:this.activo, direccion:this.direccion, codigo_alumno:this.codigo_alumno, dni_ruc:this.dni_ruc, nombre:this.nombre}).then(response=>{
           //console.log(response.data);

           $("#btnGuardar").removeAttr("disabled");
           $("#btnCancel").removeAttr("disabled");
           $("#btnClose").removeAttr("disabled");
           this.divloaderNuevo=false;

   
           if(String(response.data.result)=='1'){
               this.getPersona(this.thispage);
               this.errors=[];
               this.cerrarFormNuevo();
               toastr.success(response.data.msj);
           }else{
               $('#'+response.data.selector).focus();
               $('#'+response.data.selector).css( "border", "1px solid red" );
               toastr.error(response.data.msj);
           }
       }).catch(error=>{
           //this.errors=error.response.data
       })
   },
   borrarpersona:function (persona) {


    
        swal.fire({
             title: '¿Estás seguro?',
             text: "¿Desea eliminar la Persona Profesional Seleccionada? -- Nota: este proceso no se podrá revertir.",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, eliminar'
           }).then((result) => {

            if (result.value) {

                var url = 'persona/'+persona.id;
                axios.delete(url).then(response=>{//eliminamos

                if(response.data.result=='1'){
                    app.getPersona(app.thispage);//listamos
                    toastr.success(response.data.msj);//mostramos mensaje
                }else{
                    // $('#'+response.data.selector).focus();
                    toastr.error(response.data.msj);
                }
                })
                }

                   
               }).catch(swal.noop);  
   },
   editpersona:function (persona) {

       this.fillPersona.id=persona.id;
       this.fillPersona.nombre=persona.nombre;
       this.fillPersona.dni_ruc=persona.dni_ruc;
       this.fillPersona.codigo_alumno=persona.codigo_alumno;
       this.fillPersona.direccion=persona.direccion;
       this.fillPersona.activo=persona.activo;
       this.fillPersona.escuela_id=persona.escuela_id;
       this.fillPersona.tipopersona_id=persona.tipopersona_id;

       this.seltipoE();
       this.$nextTick(function () {

       $("#cbsescuelaE").select2();
       this.$nextTick(function () {
       $("#cbsescuelaE").val( this.fillPersona.escuela_id).trigger('change');
       $('.select2').css("width","100%");
    });
    });

       $("#boxTitulo").text('Persona: '+persona.nombre);
       $("#modalEditar").modal('show');

       $("#txtfacE").focus();
   },
   updatePersona:function (id) {
       var url="persona/"+id;
       $("#btnSaveE").attr('disabled', true);
       $("#btnCancelE").attr('disabled', true);
       this.divloaderEdit=true;

       this.fillPersona.escuela_id=$("#cbsescuelaE").val();

       axios.put(url, this.fillPersona).then(response=>{

           $("#btnSaveE").removeAttr("disabled");
           $("#btnCancelE").removeAttr("disabled");
           this.divloaderEdit=false;
           
           if(response.data.result=='1'){   
           this.getPersona(this.thispage);
           this.fillPersona={'id':'', 'nombre':'', 'dni_ruc':'','codigo_alumno':'','direccion':'','activo':'','escuela_id':'','tipopersona_id':0};
           this.errors=[];
           $("#modalEditar").modal('hide');
           toastr.success(response.data.msj);

           }else{
               $('#'+response.data.selector).focus();
               toastr.error(response.data.msj);
           }

       }).catch(error=>{
           this.errors=error.response.data
       })
   },
   bajapersona:function (persona) {


    swal.fire({
             title: '¿Estás seguro?',
             text: "Desea desactivar la Persona seleccionada",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, Desactivar'
           }).then((result) => {

            if (result.value) {

                var url = 'persona/altabaja/'+persona.id+'/0';
                       axios.get(url).then(response=>{//eliminamos

                       if(response.data.result=='1'){
                           app.getPersona(app.thispage);//listamos
                           toastr.success(response.data.msj);//mostramos mensaje
                       }else{
                          // $('#'+response.data.selector).focus();
                           toastr.error(response.data.msj);
                       }
                       });
                }

                   
               }).catch(swal.noop);  

   },
   altapersona:function (persona) {

    swal.fire({
             title: '¿Estás seguro?',
             text: "Desea activar la Persona seleccionada",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, Activar'
           }).then((result) => {

            if (result.value) {

                var url = 'persona/altabaja/'+persona.id+'/1';
                       axios.get(url).then(response=>{//eliminamos

                       if(response.data.result=='1'){
                           app.getPersona(app.thispage);//listamos
                           toastr.success(response.data.msj);//mostramos mensaje
                       }else{
                          // $('#'+response.data.selector).focus();
                           toastr.error(response.data.msj);
                       }
                       });
                }

                   
               }).catch(swal.noop);  

   },
}
});
</script>