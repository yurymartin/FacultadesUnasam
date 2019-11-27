<script type="text/javascript">
    let app = new Vue({
    el: '#app',
    data: {
    titulo: "Mantenimiento",
    subtitulo: "Gestión de Autoridades",
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

    autoridades: [],
    cargos: [],
    persona:[],
    errors: [],

    fillPersona:{'idper':'', 'dni':'', 'nombres':'', 'apellidos':'', 'imagen':'', 'genero':''},

    fillAutoridad:{'idauto':'','descripcion':'','fechainicio': '','fechafin': '','estado': '','cargo_id':'','persona_id':''},

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

    newDescripcion:'',
    newFechaInicio: '',
    newFechaFin: '',
    newEstado: '1',
    cargo_id: '0',
    persona_id: '0',


},
created: function () {
    this.getAutoridades(this.thispage);
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
    getImg(autoridades) { var
            img="{{ asset('/') }}img/personas/" + autoridades.foto;
             return img; 
    }, 
    getAutoridades: function (page) { 
        var busca=this.buscar; 
        var url='autoridad?page=' + page + '&busca=' + busca; 
        axios.get(url).then(response=> {
            this.autoridades = response.data.autoridades.data;
            this.pagination = response.data.pagination;
            this.cargos = response.data.cargos;
            this.personas= response.data.personas;

        if (this.autoridades.length == 0 && this.thispage != '1') {
            var a = parseInt(this.thispage);
            a--;
            this.thispage = a.toString();
            this.changePage(this.thispage);
        }
        })
        },
    changePage: function (page) {
            this.pagination.current_page = page;
            this.getAutoridades(page);
            this.thispage = page;
        },
    buscarBtn: function () {
            this.getAutoridades();
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
            $('#nombres').focus();
            this.newDni = '';
            this.newNombres = '';
            this.newApellidos = '';
            this.newDescripcion = '';
            this.newFechaInicio = '';
            this.newFechaFin = '';
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
        var url = 'autoridad';
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

                data.append('descripcion', this.newDescripcion);
                data.append('fechainicio', this.newFechaInicio);
                data.append('fechafin', this.newFechaFin);
                data.append('estado', this.newEstado);
                data.append('cargo_id', this.cargo_id);
                
            const config = { headers: { 'Content-Type': 'multipart/form-data' } };
            axios.post(url,data,config).then(response=>{

            $("#btnGuardar").removeAttr("disabled");
            $("#btnCancel").removeAttr("disabled");
            $("#btnClose").removeAttr("disabled");
            this.divloaderNuevo = false;

            if (String(response.data.result) == '1') {
                this.getAutoridades(this.thispage);
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
        borrardocente: function (autoridades) {

            swal.fire({
                title: '¿Estás seguro?',
                text: "¿Desea eliminar la autoridad Seleccionado? -- Nota: este proceso no se podrá revertir.",
                type: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar'
            }).then((result) => {

                if (result.value) {

                    var url = 'autoridad/' + autoridades.idauto;
                     axios.delete(url).then(response => { //eliminamos

                if (response.data.result == '1') {
                    app.getAutoridades(app.thispage); //listamos
                    toastr.success(response.data.msj); //mostramos mensaje
                 } else {
                    // $('#'+response.data.selector).focus();
                    toastr.error(response.data.msj);
                }
            })
            }


            }).catch(swal.noop);
            },

    editbanner: function (autoridades) {
        this.fillPersona.idper = autoridades.idper;
        this.fillPersona.dni = autoridades.dni;
        this.fillPersona.nombres = autoridades.nombres;
        this.fillPersona.apellidos = autoridades.apellidos;
        this.fillPersona.genero = autoridades.genero;
        this.imagen = null;
        
        this.fillAutoridad.idauto = autoridades.idauto;
        this.fillAutoridad.descripcion = autoridades.descripcion;
        this.fillAutoridad.fechainicio = autoridades.fechainicio;
        this.fillAutoridad.fechafin = autoridades.fechafin;
        this.fillAutoridad.cargo_id = autoridades.idcargo;
        $("#modalEditar").modal('show');
            this.$nextTick(function () {
            $("#txttituloE").focus();
        })
    },
    cerrarFormE: function(){

            this.divEditUsuario=false;

            this.$nextTick(function () {
                this.fillPersona={'id':'', 'dni':'', 'nombres':'', 'apellidos':'', 'imagen':'', 'genero':''};
                this.fillAutoridad={'idauto':'','descripcion':'','fechainicio': '','fechafin': '','estado': '','cargo_id':'','persona_id':''};
            })

        },
    updateBanner: function (idper,idauto) {
        var data = new FormData();

        data.append('idper', this.fillPersona.idper);
        data.append('idauto', this.fillAutoridad.idauto);

        data.append('dni', this.fillPersona.dni);
        data.append('nombres', this.fillPersona.nombres);
        data.append('apellidos', this.fillPersona.apellidos);
        data.append('imagen', this.imagen);
        data.append('genero', this.fillPersona.genero);
     
        data.append('descripcion', this.fillAutoridad.descripcion);
        data.append('fechainicio', this.fillAutoridad.fechainicio);
        data.append('fechafin', this.fillAutoridad.fechafin);   
        data.append('cargo_id', this.fillAutoridad.cargo_id);   

        data.append('_method', 'PUT');

        const config = {headers: {'Content-Type': 'multipart/form-data'}};
        
        var url = "autoridad/" + idauto;
            $("#btnSaveE").attr('disabled', true);
            $("#btnCloseE").attr('disabled', true);
            this.divloaderEdit = true;
            axios.post(url, data, config).then(response => {
            $("#btnSaveE").removeAttr("disabled");
            $("#btnCancelE").removeAttr("disabled");
            this.divloaderEdit = false;

        if (response.data.result == '1') {
            this.getAutoridades(this.thispage);
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
bajadocente: function (autoridades) {

        swal.fire({
            title: '¿Estás seguro?',
            text: "Desea desactivar la autoridad seleccionado",
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Desactivar'
        }).then((result) => {
        if (result.value) {
            var url = 'autoridad/altabaja/' + autoridades.idauto + '/0';
            axios.get(url).then(response => { //eliminamos
        if (response.data.result == '1') {
            app.getAutoridades(app.thispage); //listamos
            toastr.success(response.data.msj); //mostramos mensaje
        } else {
            // $('#'+response.data.selector).focus();
            toastr.error(response.data.msj);
        }
    });
}
}).catch(swal.noop);
},

altadocente: function (autoridades) {
    swal.fire({
        title: '¿Estás seguro?',
        text: "Desea activar la autoridad seleccionado",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Activar'
    }).then((result) => {
    if (result.value) {
        var url = 'autoridad/altabaja/' + autoridades.idauto + '/1';
        axios.get(url).then(response => { //eliminamos
    if (response.data.result == '1') {
        app.getAutoridades(app.thispage); //listamos
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