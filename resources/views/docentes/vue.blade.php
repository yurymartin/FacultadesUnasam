<script type="text/javascript">
    let app = new Vue({
    el: '#app',
    data: {
    titulo: "Mantenimiento",
    subtitulo: "Gestión de Docentes",
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
    classMenu1: '',
    classMenu2: '',
    classMenu3: '',
    classMenu4: '',
    classMenu5: '',
    classMenu6: '',
    classMenu7: 'active',
    classMenu8: '',
    classMenu9: '',
    classMenu10: '',
    classMenu11: '',
    classMenu12: '',


    divprincipal: false,

    docentes: [],
    persona:[],
    categoriadocentes: [],
    errors: [],

    fillPersona:{'idper':'', 'dni':'', 'nombres':'', 'apellidos':'', 'imagen':'', 'genero':''},
    fillDocente:{'iddoc':'','curricula':'','tituloprofe': '','fechaingreso': '','estado': '','gradoacademico_id': '','categoriadocen_id': '','persona_id':''},

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

    newDni: '',
    newNombres: '',
    newApellidos: '',
    imagen: null,
    newGenero: '',

    newCurricula:'',
    newTitulo: '',
    newFecha: '',
    newEstado: '1',
    newBorrado:'0',
    gradoacademico_id: '0',
    categoriadocente_id: '0',
    persona_id: '0',


},
created: function () {
    this.getDocentes(this.thispage);
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
    getImg(docente) { var
            img="{{ asset('/') }}img/personas/" + docente.foto;
             return img; 
    }, 
    getDocentes: function (page) { 
        var busca=this.buscar; 
        var url='docente?page=' + page + '&busca=' + busca; 
        axios.get(url).then(response=> {
            this.docentes = response.data.docentes.data;
            this.pagination = response.data.pagination;
            this.categoriadocentes = response.data.categoriadocentes;
            this.gradoacademicos = response.data.gradoacademicos;
            this.personas= response.data.personas;
        if (this.docentes.length == 0 && this.thispage != '1') {
            var a = parseInt(this.thispage);
            a--;
            this.thispage = a.toString();
            this.changePage(this.thispage);
        }
        })
        },
    changePage: function (page) {
            this.pagination.current_page = page;
            this.getDocentes(page);
            this.thispage = page;
        },
    buscarBtn: function () {
            this.getDocentes();
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
            this.newDni = '';
            this.newNombres = '';
            this.newApellidos = '';
            this.newCurricula = '';
            this.newFechaingreso = '';
            this.newEstado = '1';
            this.newGenero = '1';
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
            $("#ImgPerfilNuevoE" + idusar).attr("src", "{{ asset('/img/personas/')}}" + "/" + $("#txt" + idusar).val());
            });
            },
    create: function () {
        var url = 'docente';
        $("#btnGuardar").attr('disabled', true);
        $("#btnCancel").attr('disabled', true);
        $("#btnClose").attr('disabled', true);
        this.divloaderNuevo = true;
        $(".form-control").css("border", "1px solid #d2d6de");
            var data = new FormData();
                data.append('dni', this.newDni);
                data.append('nombres', this.newNombres);
                data.append('apellidos', this.newApellidos);
                data.append('imagen', this.imagen);
                data.append('genero', this.newGenero);

                data.append('curricula', '');
                data.append('tituloprofe', this.newTitulo);
                data.append('fechaingreso', this.newFecha);
                data.append('estado', this.newEstado);
                data.append('borrado', this.newBorrado);
                data.append('gradoacademico_id', this.gradoacademico_id);
                data.append('categoriadocente_id', this.categoriadocente_id);
                
            const config = { headers: { 'Content-Type': 'multipart/form-data' } };
            axios.post(url,data,config).then(response=>{

            $("#btnGuardar").removeAttr("disabled");
            $("#btnCancel").removeAttr("disabled");
            $("#btnClose").removeAttr("disabled");
            this.divloaderNuevo = false;

            if (String(response.data.result) == '1') {
                this.getDocentes(this.thispage);
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
        borrardocente: function (docentes) {

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

                    var url = 'docente/' + docentes.iddoc;
                     axios.delete(url).then(response => { //eliminamos

                if (response.data.result == '1') {
                    app.getDocentes(app.thispage); //listamos
                    toastr.success(response.data.msj); //mostramos mensaje
                 } else {
                    // $('#'+response.data.selector).focus();
                    toastr.error(response.data.msj);
                }
            })
            }


            }).catch(swal.noop);
            },

    editbanner: function (docente) {
        this.fillPersona.id = docente.idper;
        this.fillPersona.dni = docente.dni;
        this.fillPersona.nombres = docente.nombres;
        this.fillPersona.apellidos = docente.apellidos;
        this.fillPersona.genero = docente.genero;
        this.imagen = null;
        
        this.fillDocente.id = docente.iddoc;
        this.fillDocente.categoriadocen_id = docente.idcat;
        this.fillDocente.gradoacademico_id = docente.idgrado;
        this.fillDocente.curricula = '';
        this.fillDocente.tituloprofe = docente.tituloprofe;
        this.fillDocente.fechaingreso = docente.fechaingreso;
        this.fillDocente.estado = docente.activo;
        
        $("#modalEditar").modal('show');
            this.$nextTick(function () {
            $("#txttituloE").focus();
        })
    },
    cerrarFormE: function(){

            this.divEditUsuario=false;

            this.$nextTick(function () {
                this.fillPersona={'id':'', 'dni':'', 'nombres':'', 'apellidos':'', 'imagen':'', 'genero':''};
                this.fillDocente={'id':'','curricula':'','tituloprofe': '','fechaingreso': '','estado': '','gradoacademico_id': '','categoriadocen_id': '','persona_id':''};
            })

        },
    updateBanner: function (idper,iddoc) {
        var data = new FormData();

        data.append('idPersona', this.fillPersona.id);
        data.append('idDocente', this.fillDocente.id);

        data.append('id', this.fillPersona.id);
        data.append('dni', this.fillPersona.dni);
        data.append('nombres', this.fillPersona.nombres);
        data.append('apellidos', this.fillPersona.apellidos);
        data.append('imagen', this.imagen);
        data.append('genero', this.fillPersona.genero);

        data.append('curricul', '');        
        data.append('tituloprofe', this.fillDocente.tituloprofe);
        data.append('fechaingreso', this.fillDocente.fechaingreso);
        data.append('estado', this.fillDocente.estado);   
        data.append('gradoacademico_id', this.fillDocente.gradoacademico_id);   
        data.append('categoriadocente_id', this.fillDocente.categoriadocen_id);   

        data.append('_method', 'PUT');

        const config = {headers: {'Content-Type': 'multipart/form-data'}};
        var url = "docente/" + iddoc;
            $("#btnSaveE").attr('disabled', true);
            $("#btnCloseE").attr('disabled', true);
            this.divloaderEdit = true;
            axios.post(url, data, config).then(response => {
            $("#btnSaveE").removeAttr("disabled");
            $("#btnCancelE").removeAttr("disabled");
            this.divloaderEdit = false;

        if (response.data.result == '1') {
            this.getDocentes(this.thispage);
            this.cerrarFormE();
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
bajadocente: function (docentes) {

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
            var url = 'docente/altabaja/' + docentes.iddoc + '/0';
            axios.get(url).then(response => { //eliminamos
        if (response.data.result == '1') {
            app.getDocentes(app.thispage); //listamos
            toastr.success(response.data.msj); //mostramos mensaje
        } else {
            // $('#'+response.data.selector).focus();
            toastr.error(response.data.msj);
        }
    });
}
}).catch(swal.noop);
},

altadocente: function (docentes) {
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
        var url = 'docente/altabaja/' + docentes.iddoc + '/1';
        axios.get(url).then(response => { //eliminamos
    if (response.data.result == '1') {
        app.getDocentes(app.thispage); //listamos
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