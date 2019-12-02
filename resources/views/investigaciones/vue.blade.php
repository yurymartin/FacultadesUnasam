<script type="text/javascript">
    let app = new Vue({
el: '#app',
data:{
       titulo:"Mantenimiento",
       subtitulo: "Gestión de Investigaciones",
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
   classTitle:'fa fa-qrcode ',
   classMenu0:'',
   classMenu1:'',
   classMenu2:'',
   classMenu3:'',
   classMenu4:'',
   classMenu5:'',
   classMenu6:'',
   classMenu7:'',
   classMenu8:'',
   classMenu9:'active',
   classMenu10:'',
   classMenu11:'',
   classMenu12:'',


   divprincipal:false,

   investigaciones: [],
   docentes: [],
   temas: [],
   errors:[],

   fillInvestigaciones:{'id':'', 'titulo':'','descripcion':'','fechapublicacion':'','imagen':'','ruta':'','estado':'','docente_id':'','tema_id':''},

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

   newTitulo:'',
   newDescripcion:'',
   newFechapublicacion:'',
   imagen : null,
   ruta : null,
   docente_id : '0',
   tema_id : '0',
   newEstado:'1',




},
created:function () {
   this.getBannerFacultad(this.thispage);
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
    getfile(investigaciones){
        var ruta_pdf = "{{ asset('/') }}doc/investigaciones/"+ investigaciones.ruta;
        window.open(ruta_pdf);
    },
    getImg(investigaciones){
        var img = "{{ asset('/') }}img/investigaciones/"+ investigaciones.imagen;
        return img;
    },
    getBannerFacultad: function (page) {
       var busca=this.buscar;
       var url = 'investigacion?page='+page+'&busca='+busca;
       axios.get(url).then(response=>{
           
            this.investigaciones = response.data.investigaciones.data;
            this.pagination= response.data.pagination;
            this.docentes = response.data.docentes;
            this.temas = response.data.temas;

           if(this.investigaciones.length==0 && this.thispage!='1'){
               var a = parseInt(this.thispage) ;
               a--;
               this.thispage=a.toString();
               this.changePage(this.thispage);
           }
       })
   },
   changePage:function (page) {
       this.pagination.current_page=page;
       this.getBannerFacultad(page);
       this.thispage=page;
   },
   buscarBtn: function () {
       this.getBannerFacultad();
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
       $('#txttitulo').focus();

        this.newTitulo = '';
        this.newDescripcion = '';
        this.newFechapublica = '';
        this.newEstado = '1';
        this.imagen = null;

       $(".form-control").css("border","1px solid #d2d6de");
   },
   getImage(event){
        if (!event.target.files.length)
        {
            this.imagen=null;
        }
        else{
            this.imagen = event.target.files[0];
        }
    },
    getdoc(event){
        if (!event.target.files.length)
        {
            this.ruta=null;
        }
        else{
            this.ruta = event.target.files[0];
        }
    },
    create:function () { 

       var url='investigacion';
       $("#btnGuardar").attr('disabled', true);
       $("#btnCancel").attr('disabled', true);
       $("#btnClose").attr('disabled', true);
       this.divloaderNuevo=true;
       $(".form-control").css("border","1px solid #d2d6de");

       var data = new  FormData();

            data.append('titulo', this.newTitulo);
            data.append('descripcion', this.newDescripcion);
            data.append('fechapublicacion', this.newFechapublicacion);
            data.append('imagen', this.imagen);
            data.append('ruta', this.ruta);
            data.append('docente_id', this.docente_id);
            data.append('tema_id', this.tema_id);
            data.append('activo', this.newEstado);

            
        const config = { headers: { 'Content-Type': 'multipart/form-data' } };
        axios.post(url,data,config).then(response=>{

        $("#btnGuardar").removeAttr("disabled");
        $("#btnCancel").removeAttr("disabled");
        $("#btnClose").removeAttr("disabled");
        this.divloaderNuevo=false;
                
                
        if(String(response.data.result)=='1'){
            this.getBannerFacultad(this.thispage);
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
   borrarbanner:function (Investigaciones) {
    
        swal.fire({
             title: '¿Estás seguro?',
             text: "¿Desea eliminar el Banner Seleccionado? -- Nota: este proceso no se podrá revertir.",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, eliminar'
           }).then((result) => {

            if (result.value) {

                var url = 'investigacion/'+Investigaciones.idinves;
                axios.delete(url).then(response=>{//eliminamos

                if(response.data.result=='1'){
                    app.getBannerFacultad(app.thispage);//listamos
                    toastr.success(response.data.msj);//mostramos mensaje
                }else{
                    // $('#'+response.data.selector).focus();
                    toastr.error(response.data.msj);
                }
                })
                }

                   
               }).catch(swal.noop);  
   },

   editbanner:function (investigaciones) {

        this.fillInvestigaciones.id=investigaciones.idinves;
        this.fillInvestigaciones.titulo=investigaciones.titulo;
        this.fillInvestigaciones.descripcion=investigaciones.descripcion;
        this.fillInvestigaciones.fechapublicacion=investigaciones.fechapublicacion;            
        this.fillInvestigaciones.estado=investigaciones.activo;
        this.fillInvestigaciones.docente_id=investigaciones.iddocen;
        this.fillInvestigaciones.tema_id=investigaciones.idtema;
        this.imagen=null;
        this.ruta=null;

        $("#modalEditar").modal('show');
        this.$nextTick(function () {
                $("#txttituloE").focus();
        })
            
   },
   updateBanner:function (id) {

        var data = new FormData();

        data.append('id', this.fillInvestigaciones.id);
        data.append('titulo', this.fillInvestigaciones.titulo);
        data.append('descripcion', this.fillInvestigaciones.descripcion);
        data.append('fechapublicacion', this.fillInvestigaciones.fechapublicacion);
        data.append('ruta', this.ruta);
        data.append('imagen', this.imagen);
        data.append('docente_id', this.fillInvestigaciones.docente_id);
        data.append('tema_id', this.fillInvestigaciones.tema_id);
        data.append('_method', 'PUT');

        const config = { headers: { 'Content-Type': 'multipart/form-data' } };
        
        var url = "investigacion/" + id;

        $("#btnSaveE").attr('disabled', true);
        $("#btnCloseE").attr('disabled', true);
        this.divloaderEdit = true;

        axios.post(url, data, config).then(response => {

           $("#btnSaveE").removeAttr("disabled");
           $("#btnCancelE").removeAttr("disabled");
           this.divloaderEdit=false;
           
           if(response.data.result=='1'){   
           this.getBannerFacultad(this.thispage);
           this.fillLocal={'id':'', 'titulo':'', 'fechapublicacion':'','ruta':'','imagen':'','docente_id':''};
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
    bajabanner:function (investigacion) {
    swal.fire({
             title: '¿Estás seguro?',
             text: "Desea desactivar la Investigacion seleccionado",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, Desactivar'
           }).then((result) => {

            if (result.value) {

                var url = 'investigacion/altabaja/'+investigacion.idinves+'/0';
                       axios.get(url).then(response=>{//eliminamos
                       if(response.data.result=='1'){
                           app.getBannerFacultad(app.thispage);//listamos
                           toastr.success(response.data.msj);//mostramos mensaje
                       }else{
                          // $('#'+response.data.selector).focus();
                           toastr.error(response.data.msj);
                       }
                       });
                }
               }).catch(swal.noop);  

   },
   altabanner:function (Investigaciones) {
    swal.fire({
             title: '¿Estás seguro?',
             text: "Desea activar la Investigacion seleccionado",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, Activar'
           }).then((result) => {

            if (result.value) {

                var url = 'investigacion/altabaja/'+Investigaciones.idinves+'/1';
                       axios.get(url).then(response=>{//eliminamos
                       if(response.data.result=='1'){
                           app.getBannerFacultad(app.thispage);//listamos
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