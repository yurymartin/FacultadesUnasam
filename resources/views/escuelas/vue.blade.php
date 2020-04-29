<script type="text/javascript">
    let app = new Vue({
el: '#app',
data:{
       titulo:"Mantenimiento",
       subtitulo: "Gestión de Escuelas Profesionales",
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
   classMenu3:'active',
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

   escuelas: [],
   departamentoacademicos: [],
   errors:[],

   fillEscuela:{'id':'', 'nombre':'','telefono':'','direccion':'','email':'','departamentoacademico_id':''},

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
   newTelefono:'',
   newDireccion:'',
   newEmail:'',
   newEstado:'',
   newBorrado:'0',
   departamentoacademico_id: '0',
  


},
created:function () {
   this.getEscuelas(this.thispage);
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
    getEscuelas: function (page) {
       var busca=this.buscar;
       var url = 'escuela?page='+page+'&busca='+busca;

       axios.get(url).then(response=>{
            this.escuelas= response.data.escuelas.data;
            this.pagination= response.data.pagination;
            this.departamentoacademicos = response.data.departamentoacademicos;
            
           if(this.escuelas.length == 0 && this.thispage != '1'){
               var a = parseInt(this.thispage) ;
               a--;
               this.thispage=a.toString();
               this.changePage(this.thispage);
           }
       })
   },
   changePage:function (page) {
       this.pagination.current_page=page;
       this.getEscuelas(page);
       this.thispage=page;
   },
   buscarBtn: function () {
       this.getEscuelas();
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
        this.newTelefono = '';
        this.newDireccion = '';
        this.newEmail = '';
        this.newEstado = '1';
        this.newBorrado = '0';
        this.departamentoacademico_id = '0';

       $(".form-control").css("border","1px solid #d2d6de");
   },
    create:function () { 

       var url='escuela';
       $("#btnGuardar").attr('disabled', true);
       $("#btnCancel").attr('disabled', true);
       $("#btnClose").attr('disabled', true);
       this.divloaderNuevo=true;
       $(".form-control").css("border","1px solid #d2d6de");

       var data = new  FormData();

            data.append('nombre', this.newTitulo);
            data.append('telefono', this.newTelefono);
            data.append('direccion', this.newDireccion);
            data.append('email', this.newEmail);
            data.append('activo', this.newEstado);
            data.append('borrado', this.newBorrado);
            data.append('departamentoacademico_id', this.departamentoacademico_id);
            
            const config = { headers: { 'Content-Type': 'multipart/form-data' } };
            
            axios.post(url,data,config).then(response=>{
                $("#btnGuardar").removeAttr("disabled");
                $("#btnCancel").removeAttr("disabled");
                $("#btnClose").removeAttr("disabled");
                this.divloaderNuevo=false;
                
                if(String(response.data.result)=='1'){
                    this.getEscuelas(this.thispage);
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
   borrarescuela:function (escuela) {
        swal.fire({
             title: '¿Estás seguro?',
             text: "¿Desea eliminar la escuela profesional Seleccionado? -- Nota: este proceso no se podrá revertir.",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, eliminar'
           }).then((result) => {

            if (result.value) {

                var url = 'escuela/'+escuela.id;
                axios.delete(url).then(response=>{//eliminamos

                if(response.data.result=='1'){
                    app.getEscuelas(app.thispage);//listamos
                    toastr.success(response.data.msj);//mostramos mensaje
                }else{
                    // $('#'+response.data.selector).focus();
                    toastr.error(response.data.msj);
                }
                })
                }

                   
               }).catch(swal.noop);     
   },

   editescuela:function (escuela) {

        this.fillEscuela.id=escuela.id;
        this.fillEscuela.nombre=escuela.nombre; 
        this.fillEscuela.telefono=escuela.telefono; 
        this.fillEscuela.direccion=escuela.direccion; 
        this.fillEscuela.email=escuela.email; 
        this.fillEscuela.departamentoacademico_id = escuela.idfac       

        $("#modalEditar").modal('show');
        this.$nextTick(function () {
                $("#txttitulo").focus();
        })
            
   },
   updateescuela:function (id) {
        var data = new FormData();
        data.append('id', this.fillEscuela.id);
        data.append('nombre', this.fillEscuela.nombre);
        data.append('telefono', this.fillEscuela.telefono);
        data.append('direccion', this.fillEscuela.direccion);
        data.append('email', this.fillEscuela.email);
        data.append('departamentoacademico_id', this.fillEscuela.departamentoacademico_id);
        data.append('_method', 'PUT');

        const config = { headers: { 'Content-Type': 'multipart/form-data' } };
        
        var url = "escuela/" + id;

        $("#btnSaveE").attr('disabled', true);
        $("#btnCloseE").attr('disabled', true);
        this.divloaderEdit = true;

        axios.post(url, data, config).then(response => {

           $("#btnSaveE").removeAttr("disabled");
           $("#btnCancelE").removeAttr("disabled");
           this.divloaderEdit=false;
           
           if(response.data.result=='1'){   
           this.getEscuelas(this.thispage);
           this.fillLocal={'id':'', 'nombre':'', 'descripcion':''};
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
    bajaescuela:function (escuela) {

    swal.fire({
             title: '¿Estás seguro?',
             text: "Desea desactivar la escuela profesional seleccionada",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, Desactivar'
           }).then((result) => {

            if (result.value) {

                var url = 'escuela/altabaja/'+escuela.id+'/0';
                       axios.get(url).then(response=>{//eliminamos
                       if(response.data.result=='1'){
                           app.getEscuelas(app.thispage);//listamos
                           toastr.success(response.data.msj);//mostramos mensaje
                       }else{
                          // $('#'+response.data.selector).focus();
                           toastr.error(response.data.msj);
                       }
                       });
                }
               }).catch(swal.noop);  

   },
   altaescuela:function (escuela) {

    swal.fire({
             title: '¿Estás seguro?',
             text: "Desea activar la escuela profesional seleccionada",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, Activar'
           }).then((result) => {

            if (result.value) {

                var url = 'escuela/altabaja/'+escuela.id+'/1';
                       axios.get(url).then(response=>{//eliminamos

                       if(response.data.result=='1'){
                           app.getEscuelas(app.thispage);//listamos
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