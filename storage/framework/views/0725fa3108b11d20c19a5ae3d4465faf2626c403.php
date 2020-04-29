<script type="text/javascript">
    let app = new Vue({
    el: '#app',
    data: {
    titulo: "Mantenimiento",
    subtitulo: "Gestión de Alumnos",
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
    classMenu3: '',
    classMenu4: '',
    classMenu5: '',
    classMenu6: '',
    classMenu7: '',
    classMenu8: 'active',
    classMenu9: '',
    classMenu10: '',
    classMenu11: '',
    classMenu12: '',


    divprincipal: false,

    alumnos: [],
    comiestudiantiles: [],
    persona:[],
    facultades: [],
    errors: [],

    fillPersona:{'idper':'', 'dni':'', 'nombres':'', 'apellidos':'', 'imagen':'', 'genero':''},

    fillAlumno:{'idalu':'','estado': '','persona_id':'','comiestudiantil_id':'','facultad_id':''},

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

    newEstado: '1',
    comiestudiantil_id: '0',
    facultad_id: '0',


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
    getImg(alumnos) { var
            img="<?php echo e(asset('/')); ?>img/personas/" + alumnos.foto;
             return img; 
    }, 
    getAutoridades: function (page) { 
        var busca=this.buscar; 
        var url='alumno?page=' + page + '&busca=' + busca; 
        axios.get(url).then(response=> {
            this.alumnos = response.data.alumnos.data;
            this.pagination = response.data.pagination;
            this.comiestudiantiles = response.data.comiestudiantiles;
            this.personas= response.data.personas;
            this.facultades = response.data.facultades;

        if (this.alumnos.length == 0 && this.thispage != '1') {
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
            $('#dni').focus();
            this.newDni = '';
            this.newNombres = '';
            this.newApellidos = '';
            this.newEstado = '1';
            this.newGenero = '1';
            this.imagen = null;
            this.comiestudiantil_id = '0';
            this.facultad_id = '0';

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
            $("#ImgPerfilNuevoE" + idusar).attr("src", "<?php echo e(asset('/img/personas/')); ?>" + "/" + $("#txt" + idusar).val());
            });
            },
    create: function () {
        var url = 'alumno';
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

                data.append('estado', this.newEstado);
                data.append('comiestudiantil_id', this.comiestudiantil_id);
                data.append('facultad_id', this.facultad_id);
                
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
        borrardocente: function (alumnos) {

            swal.fire({
                title: '¿Estás seguro?',
                text: "¿Desea eliminar el Alumno Seleccionado? -- Nota: este proceso no se podrá revertir.",
                type: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar'
            }).then((result) => {

                if (result.value) {

                    var url = 'alumno/' + alumnos.idalu;
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

    editbanner: function (alumnos) {
        this.fillPersona.idper = alumnos.idper;
        this.fillPersona.dni = alumnos.dni;
        this.fillPersona.nombres = alumnos.nombres;
        this.fillPersona.apellidos = alumnos.apellidos;
        this.fillPersona.genero = alumnos.genero;
        this.imagen = null;
        
        this.fillAlumno.idalu = alumnos.idalu;
        this.fillAlumno.comiestudiantil_id = alumnos.idcomi;
        this.fillAlumno.facultad_id = alumnos.idfac

        $("#modalEditar").modal('show');
            this.$nextTick(function () {
            $("#txttituloE").focus();
        })
    },
    cerrarFormE: function(){

            this.divEditUsuario=false;

            this.$nextTick(function () {
                this.fillPersona={'id':'', 'dni':'', 'nombres':'', 'apellidos':'', 'imagen':'', 'genero':''};
                this.fillAlumno={'idalu':'','estado': '','persona_id':'','comiestudiantil_id':''};
            })

        },
    updateBanner: function (idper,idauto) {
        var data = new FormData();

        data.append('idper', this.fillPersona.idper);
        data.append('idalu', this.fillAlumno.idalu);

        data.append('dni', this.fillPersona.dni);
        data.append('nombres', this.fillPersona.nombres);
        data.append('apellidos', this.fillPersona.apellidos);
        data.append('imagen', this.imagen);
        data.append('genero', this.fillPersona.genero);

        data.append('comiestudiantil_id', this.fillAlumno.comiestudiantil_id);
        data.append('facultad_id', this.fillAlumno.facultad_id);   

        data.append('_method', 'PUT');

        const config = {headers: {'Content-Type': 'multipart/form-data'}};
        
        var url = "alumno/" + idauto;
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
bajadocente: function (alumnos) {

        swal.fire({
            title: '¿Estás seguro?',
            text: "Desea desactivar el Alumno seleccionado",
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Desactivar'
        }).then((result) => {
        if (result.value) {
            var url = 'alumno/altabaja/' + alumnos.idalu + '/0';
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

altadocente: function (alumnos) {
    swal.fire({
        title: '¿Estás seguro?',
        text: "Desea activar el alumno seleccionado",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Activar'
    }).then((result) => {
    if (result.value) {
        var url = 'alumno/altabaja/' + alumnos.idalu + '/1';
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
</script><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/alumnos/vue.blade.php ENDPATH**/ ?>