<script type="text/javascript">
    let app = new Vue({
    el: '#app',
    data: {
    titulo: "Mantenimiento",
    subtitulo: "Gestión de la Descripcion de las Escuelas",
    subtitulo2: "Principal",

    subtitle2: false,
    subtitulo2: "",

    tipouserPerfil: '<?php echo e($tipouser->nombre); ?>',
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
    classMenu1: 'active',
    classMenu2: '',
    classMenu3: '',
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

    descripcionescuelas: [],
    errors: [],

    fillDescripcionEscuelas:{'id':'', 'descripcion':'', 'titulo':'', 'gradoacade':'', 'duracion':'','logo':'' ,'activo':'','borrado':'','escuela_id':''},

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
    newTitulo: '',
    newGradoAcade:'',
    newDuracion:'',
    logo: '',
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
    getImg(descripcionescuela) { 
        var img="<?php echo e(asset('/')); ?>img/descripcionescuelas/" + descripcionescuela.logo;
             return img; 
    }, 
    getDescripcionFacultades: function (page) { 
        var busca=this.buscar; 
        var url='descripcionescuela?page=' + page + '&busca=' + busca; 
        axios.get(url).then(response=> {
            this.descripcionescuelas = response.data.descripcionescuelas.data;
            this.pagination = response.data.pagination;
            this.escuelas= response.data.escuelas;

        if (this.descripcionescuelas.length == 0 && this.thispage != '1') {
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
            $('#Nombress').focus();
            this.newDescripcion = '';
            this.newReseñaHistor = '';
            this.newMision = '';
            this.newVision = '';
            this.newFilosofia = '';
            this.newActivo = '1';
            this.imagen = null;

            $(".form-control").css("border", "1px solid #d2d6de");
        },
    getImage(event) {
            if (!event.target.files.length) {
                this.logo = null;
            }else {
                this.logo = event.target.files[0];
            }
            },
            
    recorrerBanner: function () {
            $.each($(".txtimg"), function (index, value) {
            // var valor=$(this).attr("id");
            var idusar = $(this).val();
            $("#ImgPerfilNuevoE" + idusar).attr("src", "<?php echo e(asset('/img/descripcionescuelas/')); ?>" + "/" + $("#txt" + idusar).val());
            });
            },
    create: function () {
        var url = 'descripcionescuela';
        $("#btnGuardar").attr('disabled', true);
        $("#btnCancel").attr('disabled', true);
        $("#btnClose").attr('disabled', true);
        this.divloaderNuevo = true;
        $(".form-control").css("border", "1px solid #d2d6de");
            var data = new FormData();

                data.append('descripcion', this.newDescripcion);
                data.append('titulo', this.newTitulo);
                data.append('gradoacade', this.newGradoAcade);
                data.append('duracion', this.newDuracion);
                data.append('logo', this.logo);
                data.append('activo', this.newActivo);
                data.append('escuela_id', this.escuela_id);
                console.log(this.logo);
                
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
        borrardocente: function (descripcionescuelas) {
            swal.fire({
                title: '¿Estás seguro?',
                text: "¿Desea eliminar la Descripcion Seleccionado? -- Nota: este proceso no se podrá revertir.",
                type: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar'
            }).then((result) => {

                if (result.value) {

                    var url = 'descripcionescuela/' + descripcionescuelas.iddesc;
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

    editbanner: function (descripcionescuelas) {
        this.fillDescripcionEscuelas.id = descripcionescuelas.iddesc;
        this.fillDescripcionEscuelas.descripcion = descripcionescuelas.descripcion;
        this.fillDescripcionEscuelas.titulo = descripcionescuelas.titulo;
        this.fillDescripcionEscuelas.gradoacade = descripcionescuelas.gradoacade;
        this.fillDescripcionEscuelas.duracion = descripcionescuelas.duracion;
        this.fillDescripcionEscuelas.logo = descripcionescuelas.logo; 
        this.fillDescripcionEscuelas.escuela_id = descripcionescuelas.idesc; 
                   
        $("#modalEditar").modal('show');
            this.$nextTick(function () {
            $("#DescripcionE").focus();
        })
    },
    updateBanner: function (id) {

        var data = new FormData();
        data.append('id', this.fillDescripcionEscuelas.id);
        data.append('descripcion', this.fillDescripcionEscuelas.descripcion);
        data.append('titulo', this.fillDescripcionEscuelas.titulo);
        data.append('gradoacade', this.fillDescripcionEscuelas.gradoacade);
        data.append('duracion', this.fillDescripcionEscuelas.duracion);
        data.append('logo', this.fillDescripcionEscuelas.logo);
        data.append('escuela_id', this.fillDescripcionEscuelas.escuela_id);
        data.append('_method', 'PUT');
        
        const config = {headers: {'Content-Type': 'multipart/form-data'}};
        
        var url = "descripcionescuela/" + id;

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
bajadocente: function (descripcionescuelas) {

        swal.fire({
            title: '¿Estás seguro?',
            text: "Desea desactivar la Descripciòn seleccionada",
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Desactivar'
        }).then((result) => {
        if (result.value) {
            var url = 'descripcionescuela/altabaja/' + descripcionescuelas.iddesc+ '/0';
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

altadocente: function (descripcionescuelas) {
    swal.fire({
        title: '¿Estás seguro?',
        text: "Desea activar la Descripcion seleccionada",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Activar'
    }).then((result) => {
    if (result.value) {
        var url = 'descripcionescuela/altabaja/' + descripcionescuelas.iddesc + '/1';
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
</script><?php /**PATH C:\Users\USUARIO\Desktop\webFacultades\resources\views/descripcionescuelas/vue.blade.php ENDPATH**/ ?>