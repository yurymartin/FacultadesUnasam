<script type="text/javascript">
    let app = new Vue({
el: '#app',
data:{
       titulo:"Mantenimiento",
       subtitulo: "Gestión de Convocatorias",
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

   convocatorias: [],
   facultads: [],
   tipoconvocatorias: [],
   errors:[],

   fillConvocatoria:{'id':'', 'convocatoria':'', 'requerido':'', 'asignaturas':'', 'nroplazas':'', 'fechaini':'', 'fechafin':'', 'tipoconvocatoria_id':'', 'facultad_id':'','imagen':''},

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

   newConvocatoria:'',
   newAsignaturas:'',
   newRequerido:'',
   newNroPlazas:'',
   newFechaInicio:'',
   newFechaFin:'',
   newTipoConvocatoria:'0',
   newFacultad:'0',
   imagen : null,

},
created:function () {
   this.getConvocatoria(this.thispage);
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
    getPDF(convocatoria){
        
        var doc = "img/convocatorias/"+ convocatoria.ruta;

        return doc;
    },
   getConvocatoria: function (page) {
       var busca=this.buscar;
       var url = 'convocatoria?page='+page+'&busca='+busca;
        

       axios.get(url).then(response=>{
            this.convocatorias= response.data.convocatorias.data;
            this.pagination= response.data.pagination;
            this.tipoconvocatorias= response.data.tipoconvocatorias;
            this.facultads= response.data.facultads;

           if(this.convocatorias.length==0 && this.thispage!='1'){
               var a = parseInt(this.thispage) ;
               a--;
               this.thispage=a.toString();
               this.changePage(this.thispage);
           }
       })
   },
   changePage:function (page) {
       this.pagination.current_page=page;
       this.getConvocatoria(page);
       this.thispage=page;
   },
   buscarBtn: function () {
       this.getConvocatoria();
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

        $('#txtconvocatoria').focus();
        this.newConvocatoria = '',
        this.newAsignaturas = '',
        this.newRequerido = '',
        this.newNroPlazas = '',
        this.newFechaInicio = '',
        this.newFechaFin = '',
        this.newFacultad = '0',
        this.newTipoConvocatoria = '0',
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

       var url='convocatoria';
       $("#btnGuardar").attr('disabled', true);
       $("#btnCancel").attr('disabled', true);
       $("#btnClose").attr('disabled', true);
       this.divloaderNuevo=true;
       $(".form-control").css("border","1px solid #d2d6de");

       var data = new  FormData();

       var tipoconvocatoria_id=$("#cbuTipoConvocatorias").val();
       var facultad_id=$("#cbuFacultades").val();

            data.append('convocatoria', this.newConvocatoria);
            data.append('asignaturas', this.newAsignaturas);
            data.append('requerido', this.newRequerido);
            data.append('nroplazas', this.newNroPlazas);
            data.append('fechaini', this.newFechaInicio);
            data.append('fechafin', this.newFechaFin);
            data.append('tipoconvocatoria_id', tipoconvocatoria_id);
            data.append('facultad_id', facultad_id);
            data.append('imagen', this.imagen);
            
            const config = { headers: { 'Content-Type': 'multipart/form-data' } };

            axios.post(url,data,config).then(response=>{

                $("#btnGuardar").removeAttr("disabled");
                $("#btnCancel").removeAttr("disabled");
                $("#btnClose").removeAttr("disabled");
                this.divloaderNuevo=false;
        
                if(String(response.data.result)=='1'){
                    this.getConvocatoria(this.thispage);
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
   borrarconvocatoria:function (convocatoria) {
    
        swal.fire({
             title: '¿Estás seguro?',
             text: "¿Desea eliminar la Convocatoria Seleccionada? -- Nota: este proceso no se podrá revertir.",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, eliminar'
           }).then((result) => {

            if (result.value) {

                var url = 'convocatoria/'+convocatoria.id;
                axios.delete(url).then(response=>{//eliminamos

                if(response.data.result=='1'){
                    app.getConvocatoria(app.thispage);//listamos
                    toastr.success(response.data.msj);//mostramos mensaje
                }else{
                    // $('#'+response.data.selector).focus();
                    toastr.error(response.data.msj);
                }
                })
                }

                   
               }).catch(swal.noop);  
   },

   editconvocatoria:function (convocatoria) {

        this.fillConvocatoria.id=convocatoria.id;
        this.fillConvocatoria.convocatoria=convocatoria.convocatoria;
        this.fillConvocatoria.requerido=convocatoria.requerido;       
        this.fillConvocatoria.asignaturas=convocatoria.asignaturas;       
        this.fillConvocatoria.nroplazas=convocatoria.nroplazas;       
        this.fillConvocatoria.fechaini=convocatoria.fechaini;       
        this.fillConvocatoria.fechafin=convocatoria.fechafin;          
        this.fillConvocatoria.imagen=convocatoria.ruta;
        this.imagen=null;

        $('#cbuTipoConvocatoriasE').val(convocatoria.idtipoconv);
        $('#cbuFacultadesE').val(convocatoria.idfac);

        CKEDITOR.instances['txtasignaturasE'].setData(convocatoria.asignaturas);


        $("#modalEditar").modal('show');
        this.$nextTick(function () {
                $("#txttituloE").focus();
        })
            
   },
   updateConvocatoria:function (id) {

        var data = new FormData();
        
        this.fillConvocatoria.tipoconvocatoria_id= $('#cbuTipoConvocatoriasE').val();
        this.fillConvocatoria.facultad_id= $('#cbuFacultadesE').val();
        this.fillConvocatoria.v2 =CKEDITOR.instances['txtasignaturasE'].getData(); 

        data.append('idConvocatoria', this.fillConvocatoria.id);
        data.append('editConvocatoria', this.fillConvocatoria.convocatoria);
        data.append('editRequerido', this.fillConvocatoria.requerido);
        data.append('editAsignaturas', this.fillConvocatoria.v2);
        data.append('editNroplazas', this.fillConvocatoria.nroplazas);
        data.append('editFechaini', this.fillConvocatoria.fechaini);
        data.append('editFechafin', this.fillConvocatoria.fechafin);
        data.append('editTipoconvocatoria_id', this.fillConvocatoria.tipoconvocatoria_id);
        data.append('editFacultad_id', this.fillConvocatoria.facultad_id);
        data.append('imagen', this.imagen);
        data.append('oldImagen', this.fillConvocatoria.imagen);
        data.append('_method', 'PUT');

        const config = { headers: { 'Content-Type': 'multipart/form-data' } };
        
        var url = "convocatoria/" + id;

        $("#btnSaveE").attr('disabled', true);
        $("#btnCloseE").attr('disabled', true);
        this.divloaderEdit = true;

        axios.post(url, data, config).then(response => {

           $("#btnSaveE").removeAttr("disabled");
           $("#btnCancelE").removeAttr("disabled");
           this.divloaderEdit=false;
           
           if(response.data.result=='1'){   
           this.getConvocatoria(this.thispage);
        //    this.fillConvocatoria={'id':'', 'titulo':'', 'codigo':'','imagen':'','estado':''};
           this.fillConvocatoria = {'id':'', 'convocatoria':'', 'requerido':'', 'asignaturas':'', 'nroplazas':'', 'fechaini':'', 'fechafin':'', 'tipoconvocatoria_id':'', 'facultad_id':'','imagen':''};

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
    bajaconvocatoria:function (convocatoria) {

    swal.fire({
             title: '¿Estás seguro?',
             text: "Desea desactivar la Convocatoria seleccionada",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, Desactivar'
           }).then((result) => {

            if (result.value) {

                var url = 'convocatoria/altabaja/'+convocatoria.id+'/0';
                       axios.get(url).then(response=>{//eliminamos
                       if(response.data.result=='1'){
                           app.getConvocatoria(app.thispage);//listamos
                           toastr.success(response.data.msj);//mostramos mensaje
                       }else{
                          // $('#'+response.data.selector).focus();
                           toastr.error(response.data.msj);
                       }
                       });
                }
               }).catch(swal.noop);  

   },
   altaconvocatoria:function (convocatoria) {

    swal.fire({
             title: '¿Estás seguro?',
             text: "Desea activar la Convocatoria seleccionada",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, Activar'
           }).then((result) => {

            if (result.value) {

                var url = 'convocatoria/altabaja/'+convocatoria.id+'/1';
                       axios.get(url).then(response=>{//eliminamos

                       if(response.data.result=='1'){
                           app.getConvocatoria(app.thispage);//listamos
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
</script><?php /**PATH D:\Roger\Aplicaciones\webUNASAM2019\resources\views/convocatoria/vue.blade.php ENDPATH**/ ?>