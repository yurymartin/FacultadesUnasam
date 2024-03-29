<script type="text/javascript">
    let app = new Vue({
el: '#app',
data:{
       titulo:"Mantenimiento",
       subtitulo: "Gestión de Redes Sociales de las Escuelas",
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

   redesfacultades: [],
   escuelas: [],
   errors:[],

   fillredesfacultades:{'id':'', 'facebook':'', 'google':'','youtube':'','twitter':'','instagram':'','linkedln':'','pinterest':'','activo':'','escuela_id':''},

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

   newFacebook:'',
   newGoogle:'',
   newYoutube:'',
   newTwitter:'',
   newInstagram:'',
   newLinkedln:'',
   newPinterest:'',
   newEstado:'',
   escuela_id:'',


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
    url_facebook(redes){
        var href = redes.facebook;
        window.open(href);
    },
    url_google(redes){
        var href = redes.google;
        window.open(href);
    },
    url_youtube(redes){
        var href = redes.youtube;
        window.open(href);
    },
    url_twitter(redes){
        var href = redes.twitter;
        window.open(href);
    },
    url_instagram(redes){
        var href = redes.instagram;
        window.open(href);
    },
    url_linkedln(redes){
        var href = redes.linkedln;
        window.open(href);
    },
    url_pinterest(redes){
        var href = redes.pinterest;
        window.open(href);
    },
    getFacultades: function (page) {
       var busca=this.buscar;
       var url = 'redesescuela?page='+page+'&busca='+busca;

       axios.get(url).then(response=>{
            this.redesfacultades= response.data.redesfacultades.data;
            this.pagination= response.data.pagination;
            this.escuelas = response.data.escuelas;

            this.$nextTick(function () {
                //this.recorrerFacultades();
            })

           if(this.redesfacultades.length == 0 && this.thispage != '1'){
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
       $('#facebook').focus();

        this.escuela_id = '0';
        this.newFacebook = '';
        this.newGoogle = '';
        this.newYoutube = '';
        this.newTwitter = '';
        this.newInstagram = '';
        this.newLinkedln = '';
        this.newPinterest = '';
        this.newEstado = '1';

       $(".form-control").css("border","1px solid #d2d6de");
   },
    create:function () {

       var url='redesescuela';
       $("#btnGuardar").attr('disabled', true);
       $("#btnCancel").attr('disabled', true);
       $("#btnClose").attr('disabled', true);
       this.divloaderNuevo=true;
       $(".form-control").css("border","1px solid #d2d6de");

       var data = new  FormData();

            data.append('escuela_id', this.escuela_id);
            data.append('facebook', this.newFacebook);
            data.append('google', this.newGoogle);
            data.append('youtube', this.newYoutube);
            data.append('twitter', this.newTwitter);
            data.append('instagram', this.newInstagram);
            data.append('linkedln', this.newLinkedln);
            data.append('pinterest', this.newPinterest);
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
   borrarfacultad:function (redesfacultades) {
    
        swal.fire({
             title: '¿Estás seguro?',
             text: "¿Desea eliminar la lista de redes sociales Seleccionado? -- Nota: este proceso no se podrá revertir.",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, eliminar'
           }).then((result) => {

            if (result.value) {

                var url = 'redesescuela/'+redesfacultades.id;
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

   editfacultad:function (redesfacultades) {

        this.fillredesfacultades.id=redesfacultades.id;
        this.fillredesfacultades.facebook=redesfacultades.facebook;
        this.fillredesfacultades.google=redesfacultades.google; 
        this.fillredesfacultades.youtube=redesfacultades.youtube; 
        this.fillredesfacultades.twitter=redesfacultades.twitter; 
        this.fillredesfacultades.instagram=redesfacultades.instagram;
        this.fillredesfacultades.linkedln=redesfacultades.linkedln;
        this.fillredesfacultades.pinterest=redesfacultades.pinterest;
        this.fillredesfacultades.escuela_id=redesfacultades.escuela_id;
      
        $("#modalEditar").modal('show');
        this.$nextTick(function () {
                $("#facebook").focus();
        })
    },
   updateFacultad:function (id) {

    var data = new FormData();
        data.append('escuela_id', this.fillredesfacultades.id);
        data.append('id', this.fillredesfacultades.id);
        data.append('facebook', this.fillredesfacultades.facebook);
        data.append('google', this.fillredesfacultades.google);
        data.append('youtube', this.fillredesfacultades.youtube);
        data.append('twitter', this.fillredesfacultades.twitter);
        data.append('instagram', this.fillredesfacultades.instagram);
        data.append('linkedln', this.fillredesfacultades.linkedln);
        data.append('pinterest', this.fillredesfacultades.pinterest);
        data.append('_method', 'PUT');

        const config = { headers: { 'Content-Type': 'multipart/form-data' } };
        
        var url = "redesescuela/" + id;

        $("#btnSaveE").attr('disabled', true);
        $("#btnCloseE").attr('disabled', true);
        this.divloaderEdit = true;

        axios.post(url, data, config).then(response => {

           $("#btnSaveE").removeAttr("disabled");
           $("#btnCancelE").removeAttr("disabled");
           this.divloaderEdit=false;
           
           if(response.data.result=='1'){   
           this.getFacultades(this.thispage);
           this.fillLocal={'id':'', 'facebook':'', 'google':'','youtube':'','twitter':'','instagram':'','linkedln':'','pinterest':'','activo':'','escuela_id':''};
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
    bajafacultad:function (redesfacultades) {

    swal.fire({
             title: '¿Estás seguro?',
             text: "Desea desactivar la lista de redes sociales seleccionado",
             type: 'info',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, Desactivar'
           }).then((result) => {

            if (result.value) {

                var url = 'redesescuela/altabaja/'+redesfacultades.id+'/0';
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
   altafacultad:function (redesfacultades) {

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

                var url = 'redesescuela/altabaja/'+redesfacultades.id+'/1';
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
</script><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/redesescuelas/vue.blade.php ENDPATH**/ ?>