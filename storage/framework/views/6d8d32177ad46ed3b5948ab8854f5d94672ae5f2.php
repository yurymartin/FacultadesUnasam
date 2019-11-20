<script type="text/javascript">
    let app = new Vue({
el: '#app',
data:{
       titulo:"Mantenimiento",
       subtitulo: "Gestión de Docentes",
       subtitulo2: "Principal",

   subtitle2:false,
   subtitulo2:"",

   tipouserPerfil:'<?php echo e($tipouser->nombre); ?>',
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
   classMenu1:'active',
   classMenu2:'',
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

   docentes: [],
   errors:[],

   fillDocente:{'id':'','dni':'','nombres':'','apellidos':'','foto':'','curricula':'', 'tituloprofe':'','fechaingreso':'','estado':'','gradoacademico_id':'','categoriadocen_id':''},

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
  
   newDni:'',
   newNombres:'',
   newApellidos:'',
   newCurricula:'',
   newTituloprofe:'',
   newFechaingreso:'',
   newEstado:'1',
   newFoto : null,



},
created:function () {
   this.getDocentes(this.thispage);
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
    getImg(docente){
        var img = "<?php echo e(asset('/')); ?>img/personas/"+ docente.foto;
        return img;
    },
   getDocentes: function (page) {
       var busca=this.buscar;
       var url = 'docente?page='+page+'&busca='+busca;
        

       axios.get(url).then(response=>{
            this.docentes= response.data.docentes.data;
            this.pagination= response.data.pagination;

           if(this.docentes.length==0 && this.thispage!='1'){
               var a = parseInt(this.thispage) ;
               a--;
               this.thispage=a.toString();
               this.changePage(this.thispage);
           }
       })
   },
   changePage:function (page) {
       this.pagination.current_page=page;
       this.getDocentes(page);
       this.thispage=page;
   },
   buscarBtn: function () {
       this.getDocentes();
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
       $('#txtNombre').focus();

        this.newDni='';
        this.newNombres='';
        this.newApellidos = '';
        this.newCurricula = '';
        this.newFechaingreso = '';
        this.newEstado = '1';
        this.newFoto = null;

       $(".form-control").css("border","1px solid #d2d6de");
   },
   getImage(event){
        if (!event.target.files.length)
        {
            this.newFoto=null;
        }
        else{
            this.newFoto = event.target.files[0];
        }
    },
    recorrerBanner:function () { 
            $.each($(".txtimg"), function( index, value ) {
             //  var valor=$(this).attr("id");
             var idusar=$(this).val();

             $("#ImgPerfilNuevoE"+idusar).attr("src","<?php echo e(asset('/img/banners/')); ?>"+"/"+$("#txt"+idusar).val());
         });
    },
    create:function () { 

       var url='docente';
       $("#btnGuardar").attr('disabled', true);
       $("#btnCancel").attr('disabled', true);
       $("#btnClose").attr('disabled', true);
       this.divloaderNuevo=true;
       $(".form-control").css("border","1px solid #d2d6de");

       var data = new  FormData();

            data.append('nombres', this.newDescripcion);
            data.append('nombres', this.newDescripcion);
            data.append('apellidos', this.imagen);
            data.append('foto', this.newEstado);
            data.append('genero', this.newEstado);
            data.append('curricula', this.newEstado);
            data.append('tituloprofe', this.newEstado);
            data.append('fechaingreso', this.newEstado);
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
   borrardocente:function (docentes) {
    
        swal.fire({
             title: '¿Estás seguro?',
             text: "¿Desea eliminar el docente Seleccionado? -- Nota: este proceso no se podrá revertir.",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, eliminar'
           }).then((result) => {

            if (result.value) {

                var url = 'docente/'+docentes.id;
                axios.delete(url).then(response=>{//eliminamos

                if(response.data.result=='1'){
                    app.getDocentes(app.thispage);//listamos
                    toastr.success(response.data.msj);//mostramos mensaje
                }else{
                    // $('#'+response.data.selector).focus();
                    toastr.error(response.data.msj);
                }
                })
                }

                   
               }).catch(swal.noop);  
   },

   editbanner:function (docente) {

        this.fillDocente.id=docente.id;
        this.fillDocente.dni=docente.dni;
        this.fillDocente.nombres=docente.nombres;            
        this.fillDocente.apellidos=docente.apellidos;
        this.fillDocente.estado=docente.activo;
        this.imagen=null;

        $("#modalEditar").modal('show');
        this.$nextTick(function () {
                $("#txttituloE").focus();
        })
            
   },
   updateBanner:function (id) {

        var data = new FormData();

        data.append('id', this.fillDocente.id);
        data.append('nombres', this.fillDocente.nombres);
        data.append('apellidos', this.fillDocente.apellidos);
        data.append('editEstado', this.fillDocente.estado);
        data.append('imagen', this.imagen);
        data.append('oldImagen', this.fillDocente.imagen);
        data.append('_method', 'PUT');

        const config = { headers: { 'Content-Type': 'multipart/form-data' } };
        
        var url = "docente/" + id;

        $("#btnSaveE").attr('disabled', true);
        $("#btnCloseE").attr('disabled', true);
        this.divloaderEdit = true;

        axios.post(url, data, config).then(response => {

           $("#btnSaveE").removeAttr("disabled");
           $("#btnCancelE").removeAttr("disabled");
           this.divloaderEdit=false;
           
           if(response.data.result=='1'){   
           this.getDocentes(this.thispage);
           this.fillLocal={'id':'', 'titulo':'', 'descripcion':'','imagen':'','estado':''};
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
    bajadocente:function (docentes) {

    swal.fire({
             title: '¿Estás seguro?',
             text: "Desea desactivar el docente seleccionado",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, Desactivar'
           }).then((result) => {
            if (result.value) {
                var url = 'docente/altabaja/'+docentes.id+'/0';
                       axios.get(url).then(response=>{//eliminamos
                       if(response.data.result=='1'){
                           app.getDocentes(app.thispage);//listamos
                           toastr.success(response.data.msj);//mostramos mensaje
                       }else{
                          // $('#'+response.data.selector).focus();
                           toastr.error(response.data.msj);
                       }
                       });
                }
               }).catch(swal.noop);  

   },
   altadocente:function (docentes) {

    swal.fire({
             title: '¿Estás seguro?',
             text: "Desea activar el docente seleccionado",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, Activar'
           }).then((result) => {

            if (result.value) {

                var url = 'docente/altabaja/'+docentes.id+'/1';
                       axios.get(url).then(response=>{//eliminamos

                       if(response.data.result=='1'){
                           app.getDocentes(app.thispage);//listamos
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
</script><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/docentes/vue.blade.php ENDPATH**/ ?>