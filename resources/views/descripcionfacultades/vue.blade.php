<script type="text/javascript">
    let app = new Vue({
    el: '#app',
    data: {
    titulo: "Mantenimiento",
    subtitulo: "Gestión de la Descripcion de la Facultad",
    subtitulo2: "Principal",

    subtitle2: false,
    subtitulo2: "",

    tipouserPerfil: '{{ $tipouser->nombre }}',
    userPerfil: '{{ Auth::user()->name }}',
    mailPerfil: '{{ Auth::user()->email }}',


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

    descripcionfacultades: [],
    errors: [],

    fillDescripcionFacultades:{'id':'', 'descripcion':'', 'reseñahistor':'', 'mision':'', 'vision':'','imagen':'' ,'filosofia':'','activo':'','borrado':''},

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
    newReseñaHistor: '',
    newMision:'',
    newVision:'',
    imagen: null,
    newFilosofia: '',
    newActivo: '',
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
    getImg(descripcionfacultad) { var
            img="{{ asset('/') }}img/descripcionfacultades/" + descripcionfacultad.imagen;
             return img; 
    }, 
    getDescripcionFacultades: function (page) { 
        var busca=this.buscar; 
        var url='descripcionfacultad?page=' + page + '&busca=' + busca; 
        axios.get(url).then(response=> {
            this.descripcionfacultades = response.data.descripcionfacultades.data;
            this.pagination = response.data.pagination;

        if (this.descripcionfacultades.length == 0 && this.thispage != '1') {
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
                this.imagen = null;
            }else {
                this.imagen = event.target.files[0];
            }
            },
            
    recorrerBanner: function () {
            $.each($(".txtimg"), function (index, value) {
            // var valor=$(this).attr("id");
            var idusar = $(this).val();
            $("#ImgPerfilNuevoE" + idusar).attr("src", "{{ asset('/img/descripcionfacultad/')}}" + "/" + $("#txt" + idusar).val());
            });
            },
    create: function () {
        var url = 'descripcionfacultad';
        $("#btnGuardar").attr('disabled', true);
        $("#btnCancel").attr('disabled', true);
        $("#btnClose").attr('disabled', true);
        this.divloaderNuevo = true;
        $(".form-control").css("border", "1px solid #d2d6de");
            var data = new FormData();

                data.append('descripcion', this.newDescripcion);
                data.append('reseñahistor', this.newReseñaHistor);
                data.append('mision', this.newMision);
                data.append('vision', this.newVision);
                data.append('imagen', this.imagen);
                data.append('filosofia', this.newFilosofia);
                data.append('activo', this.newActivo);
                
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
        borrardocente: function (descripcionfacultades) {

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

                    var url = 'descripcionfacultad/' + descripcionfacultades.id;
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

    editbanner: function (descripcionfacultad) {
        this.fillDescripcionFacultades.id = descripcionfacultad.id;
        this.fillDescripcionFacultades.descripcion = descripcionfacultad.descripcion;
        this.fillDescripcionFacultades.reseñahistor = descripcionfacultad.reseñahistor;
        this.fillDescripcionFacultades.mision = descripcionfacultad.mision;
        this.fillDescripcionFacultades.vision = descripcionfacultad.vision;
        this.fillDescripcionFacultades.imagen = descripcionfacultad.imagen;
        this.fillDescripcionFacultades.filosofia = descripcionfacultad.filosofia;
        console.log();
        
        $("#modalEditar").modal('show');
            this.$nextTick(function () {
            $("#DescripcionE").focus();
        })
    },
    updateBanner: function (id) {
        var data = new FormData();

        data.append('id', this.fillDescripcionFacultades.id);
        data.append('descripcion', this.fillDescripcionFacultades.descripcion);
        data.append('reseñahistor', this.fillDescripcionFacultades.reseñahistor);
        data.append('mision', this.fillDescripcionFacultades.mision);
        data.append('vision', this.fillDescripcionFacultades.vision);
        data.append('imagen', this.fillDescripcionFacultades.imagen);
        data.append('filosofia', this.fillDescripcionFacultades.filosofia);
        data.append('_method', 'PUT');
        
        const config = {headers: {'Content-Type': 'multipart/form-data'}};
        
        var url = "descripcionfacultad/" + id;

            $("#btnSaveE").attr('disabled', true);
            $("#btnCloseE").attr('disabled', true);
            this.divloaderEdit = true;
        
            axios.post(url, data, config).then(response => {
            
            $("#btnSaveE").removeAttr("disabled");
            $("#btnCancelE").removeAttr("disabled");
            this.divloaderEdit = false;
           
        if (response.data.result == '1') {
            
            this.getDescripcionFacultades(this.thispage);
            this.fillLocal= {'id':'', 'descripcion':'', 'reseñahistor':'', 'mision':'', 'vision':'','imagen':'' ,'filosofia':'','activo':'','borrado':''};
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
bajadocente: function (descripcionfacultades) {

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
            var url = 'descripcionfacultad/altabaja/' + descripcionfacultades.id + '/0';
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

altadocente: function (descripcionfacultades) {
    swal.fire({
        title: '¿Estás seguro?',
        text: "Desea activar la Descripciòn seleccionada",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Activar'
    }).then((result) => {
    if (result.value) {
        var url = 'descripcionfacultad/altabaja/' + descripcionfacultades.id + '/1';
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
</script>