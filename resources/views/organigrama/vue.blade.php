<script type="text/javascript">
    let app = new Vue({
el: '#app',
data:{
       titulo:"Mantenimiento",
       subtitulo: "Gestión de Organigramas",
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
   classMenu2:'active   ',
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

   organigramafacultades: [],
   escuelas: [],
   errors:[],

   fillGalEcuela:{'id':'', 'imagen':'', 'fecha':'','estado':'','descripcion':''},

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

   
   newDescripcion:'',
   newFecha:'',
   newEstado:'1',
   newBorrado:'0',
   imagen : null,
   



},
created:function () {
   this.getBanner(this.thispage);
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
    getImg(organi){
        var img = "{{ asset('/') }}img/Organigramas/"+ organi.imagen;
        return img;
    },
   getBanner: function (page) {
       var busca=this.buscar;
       var url = 'organigramafacultad?page='+page+'&busca='+busca;
        
       axios.get(url).then(response=>{
            this.organigramafacultades= response.data.organigramafacultades.data;
            this.pagination= response.data.pagination;
            this.escuelas = response.data.escuelas;
           if(this.organigramafacultades.length==0 && this.thispage!='1'){
               var a = parseInt(this.thispage) ;
               a--;
               this.thispage=a.toString();
               this.changePage(this.thispage);
           }
       })
   },
   changePage:function (page) {
       this.pagination.current_page=page;
       this.getBanner(page);
       this.thispage=page;
   },
   buscarBtn: function () {
       this.getBanner();
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

        this.newFecha = '';
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
    
    create:function () { 

       var url='organigramafacultad';
       $("#btnGuardar").attr('disabled', true);
       $("#btnCancel").attr('disabled', true);
       $("#btnClose").attr('disabled', true);
       this.divloaderNuevo=true;
       $(".form-control").css("border","1px solid #d2d6de");

       var data = new  FormData();

            
            data.append('imagen', this.imagen);
            data.append('descripcion', this.newDescripcion);
            data.append('activo', this.newEstado);
            
            const config = { headers: { 'Content-Type': 'multipart/form-data' } };
            axios.post(url,data,config).then(response=>{

                $("#btnGuardar").removeAttr("disabled");
                $("#btnCancel").removeAttr("disabled");
                $("#btnClose").removeAttr("disabled");
                this.divloaderNuevo=false;
                
                
                if(String(response.data.result)=='1'){
                    this.getBanner(this.thispage);
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
   borrarbanner:function (organi) {
    
        swal.fire({
             title: '¿Estás seguro?',
             text: "¿Desea eliminar el organigrama Seleccionado? -- Nota: este proceso no se podrá revertir.",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, eliminar'
           }).then((result) => {

            if (result.value) {

                var url = 'organigramafacultad/'+organi.id;
                axios.delete(url).then(response=>{//eliminamos

                if(response.data.result=='1'){
                    app.getBanner(app.thispage);//listamos
                    toastr.success(response.data.msj);//mostramos mensaje
                }else{
                    // $('#'+response.data.selector).focus();
                    toastr.error(response.data.msj);
                }
                })
                }

                   
               }).catch(swal.noop);  
   },

   editGalEscu:function (organi) {

        this.fillGalEcuela.id=organi.id;
        this.fillGalEcuela.imagen=organi.imagen;
        this.fillGalEcuela.descripcion=organi.descripcion;
        this.fillGalEcuela.estado=organi.activo;
        
        
        this.imagen=null;
        console.log();
        $("#modalEditar").modal('show');
        this.$nextTick(function () {
                $("#txttituloE").focus();
        })
            
   },
   updateGalEscuela:function (id) {

        var data = new FormData();

        data.append('idOrganigrama', this.fillGalEcuela.id);
        data.append('imagen', this.imagen);
        data.append('descripcion', this.fillGalEcuela.descripcion);
        data.append('oldImagen', this.fillGalEcuela.imagen);
        data.append('editEstado', this.fillGalEcuela.estado);        
        data.append('_method', 'PUT');

        const config = { headers: { 'Content-Type': 'multipart/form-data' } };
        
        var url = "organigramafacultad/" + id;

        $("#btnSaveE").attr('disabled', true);
        $("#btnCloseE").attr('disabled', true);
        this.divloaderEdit = true;

        axios.post(url, data, config).then(response => {

           $("#btnSaveE").removeAttr("disabled");
           $("#btnCancelE").removeAttr("disabled");
           this.divloaderEdit=false;
           
           if(response.data.result=='1'){   
           this.getBanner(this.thispage);
           this.fillLocal={'id':'', 'imagen':'', 'fecha':'','estado':''};
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
    bajabanner:function (organi) {
    swal.fire({
             title: '¿Estás seguro?',
             text: "Desea desactivar el organigrama seleccionado",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, Desactivar'
           }).then((result) => {

            if (result.value) {

                var url = 'organigramafacultad/altabaja/'+organi.id+'/0';
                       axios.get(url).then(response=>{//eliminamos
                       if(response.data.result=='1'){
                           app.getBanner(app.thispage);//listamos
                           toastr.success(response.data.msj);//mostramos mensaje
                       }else{
                          // $('#'+response.data.selector).focus();
                           toastr.error(response.data.msj);
                       }
                       });
                }
               }).catch(swal.noop);  

   },
   altabanner:function (organi) {
    swal.fire({
             title: '¿Estás seguro?',
             text: "Desea activar el organigrama seleccionado",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, Activar'
           }).then((result) => {

            if (result.value) {

                var url = 'organigramafacultad/altabaja/'+organi.id+'/1';
                       axios.get(url).then(response=>{//eliminamos
                       if(response.data.result=='1'){
                           app.getBanner(app.thispage);//listamos
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