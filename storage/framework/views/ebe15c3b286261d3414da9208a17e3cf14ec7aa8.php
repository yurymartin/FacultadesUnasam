<script type="text/javascript">
    let app = new Vue({
    el: '#app',
    data: {
    titulo: "Mantenimiento",
    subtitulo: "Gestión de los perfiles profesionales",
    subtitulo2: "Principal",

    subtitle2: false,
    subtitulo2: "",

    tipouserPerfil: '',
    userPerfil: '<?php echo e(Auth::user()->name); ?>',
    mailPerfil: '<?php echo e(Auth::user()->email); ?>',


    divloader0: true,
    divloader1: false,
    divloader2: false,
    divloader3: false,
    divloader4: false,
    divloader5: false,
    divloader6: false,
    divloader7: false,
    divloader8: false,
    divloader9: false,
    divloader10: false,
    divtitulo: true,
    classTitle: 'fa fa-qrcode ',
    classMenu0: '',
    classMenu1: '',
    classMenu2: '',
    classMenu3: 'active',
    classMenu4: '',
    classMenu5: '',
    classMenu6: '',
    classMenu7: '',
    classMenu8: '',
    classMenu9: '',
    classMenu10: '',
    classMenu11: '',
    classMenu12: '',


    divprincipal: false,

    perfiles: [],
    escuelas: [],
    errors: [],

    fillPerfiles:{'id':'', 'descripcion':'', 'perfil':'','activo':'','borrado':'','escuela_id':''},

    pagination: {
    'total': 0,
    'current_page': 0,
    'per_page': 0,
    'last_page': 0,
    'from': 0,
    'to': 0
    },
    offset: 9,
    buscar: '',
    divNuevo: false,
    divloaderNuevo: false,
    divloaderEdit: false,

    thispage: '1',

    newDescripcion: '',
    newPerfil: '',
    newActivo: '',
    escuela_id: '0',
},
created: function () {
    this.getDescripcionFacultades(this.thispage);
},
mounted: function () {
    this.divloader0 = false;
    this.divprincipal = true;
    $("#divtitulo").show('slow');

},
computed: {
    isActived: function () {
        return this.pagination.current_page;
    },
    pagesNumber: function () {
        if (!this.pagination.to) {
            return [];
        }

        var from = this.pagination.current_page - this.offset
        var from2 = this.pagination.current_page - this.offset
        if (from < 1) { 
            from=1; 
        } 
        var to=from2 + (this.offset * 2); 
        if (to>= this.pagination.last_page) {
            to = this.pagination.last_page;
        }

        var pagesArray = [];
        while (from <= to) { 
            pagesArray.push(from); 
            from++; 
        } 
        return pagesArray; 
    } 
}, 
methods: {
    getDescripcionFacultades: function (page) { 
        var busca=this.buscar; 
        var url='perfil?page=' + page + '&busca=' + busca; 
        axios.get(url).then(response=> {
            this.perfiles = response.data.perfiles.data;
            this.pagination = response.data.pagination;
            this.escuelas= response.data.escuelas;

        if (this.perfiles.length == 0 && this.thispage != '1') {
            var a = parseInt(this.thispage);
            a--;
            this.thispage = a.toString();
            this.changePage(this.thispage);
        }
        })
        },
    changePage: function (page) {
            this.pagination.current_page = page;
            this.getDescripcionFacultades(page);
            this.thispage = page;
        },
    buscarBtn: function () {
            this.getDescripcionFacultades();
            this.thispage = '1';
        },
    nuevo: function () {
            this.divNuevo = true;
            //$("#txtespecialidad").focus();
            //$('#txtespecialidad').focus();
            this.$nextTick(function () {
            this.cancelFormNuevo();
        })
        },
    cerrarFormNuevo: function () {
            this.divNuevo = false;
            this.cancelFormNuevo();
        },
    cancelFormNuevo: function () {
            $('#newDescripcion').focus();
            this.newDescripcion = '';
            this.newPerfil = '';
            this.newActivo = '1';
            this.escuela_id = '0';

            $(".form-control").css("border", "1px solid #d2d6de");
        },
    create: function () {
        var url = 'perfil';
        $("#btnGuardar").attr('disabled', true);
        $("#btnCancel").attr('disabled', true);
        $("#btnClose").attr('disabled', true);
        this.divloaderNuevo = true;
        $(".form-control").css("border", "1px solid #d2d6de");
            var data = new FormData();

                data.append('descripcion', this.newDescripcion);
                data.append('perfil', this.newPerfil);
                data.append('activo', this.newActivo);
                data.append('escuela_id', this.escuela_id);
                
            const config = { headers: { 'Content-Type': 'multipart/form-data' } };
            axios.post(url,data,config).then(response=>{

            $("#btnGuardar").removeAttr("disabled");
            $("#btnCancel").removeAttr("disabled");
            $("#btnClose").removeAttr("disabled");
            this.divloaderNuevo = false;

            if (String(response.data.result) == '1') {
                this.getDescripcionFacultades(this.thispage);
                this.errors = [];
                this.cerrarFormNuevo();
                toastr.success(response.data.msj);
            } else {
                $('#' + response.data.sector).focus();
                $('#' + response.data.selector).css("border", "1px solid red");
                toastr.error(response.data.msj);
            }
            }).catch(error => {
                //this.errors=error.response.data
            })
            },
        borrardocente: function (perfiles) {
            swal.fire({
                title: '¿Estás seguro?',
                text: "¿Desea eliminar el perfil profesional Seleccionado? -- Nota: este proceso no se podrá revertir.",
                type: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar'
            }).then((result) => {

                if (result.value) {

                    var url = 'perfil/' + perfiles.idper;
                     axios.delete(url).then(response => { //eliminamos
                if (response.data.result == '1') {
                    app.getDescripcionFacultades(app.thispage); //listamos
                    toastr.success(response.data.msj); //mostramos mensaje
                 } else {
                    // $('#'+response.data.selector).focus();
                    toastr.error(response.data.msj);
                }
            })
            }


            }).catch(swal.noop);
            
            },

    editbanner: function (perfiles) {
        this.fillPerfiles.id = perfiles.idper;
        this.fillPerfiles.descripcion = perfiles.descripcion;
        this.fillPerfiles.perfil = perfiles.perfil;
        this.fillPerfiles.escuela_id = perfiles.idesc; 
                   
        $("#modalEditar").modal('show');
            this.$nextTick(function () {
            $("#DescripcionE").focus();
        })
    },
    updateBanner: function (id) {

        var data = new FormData();
        data.append('id', this.fillPerfiles.id);
        data.append('descripcion', this.fillPerfiles.descripcion);
        data.append('perfil', this.fillPerfiles.perfil);
        data.append('escuela_id', this.fillPerfiles.escuela_id);
        data.append('_method', 'PUT');
        
        const config = {headers: {'Content-Type': 'multipart/form-data'}};
        
        var url = "perfil/" + id;

            $("#btnSaveE").attr('disabled', true);
            $("#btnCloseE").attr('disabled', true);
            this.divloaderEdit = true;
        
            axios.post(url, data, config).then(response => {
            
            $("#btnSaveE").removeAttr("disabled");
            $("#btnCancelE").removeAttr("disabled");
            this.divloaderEdit = false;
           
        if (response.data.result == '1') {
            
            this.getDescripcionFacultades(this.thispage);
            this.fillLocal= {'id':'', 'descripcion':'', 'titulo':'', 'gradoacade':'', 'duracion':'','logo':'' ,'escuela_id':''};
            this.errors = [];
            $("#modalEditar").modal('hide');
            toastr.success(response.data.msj);

        } else {
            $('#' + response.data.selector).focus();
            toastr.error(response.data.msj);
        }
        }).catch(error => {
            this.errors = error.response.data
        })
    },
bajadocente: function (perfiles) {

        swal.fire({
            title: '¿Estás seguro?',
            text: "Desea desactivar el perfil profesional seleccionada",
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Desactivar'
        }).then((result) => {
        if (result.value) {
            var url = 'perfil/altabaja/' + perfiles.idper+ '/0';
            axios.get(url).then(response => { //eliminamos
        if (response.data.result == '1') {
            app.getDescripcionFacultades(app.thispage); //listamos
            toastr.success(response.data.msj); //mostramos mensaje
        } else {
            // $('#'+response.data.selector).focus();
            toastr.error(response.data.msj);
        }
    });
}
}).catch(swal.noop);
},

altadocente: function (perfiles) {
    swal.fire({
        title: '¿Estás seguro?',
        text: "Desea activar el perfil profesional seleccionada",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Activar'
    }).then((result) => {
    if (result.value) {
        var url = 'perfil/altabaja/' + perfiles.idper + '/1';
        axios.get(url).then(response => { //eliminamos
    if (response.data.result == '1') {
        app.getDescripcionFacultades(app.thispage); //listamos
        toastr.success(response.data.msj); //mostramos mensaje
    } else {
        // $('#'+response.data.selector).focus();
        toastr.error(response.data.msj);
    }
});
}
}).catch(swal.noop);
},
}
}); 
</script><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/perfiles/vue.blade.php ENDPATH**/ ?>