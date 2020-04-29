<script type="text/javascript">
    let app = new Vue({
el: '#app',
data:{
       titulo:"Mantenimiento",
       subtitulo: "Gestión de Mallas Curriculares",
       subtitulo2: "Principal",

   subtitle2:false,
   subtitulo2:"",

   tipouserPerfil:'',
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
   classMenu4:'active',
   classMenu5:'',
   classMenu6:'',
   classMenu7:'',
   classMenu8:'',
   classMenu9:'',
   classMenu10:'',
   classMenu11:'',
   classMenu12:'',


   divprincipal:false,

   mallaescuelas: [],
   escuelas: [],
   errors:[],
   
   fillGalEcuela:{'id':'', 'imagen':'', 'numcurricula':'','fechaRegistro':'','estado':'','escuela_id':''},

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

   
   newCurricula:'',
   newEstado:'1',
   newBorrado:'0',
   imagen : null,
   escuela_id: '0',



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
    getImg(mallaE){
        var img = "{{ asset('/') }}img/mallaEscuelas/"+ mallaE.imagen;
        return img;
    },
   getBanner: function (page) {
       var busca=this.buscar;
       var url = 'mallaescuela?page='+page+'&busca='+busca;
        
       axios.get(url).then(response=>{
            this.mallaescuelas= response.data.mallaescuelas.data;
            this.pagination= response.data.pagination;
            this.escuelas = response.data.escuelas;
           if(this.mallaescuelas.length==0 && this.thispage!='1'){
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
        this.newCurricula = '';
        this.newFechapublica = '';
        this.newEstado = '1';
        this.imagen = null;
        this.escuela_id = '0';

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

       var url='mallaescuela';
       $("#btnGuardar").attr('disabled', true);
       $("#btnCancel").attr('disabled', true);
       $("#btnClose").attr('disabled', true);
       this.divloaderNuevo=true;
       $(".form-control").css("border","1px solid #d2d6de");

       var data = new  FormData();

            data.append('numcurricula', this.newCurricula);
            data.append('imagen', this.imagen);
            data.append('activo', this.newEstado);
            data.append('escuela_id', this.escuela_id);
            data.append('borrado', this.newBorrado);
            console.log(this.newCurricula);
            
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
   borrarbanner:function (mallaE) {
    
        swal.fire({
             title: '¿Estás seguro?',
             text: "¿Desea eliminar la malla curricular Seleccionado? -- Nota: este proceso no se podrá revertir.",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, eliminar'
           }).then((result) => {

            if (result.value) {

                var url = 'mallaescuela/'+mallaE.id;
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

   editGalEscu:function (mallaE) {

        this.fillGalEcuela.id=mallaE.id;
        this.fillGalEcuela.imagen=mallaE.imagen;
        this.fillGalEcuela.numcurricula=mallaE.numcurricula;   
        this.fillGalEcuela.escuela_id=mallaE.idescu;
        this.imagen=null;

        $("#modalEditar").modal('show');
        this.$nextTick(function () {
                $("#txttituloE").focus();
        })
            
   },
   updateGalEscuela:function (id) {

        var data = new FormData();

        data.append('idmalla', this.fillGalEcuela.id);
        data.append('imagen', this.imagen);
        data.append('oldImagen', this.fillGalEcuela.imagen);
        data.append('editDescripcion', this.fillGalEcuela.numcurricula);     
       var newEscuela = $("#cbescuela").val();
            data.append('escuela_id', newEscuela);
        data.append('_method', 'PUT');

        const config = { headers: { 'Content-Type': 'multipart/form-data' } };
        
        var url = "mallaescuela/" + id;

        $("#btnSaveE").attr('disabled', true);
        $("#btnCloseE").attr('disabled', true);
        this.divloaderEdit = true;

        axios.post(url, data, config).then(response => {

           $("#btnSaveE").removeAttr("disabled");
           $("#btnCancelE").removeAttr("disabled");
           this.divloaderEdit=false;
           
           if(response.data.result=='1'){   
           this.getBanner(this.thispage);
           this.fillLocal={'id':'', 'imagen':'', 'numcurricula':'','estado':''};
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
    bajabanner:function (mallaE) {
    swal.fire({
             title: '¿Estás seguro?',
             text: "Desea desactivar la malla curricular seleccionada",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, Desactivar'
           }).then((result) => {
            if (result.value) {

                var url = 'mallaescuela/altabaja/'+mallaE.id+'/0';
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
   altabanner:function (mallaE) {
    swal.fire({
             title: '¿Estás seguro?',
             text: "Desea activar la malla curricular seleccionada",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, Activar'
           }).then((result) => {

            if (result.value) {

                var url = 'mallaescuela/altabaja/'+mallaE.id+'/1';
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