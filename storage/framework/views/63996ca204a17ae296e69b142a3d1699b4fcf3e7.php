<div class="box box-primary panel-group">
  <div class="box-header with-border" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
    <h3 class="box-title">Gestión de Convocatorias</h3>
    <a style="float: right;" type="button" class="btn btn-default" href="<?php echo e(URL::to('home')); ?>"><i class="fa fa-reply-all"
        aria-hidden="true"></i>
      Volver</a>
  </div>

  <div class="box-body" style="border: 1px solid #3c8dbc;">
    <div class="form-group form-primary">
      <button type="button" class="btn btn-primary" id="btnCrear" @click.prevent="nuevo()"><i
          class="fa fa-plus-square-o" aria-hidden="true"></i> Nueva Convocatoria</button>
    </div>

  </div>

</div>

<div class="box box-success" v-if="divNuevo" style="border: 1px solid #00a65a;">
  <div class="box-header with-border" style="border: 1px solid #00a65a;background-color: #00a65a; color: white;">
    <h3 class="box-title" id="tituloAgregar">Nueva Convocatoria</h3>
  </div>

  <form v-on:submit.prevent="create">
    <div class="box-body">

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txtconvocatoria" class="col-sm-2 control-label">Nombre de la Convocatoria:*</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="txtconvocatoria" name="txtconvocatoria"
              placeholder="Convocatoria" maxlength="550" autofocus v-model="newConvocatoria">
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
          <label for="cbuTipoConvocatorias" class="col-sm-2 control-label">Tipo de Contrato:*</label>
          <div class="col-sm-8">
            <select name="cbuTipoConvocatorias" id="cbuTipoConvocatorias" class="form-control" v-model="newTipoConvocatoria">
              <option disabled value="0">-- Seleccione un Tipo Contrato--</option>
              <option v-for="tipoconv, key in tipoconvocatorias" v-bind:value="tipoconv.id">{{tipoconv.nombre}}
              </option>
            </select>
          </div>
        </div>
      </div>     

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="cbuFacultades" class="col-sm-2 control-label">Facultad:*</label>
          <div class="col-sm-8">
            <select name="cbuFacultades" id="cbuFacultades" class="form-control" v-model="newFacultad">
              <option disabled value="0">-- Seleccione una Facultad --</option>
              <option v-for="facultad, key in facultads" v-bind:value="facultad.id">{{facultad.nombre}}</option>
            </select>
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txtasignaturas" class="col-sm-2 control-label">Asignaturas:*</label>
          <div class="col-sm-8">
            <!-- <input type="text" class="form-control" id="txtdesc" placeholder="Descripción" > -->
            
            <CKEDITOR v-model="newAsignaturas" name="txtasignaturas" id="txtasignaturas" rows="12">
            </CKEDITOR>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group" style="padding-top: 15px;">
          <label for="txtrequerido" class="col-sm-2 control-label">Personal Requerido:*</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="txtrequerido" name="txtrequerido" placeholder="Cargo" maxlength="500"
              v-model="newRequerido">
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group" style="padding-top: 15px;">
          <label for="txtnroplazas" class="col-sm-2 control-label">Nº de Plazas:*</label>
          <div class="col-sm-3">
            <input type="number" class="form-control" id="txtnroplazas" name="txtnroplazas"
              placeholder="Numero de plazas" v-model="newNroPlazas">
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group" style="padding-top: 15px;">
          <label for="txtfechainicio" class="col-sm-2 control-label">Fecha Inicio:*</label>
          <div class="col-sm-3">
            <input type="date" class="form-control" id="txtfechainicio" name="txtfechainicio" v-model="newFechaInicio">
          </div>
          <label for="txtfechafin" class="col-sm-2 control-label">Fecha Fin:*</label>
          <div class="col-sm-3">
            <input type="date" class="form-control" id="txtfechafin" name="txtfechafin" v-model="newFechaFin">
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="archivo" class="col-sm-2 control-label">Bases :*</label>
          <div class="col-sm-8" style="padding-top: 10px;">
            <input name="archivo" type="file" id="archivo" class="archivo form-control" @change="getImage"
              accept=".pdf, .PDF" />
          </div>
        </div>
      </div>

    </div>

    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-info" id="btnGuardar">Guardar</button>

      <button type="reset" class="btn btn-warning" id="btnCancel" @click="cancelFormNuevo()">Cancelar</button>

      <button type="button" class="btn btn-default" id="btnClose" @click.prevent="cerrarFormNuevo()">Cerrar</button>

      <div class="sk-circle" v-show="divloaderNuevo">
        <div class="sk-circle1 sk-child"></div>
        <div class="sk-circle2 sk-child"></div>
        <div class="sk-circle3 sk-child"></div>
        <div class="sk-circle4 sk-child"></div>
        <div class="sk-circle5 sk-child"></div>
        <div class="sk-circle6 sk-child"></div>
        <div class="sk-circle7 sk-child"></div>
        <div class="sk-circle8 sk-child"></div>
        <div class="sk-circle9 sk-child"></div>
        <div class="sk-circle10 sk-child"></div>
        <div class="sk-circle11 sk-child"></div>
        <div class="sk-circle12 sk-child"></div>
      </div>

    </div>
    <!-- /.box-footer -->

  </form>
</div>




<div class="box box-primary" style="border: 1px solid #3c8dbc;">
  <div class="box-header" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
    <h3 class="box-title">Listado de Convocatorias</h3>

    <div class="box-tools">
      <div class="input-group input-group-sm" style="width: 300px;">
        <input type="text" name="table_search" class="form-control pull-right" placeholder="Buscar" v-model="buscar"
          @keyup.enter="buscarBtn()">

        <div class="input-group-btn">
          <button type="submit" class="btn btn-default" @click.prevent="buscarBtn()"><i
              class="fa fa-search"></i></button>
        </div>


      </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body table-responsive">
    <table class="table table-hover table-bordered table-dark table-condensed table-striped">
      <tbody>
        <tr>
          <th style="border:1px solid #ddd;padding: 5px; width: 5%;">#</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 15%;">Convocatoria</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Tipo</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Personal Requerido</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 5%;">Bases</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 5%;">Fecha Inicio</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 5%;">Fecha Fin</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 5%;">Estado</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 7%;">Gestión</th>
        </tr>
        <tr v-for="convocatoria, key in convocatorias">
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;vertical-align: middle;"> {{key+pagination.from}}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;vertical-align: middle;"> {{ convocatoria.convocatoria }}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;vertical-align: middle;"> {{ convocatoria.tipoconvocatoria }}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;vertical-align: middle;"> {{ convocatoria.requerido }}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;text-align: center;vertical-align: middle;" >
            <a v-bind:href="getPDF(convocatoria)" target="_blank"><img src="<?php echo e(asset('img/instrumentos/pdf.png')); ?>"  alt="" class="img img-responsive" style="max-height: 3em;"></a>
          </td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;vertical-align: middle;"> {{ convocatoria.fechaini }}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;vertical-align: middle;"> {{ convocatoria.fechafin }}</td>

          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px; vertical-align: middle;">
            <center>
              <span class="label label-success" v-if="convocatoria.condicion=='1'">Vigente</span>
              <span class="label label-warning" v-if="convocatoria.condicion=='0'">Caducado</span>
            </center>
          </td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;vertical-align: middle;">
            <center>
              <a href="#" v-if="convocatoria.condicion=='1'" class="btn bg-navy btn-sm"
                v-on:click.prevent="bajaconvocatoria(convocatoria)" data-placement="top" data-toggle="tooltip"
                title="Desactivar convocatoria"><i class="fa fa-arrow-circle-down"></i></a>

              <a href="#" v-if="convocatoria.condicion=='0'" class="btn btn-success btn-sm"
                v-on:click.prevent="altaconvocatoria(convocatoria)" data-placement="top" data-toggle="tooltip"
                title="Activar convocatoria"><i class="fa fa-check-circle"></i></a>


              <a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editconvocatoria(convocatoria)"
                data-placement="top" data-toggle="tooltip" title="Editar convocatoria"><i class="fa fa-edit"></i></a>
              <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="borrarconvocatoria(convocatoria)"
                data-placement="top" data-toggle="tooltip" title="Borrar convocatoria"><i class="fa fa-trash"></i></a>
            </center>
          </td>
        </tr>

      </tbody>
    </table>

  </div>
  <!-- /.box-body -->
  <div style="padding: 15px;">
    <div>
      <h5>Registros por Página: {{ pagination.per_page }}</h5>
    </div>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item" v-if="pagination.current_page>1">
          <a class="page-link" href="#" @click.prevent="changePage(1)">
            <span><b>Inicio</b></span>
          </a>
        </li>

        <li class="page-item" v-if="pagination.current_page>1">
          <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page-1)">
            <span>Atras</span>
          </a>
        </li>
        <li class="page-item" v-for="page in pagesNumber" v-bind:class="[page=== isActived ? 'active' : '']">
          <a class="page-link" href="#" @click.prevent="changePage(page)">
            <span>{{ page }}</span>
          </a>
        </li>
        <li class="page-item" v-if="pagination.current_page< pagination.last_page">
          <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page+1)">
            <span>Siguiente</span>
          </a>
        </li>
        <li class="page-item" v-if="pagination.current_page< pagination.last_page">
          <a class="page-link" href="#" @click.prevent="changePage(pagination.last_page)">
            <span><b>Ultima</b></span>
          </a>
        </li>
      </ul>
    </nav>
    <div>
      <h5>Registros Totales: {{ pagination.total }}</h5>
    </div>
  </div>
</div>

<form method="post" v-on:submit.prevent="updateConvocatoria(fillConvocatoria.id)">
  <div class="modal bs-example-modal-lg" id="modalEditar" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document" id="modaltamanio">
      <div class="modal-content" style="border: 1px solid #3c8dbc;">
        <div class="modal-header" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"
              style="font-size: 35px;">&times;</span></button>
          <h4 class="modal-title" id="desEditarTitulo" style="font-weight: bold;text-decoration: underline;">EDITAR
            CONVOCATORIA</h4>

        </div>
        <div class="modal-body">
          <div class="row">
            <div class="box" id="o" style="border:0px; box-shadow:none;">
              <!-- /.box-header -->
              <!-- form start -->
              <div class="box-body">

                <div class="col-md-12" style="padding-top: 15px;">
                  <div class="form-group">
                    <label for="txtconvocatoriaE" class="col-sm-2 control-label">Nombre de la Convocatoria:*</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="txtconvocatoriaE" name="txtconvocatoriaE" maxlength="550" autofocus v-model="fillConvocatoria.convocatoria">
                    </div>
                  </div>
                </div>
          
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="cbuTipoConvocatoriasE" class="col-sm-2 control-label">Tipo de Contrato:*</label>
                    <div class="col-sm-8">
                      <select name="cbuTipoConvocatoriasE" id="cbuTipoConvocatoriasE" class="form-control">
                        <option disabled value="">-- Seleccione --</option>
                        <option v-for="tipoconv, key in tipoconvocatorias" v-bind:value="tipoconv.id">{{tipoconv.nombre}}
                        </option>
                      </select>
                    </div>
                  </div>
                </div>     
          
                <div class="col-md-12" style="padding-top: 15px;">
                  <div class="form-group">
                    <label for="cbuFacultadesE" class="col-sm-2 control-label">Facultad:*</label>
                    <div class="col-sm-8">
                      <select name="cbuFacultadesE" id="cbuFacultadesE" class="form-control">
                        <option disabled value="">Seleccione una Facultad</option>
                        <option v-for="facultad, key in facultads" v-bind:value="facultad.id">{{facultad.nombre}}</option>
                      </select>
                    </div>
                  </div>
                </div>
          
                <div class="col-md-12" style="padding-top: 15px;">
                  <div class="form-group">
                    <label for="txtasignaturasE" class="col-sm-2 control-label">Asignaturas:*</label>
                    <div class="col-sm-8">
                      <!-- <input type="text" class="form-control" id="txtdesc" placeholder="Descripción" > -->
                      
                      <CKEDITOR  name="txtasignaturasE" id="txtasignaturasE" rows="12">
                      </CKEDITOR>
                    </div>
                  </div>
                </div>
          
                <div class="col-md-12">
                  <div class="form-group" style="padding-top: 15px;">
                    <label for="txtrequeridoE" class="col-sm-2 control-label">Personal Requerido:*</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="txtrequeridoE" name="txtrequeridoE" placeholder="Cargo" maxlength="500"
                        v-model="fillConvocatoria.requerido">
                    </div>
                  </div>
                </div>
          
                <div class="col-md-12">
                  <div class="form-group" style="padding-top: 15px;">
                    <label for="txtnroplazasE" class="col-sm-2 control-label">Nº de Plazas:*</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" id="txtnroplazasE" name="txtnroplazasE" v-model="fillConvocatoria.nroplazas">
                    </div>
                  </div>
                </div>
          
                <div class="col-md-12">
                  <div class="form-group" style="padding-top: 15px;">
                    <label for="txtfechainicioE" class="col-sm-2 control-label">Fecha Inicio:*</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" id="txtfechainicioE" name="txtfechainicioE" v-model="fillConvocatoria.fechaini">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group" style="padding-top: 15px;">
                    <label for="txtfechafinE" class="col-sm-2 control-label">Fecha Fin:*</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" id="txtfechafinE" name="txtfechafinE" v-model="fillConvocatoria.fechafin">
                    </div>
                  </div>
                </div>
          
                <div class="col-md-12" style="padding-top: 15px;">
                  <div class="form-group">
                    <label for="archivo" class="col-sm-2 control-label">Bases :*</label>
                    <div class="col-sm-8" style="padding-top: 10px;">
                      <input name="archivo" type="file" id="archivo" class="archivo form-control" @change="getImage"
                        accept=".pdf, .PDF" />
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" id="btnSaveE"><i class="fa fa-floppy-o"
                  aria-hidden="true"></i>
                Guardar</button>

              <button type="button" id="btnCancelE" class="btn btn-default" data-dismiss="modal"><i
                  class="fa fa-sign-out" aria-hidden="true"></i> Cerrar</button>

              <div class="sk-circle" v-show="divloaderEdit">
                <div class="sk-circle1 sk-child"></div>
                <div class="sk-circle2 sk-child"></div>
                <div class="sk-circle3 sk-child"></div>
                <div class="sk-circle4 sk-child"></div>
                <div class="sk-circle5 sk-child"></div>
                <div class="sk-circle6 sk-child"></div>
                <div class="sk-circle7 sk-child"></div>
                <div class="sk-circle8 sk-child"></div>
                <div class="sk-circle9 sk-child"></div>
                <div class="sk-circle10 sk-child"></div>
                <div class="sk-circle11 sk-child"></div>
                <div class="sk-circle12 sk-child"></div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form><?php /**PATH D:\Roger\Aplicaciones\webUNASAM2019\resources\views/convocatoria/principal.blade.php ENDPATH**/ ?>