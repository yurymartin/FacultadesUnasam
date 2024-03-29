<script type="text/javascript">
    let app = new Vue({
el: '#app',
data:{
       titulo:"Mantenimiento",
       subtitulo: "Gestión de los Comites Estudiantiles",
       subtitulo2: "Principal",

   subtitle2:false,
   subtitulo2:"",

   tipouserPerfil:'',
   userPerfil:'<?php echo e(Auth::user()->name); ?>',
   mailPerfil:'<?php echo e(Auth::user()->email); ?>',

   
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
   classMenu8:'active',
   classMenu9:'',
   classMenu10:'',
   classMenu11:'',
   classMenu12:'',


   divprincipal:false,

   comiteestudiantil: [],
   escuelas: [],
   errors:[],

   fillGalEcuela:{'id':'', 'imagen':'', 'descripcion':'','estado':'','escuela_id':''},

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
    getImg(comestudiantil){
        var img = "<?php echo e(asset('/')); ?>img/ComiteEscuelas/"+ comestudiantil.imagen;
        return img;
    },
   getBanner: function (page) {
       var busca=this.buscar;
       var url = 'estudiantil?page='+page+'&busca='+busca;
        
       axios.get(url).then(response=>{
            this.comiteestudiantil= response.data.comiteestudiantil.data;
            this.pagination= response.data.pagination;
           if(this.comiteestudiantil.length==0 && this.thispage!='1'){
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

        this.newTitulo = '';
        this.newDescripcion = '';
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

       var url='estudiantil';
       $("#btnGuardar").attr('disabled', true);
       $("#btnCancel").attr('disabled', true);
       $("#btnClose").attr('disabled', true);
       this.divloaderNuevo=true;
       $(".form-control").css("border","1px solid #d2d6de");

       var data = new  FormData();

            data.append('titulo', this.newTitulo);
            data.append('descripcion', this.newDescripcion);
            data.append('imagen', this.imagen);
            data.append('activo', this.newEstado);
            data.append('borrado', this.newBorrado);
            
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
   borrarbanner:function (comestudiantil) {
    
        swal.fire({
             title: '¿Estás seguro?',
             text: "¿Desea eliminar el Comite estudiantil Seleccionado? -- Nota: este proceso no se podrá revertir.",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, eliminar'
           }).then((result) => {

            if (result.value) {

                var url = 'estudiantil/'+comestudiantil.id;
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

   editGalEscu:function (comestudiantil) {

        this.fillGalEcuela.id=comestudiantil.id;        
        this.fillGalEcuela.titulo=comestudiantil.titulo;   
        this.fillGalEcuela.descripcion=comestudiantil.descripcion; 
        this.fillGalEcuela.imagen=comestudiantil.imagen;           
        this.fillGalEcuela.estado=comestudiantil.activo;
        this.fillGalEcuela.escuela_id=comestudiantil.idescu;
        
        this.imagen=null;
        console.log();
        $("#modalEditar").modal('show');
        this.$nextTick(function () {
                $("#txttituloE").focus();
        })
            
   },
   updateGalEscuela:function (id) {

        var data = new FormData();

        data.append('idComite', this.fillGalEcuela.id);        
        data.append('editTitulo', this.fillGalEcuela.titulo);
        data.append('editDescripcion', this.fillGalEcuela.descripcion);
        data.append('imagen', this.imagen);
        data.append('oldImagen', this.fillGalEcuela.imagen);
        data.append('editEstado', this.fillGalEcuela.estado);        
        data.append('_method', 'PUT');

        const config = { headers: { 'Content-Type': 'multipart/form-data' } };
        
        var url = "estudiantil/" + id;

        $("#btnSaveE").attr('disabled', true);
        $("#btnCloseE").attr('disabled', true);
        this.divloaderEdit = true;

        axios.post(url, data, config).then(response => {

           $("#btnSaveE").removeAttr("disabled");
           $("#btnCancelE").removeAttr("disabled");
           this.divloaderEdit=false;
           
           if(response.data.result=='1'){   
           this.getBanner(this.thispage);
           this.fillLocal={'id':'','titulo':'', 'descripcion':'', 'imagen':'','estado':''};
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
    bajabanner:function (comestudiantil) {
    swal.fire({
             title: '¿Estás seguro?',
             text: "Desea desactivar el Comite estudiantil seleccionado",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, Desactivar'
           }).then((result) => {

            if (result.value) {

                var url = 'estudiantil/altabaja/'+comestudiantil.id+'/0';
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
   altabanner:function (comestudiantil) {
    swal.fire({
             title: '¿Estás seguro?',
             text: "Desea activar el Comite estudiantil seleccionado",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, Activar'
           }).then((result) => {

            if (result.value) {

                var url = 'estudiantil/altabaja/'+comestudiantil.id+'/1';
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
</script><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/comiteestudiantil/vue.blade.php ENDPATH**/ ?>