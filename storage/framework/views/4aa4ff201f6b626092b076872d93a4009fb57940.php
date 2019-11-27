<script type="text/javascript">
    let app = new Vue({
el: '#app',
data:{
       titulo:"Mantenimiento",
       subtitulo: "Gestión de Facultades",
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

   facultades: [],
   cant_filas: [],
   errors:[],

   fillFacultad:{'id':'', 'nombre':'', 'abreviatura':'','activo':''},

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

   newNombre:'',
   newAbreviatura:'',
   newEstado:'',


},
created:function () {
   this.getFacultades(this.thispage);
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
    getFacultades: function (page) {
       var busca=this.buscar;
       var url = 'facultad?page='+page+'&busca='+busca;

       axios.get(url).then(response=>{
            this.facultades= response.data.facultades.data;
            this.pagination= response.data.pagination;
            this.cant_filas = response.data.cant_filas;

            this.$nextTick(function () {
                //this.recorrerFacultades();
            })

           if(this.facultades.length == 0 && this.thispage != '1'){
               var a = parseInt(this.thispage) ;
               a--;
               this.thispage=a.toString();
               this.changePage(this.thispage);
           }
       })
   },
   changePage:function (page) {
       this.pagination.current_page=page;
       this.getFacultades(page);
       this.thispage=page;
   },
   buscarBtn: function () {
       this.getFacultades();
       this.thispage='1';
   },
   nuevo:function () {
       if (this.cant_filas.filas == 0) {
            this.divNuevo=true;
            //$("#txtespecialidad").focus();
            //$('#txtespecialidad').focus();
            this.$nextTick(function () {
            this.cancelFormNuevo();
            })
       } else {
            this.divNuevo=false;
            //$("#txtespecialidad").focus();
            //$('#txtespecialidad').focus();
            this.$nextTick(function () {
            this.cancelFormNuevo();
            toastr.error('YA SE CUENTA CON EL REGISTRO DE UNA FACULTAD');
            })
       }
         
   },
   cerrarFormNuevo: function () {
       this.divNuevo=false;
       this.cancelFormNuevo();
   },
   cancelFormNuevo: function () {
       $('#nombre').focus();

        this.newNombre = '';
        this.newAbreviatura = '';
        this.newEstado = '1';

       $(".form-control").css("border","1px solid #d2d6de");
   },
    create:function () {

       var url='facultad';
       $("#btnGuardar").attr('disabled', true);
       $("#btnCancel").attr('disabled', true);
       $("#btnClose").attr('disabled', true);
       this.divloaderNuevo=true;
       $(".form-control").css("border","1px solid #d2d6de");

       var data = new  FormData();

            data.append('nombre', this.newNombre);
            data.append('abreviatura', this.newAbreviatura);
            data.append('activo', this.newEstado);

        const config = { headers: { 'Content-Type': 'multipart/form-data' } };
            
            axios.post(url,data,config).then(response=>{
           //console.log(response.data);

           $("#btnGuardar").removeAttr("disabled");
           $("#btnCancel").removeAttr("disabled");
           $("#btnClose").removeAttr("disabled");
           this.divloaderNuevo=false;

   
           if(String(response.data.result)=='1'){
               this.getFacultades(this.thispage);
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
   borrarfacultad:function (facultad) {
    
        swal.fire({
             title: '¿Estás seguro?',
             text: "¿Desea eliminar la Facultad Seleccionado? -- Nota: este proceso no se podrá revertir.",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, eliminar'
           }).then((result) => {

            if (result.value) {

                var url = 'facultad/'+facultad.id;
                axios.delete(url).then(response=>{//eliminamos

                if(response.data.result=='1'){
                    app.getFacultades(app.thispage);//listamos
                    toastr.success(response.data.msj);//mostramos mensaje
                }else{
                    // $('#'+response.data.selector).focus();
                    toastr.error(response.data.msj);
                }
                })
                }

                   
               }).catch(swal.noop);  
   },

   editfacultad:function (facultad) {

        this.fillFacultad.id=facultad.id;
        this.fillFacultad.nombre=facultad.nombre;
        this.fillFacultad.abreviatura=facultad.abreviatura;  
      
        this.$nextTick(function () {
        $("#cbdepartamentoE").val( fillFacultad.departamentoacad_id);
            
    });
       $("#boxTitulo").text('Facultad: '+facultad.nombre);
       $("#modalEditar").modal('show');
       $("#txtfacE").focus();
    },
   updateFacultad:function (id) {

    var data = new FormData();
        data.append('id', this.fillFacultad.id);
        data.append('nombre', this.fillFacultad.nombre);
        data.append('abreviatura', this.fillFacultad.abreviatura);
        data.append('_method', 'PUT');

        const config = { headers: { 'Content-Type': 'multipart/form-data' } };
        
        var url = "facultad/" + id;

        $("#btnSaveE").attr('disabled', true);
        $("#btnCloseE").attr('disabled', true);
        this.divloaderEdit = true;

        axios.post(url, data, config).then(response => {

           $("#btnSaveE").removeAttr("disabled");
           $("#btnCancelE").removeAttr("disabled");
           this.divloaderEdit=false;
           
           if(response.data.result=='1'){   
           this.getFacultades(this.thispage);
           this.fillLocal={'id':'', 'nombre':'','abreviatura':''};
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
    bajafacultad:function (facultad) {

    swal.fire({
             title: '¿Estás seguro?',
             text: "Desea desactivar la Facultad seleccionado",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, Desactivar'
           }).then((result) => {

            if (result.value) {

                var url = 'facultad/altabaja/'+facultad.id+'/0';
                       axios.get(url).then(response=>{//eliminamos
                       if(response.data.result=='1'){
                           app.getFacultades(app.thispage);//listamos
                           toastr.success(response.data.msj);//mostramos mensaje
                       }else{
                          // $('#'+response.data.selector).focus();
                           toastr.error(response.data.msj);
                       }
                       });
                }
               }).catch(swal.noop);  

   },
   altafacultad:function (facultad) {

    swal.fire({
             title: '¿Estás seguro?',
             text: "Desea activar la Facultad seleccionado",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, Activar'
           }).then((result) => {

            if (result.value) {

                var url = 'facultad/altabaja/'+facultad.id+'/1';
                       axios.get(url).then(response=>{//eliminamos

                       if(response.data.result=='1'){
                           app.getFacultades(app.thispage);//listamos
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
</script><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/facultades/vue.blade.php ENDPATH**/ ?>