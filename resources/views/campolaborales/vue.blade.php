<script type="text/javascript">
    let app = new Vue({
    el: '#app',
    data: {
    titulo: "Mantenimiento",
    subtitulo: "Gestión de los campos laborales de cada escuela",
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

    campolaborales: [],
    escuelas: [],
    errors: [],

    fillCampoLaborales:{'id':'', 'titulo':'', 'campolab':'', 'imagen':'', 'fecha':'','activo':'','borrado':'','escuela_id':''},

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

    newTitulo: '',
    newCampolab: '',
    imagen: null,
    newFecha:'',
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
    getImg(campolaboral) { 
        var img="{{ asset('/') }}img/campolaboral/" + campolaboral.imagen;
             return img; 
    }, 
    getDescripcionFacultades: function (page) { 
        var busca=this.buscar; 
        var url='campolaboral?page=' + page + '&busca=' + busca; 
        axios.get(url).then(response=> {
            this.campolaborales = response.data.campolaborales.data;
            this.pagination = response.data.pagination;
            this.escuelas= response.data.escuelas;

        if (this.campolaborales.length == 0 && this.thispage != '1') {
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
            this.newTitulo = '';
            this.newCampolab = '';
            this.newFecha = '';
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
            $("#ImgPerfilNuevoE" + idusar).attr("src", "{{ asset('/img/campolaborales/')}}" + "/" + $("#txt" + idusar).val());
            });
            },
    create: function () {
        var url = 'campolaboral';
        $("#btnGuardar").attr('disabled', true);
        $("#btnCancel").attr('disabled', true);
        $("#btnClose").attr('disabled', true);
        this.divloaderNuevo = true;
        $(".form-control").css("border", "1px solid #d2d6de");
            var data = new FormData();

                data.append('titulo', this.newTitulo);
                data.append('campolab', this.newCampolab);
                data.append('imagen', this.imagen);
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
        borrardocente: function (campolaborales) {
            swal.fire({
                title: '¿Estás seguro?',
                text: "¿Desea eliminar el campo laboral Seleccionado? -- Nota: este proceso no se podrá revertir.",
                type: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar'
            }).then((result) => {

                if (result.value) {

                    var url = 'campolaboral/' + campolaborales.idcampo;
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

    editbanner: function (campolaborales) {
        this.fillCampoLaborales.id = campolaborales.idcampo;
        this.fillCampoLaborales.titulo = campolaborales.titulo;
        this.fillCampoLaborales.campolab = campolaborales.campolab;
        this.fillCampoLaborales.imagen = campolaborales.imagen;
        this.fillCampoLaborales.fecha = campolaborales.fecha;
        this.fillCampoLaborales.escuela_id = campolaborales.idesc; 
                   
        $("#modalEditar").modal('show');
            this.$nextTick(function () {
            $("#DescripcionE").focus();
        })
    },
    updateBanner: function (id) {

        var data = new FormData();
        data.append('id', this.fillCampoLaborales.id);
        data.append('titulo', this.fillCampoLaborales.titulo);
        data.append('campolab', this.fillCampoLaborales.campolab);
        data.append('imagen', this.imagen);
        data.append('fecha', this.fillCampoLaborales.fecha);
        data.append('escuela_id', this.fillCampoLaborales.escuela_id);
        data.append('_method', 'PUT');
        
        const config = {headers: {'Content-Type': 'multipart/form-data'}};
        
        var url = "campolaboral/" + id;

            $("#btnSaveE").attr('disabled', true);
            $("#btnCloseE").attr('disabled', true);
            this.divloaderEdit = true;
        
            axios.post(url, data, config).then(response => {
            
            $("#btnSaveE").removeAttr("disabled");
            $("#btnCancelE").removeAttr("disabled");
            this.divloaderEdit = false;
           
        if (response.data.result == '1') {
            
            this.getDescripcionFacultades(this.thispage);
            this.fillLocal= {'id':'', 'titulo':'', 'campolab':'', 'imagen':'', 'fecha':'','escuela_id':''};
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
bajadocente: function (campolaborales) {

        swal.fire({
            title: '¿Estás seguro?',
            text: "Desea desactivar el campo Profesional seleccionada",
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Desactivar'
        }).then((result) => {
        if (result.value) {
            var url = 'campolaboral/altabaja/' + campolaborales.idcampo+ '/0';
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

altadocente: function (campolaborales) {
    swal.fire({
        title: '¿Estás seguro?',
        text: "Desea activar el campo Profesional seleccionada",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Activar'
    }).then((result) => {
    if (result.value) {
        var url = 'campolaboral/altabaja/' + campolaborales.idcampo + '/1';
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