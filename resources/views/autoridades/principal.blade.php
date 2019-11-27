<div class="box box-primary panel-group">
  <div class="box-header with-border" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
    <h3 class="box-title">Gestión de Autoridades de la Facultad</h3>
    <a style="float: right;" type="button" class="btn btn-default" href="{{URL::to('home')}}"><i class="fa fa-reply-all"
        aria-hidden="true"></i>
      Volver</a>
  </div>

  <div class="box-body" style="border: 1px solid #3c8dbc;">
    <div class="form-group form-primary">
      <button type="button" class="btn btn-primary" id="btnCrear" @click.prevent="nuevo()"><i
          class="fa fa-plus-square-o" aria-hidden="true"></i> Nuevo Autoridade de la Facultad</button>
    </div>

  </div>

</div>

<div class="box box-success" v-if="divNuevo" style="border: 1px solid #00a65a;">
  <div class="box-header with-border" style="border: 1px solid #00a65a;background-color: #00a65a; color: white;">
    <h3 class="box-title" id="tituloAgregar"> Nuevo Autoridade de la Facultad</h3>
  </div>

  <form v-on:submit.prevent="create">
    <div class="box-body">
      <div class="col-md-12">
        <div class="form-group">
          <label for="dni" class="col-sm-2 control-label">DNI:*</label>
          <div class="col-sm-4">
            <input type="number" class="form-control" id="dni" name="dni" placeholder="DNI del autoridad"
              maxlength="200" autofocus v-model="newDni">
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group" style="padding-top: 15px;">
          <label for="nombres" class="col-sm-2 control-label">Nombres:*</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres del autoridad"
              maxlength="200" autofocus v-model="newNombres">
          </div>
        </div>
      </div>



      <div class="col-md-12">
        <div class="form-group" style="padding-top: 15px;">
          <label for="apellidos" class="col-sm-2 control-label">Apellidos:*</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos Docentes"
              maxlength="500" v-model="newApellidos">
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 10px;">
        <div class="form-group">
          <label for="archivo" class="col-sm-2 control-label">Foto:*</label>
          <div class="col-sm-8" style="padding-top: 10px;">
            <input name="archivo" type="file" id="archivo" class="archivo form-control" @change="getImage"
              accept=".png, .jpg, .jpeg, .gif, .jpe, .PNG, .JPG, .JPEG, .GIF, .JPE" />
          </div>
        </div>
      </div>


      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="genero" class="col-sm-2 control-label">Genero:*</label>
          <div class="col-sm-4">
            <select class="form-control" id="genero" name="genero" v-model="newGenero">
              <option value="1">Masculino</option>
              <option value="0">Femenino</option>
            </select>
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="cbestado" class="col-sm-2 control-label">Estado:*</label>
          <div class="col-sm-4">
            <select class="form-control" id="cbestado" name="cbestado" v-model="newEstado">
              <option value="1">Activado</option>
              <option value="0">Desactivado</option>
            </select>
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="cargo" class="col-sm-2 control-label">Cargo de la Autoridad:*</label>
          <div class="col-sm-8">
            <select name="cargo" id="cargo" class="form-control" v-model="cargo_id">
              <option disabled value="0">Seleccione un Cargo Academico</option>
              <option v-for="cargo, key in cargos" v-bind:value="cargo.id">
                @{{cargo.cargo}}
              </option>
            </select>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group" style="padding-top: 15px;">
          <label for="descripcion" class="col-sm-2 control-label">Descripcion*</label>
          <div class="col-sm-8">
            <textarea name="descripcion" id="descripcion" cols="120" rows="5" placeholder="Descripcion del autoridad"
              maxlength="200" autofocus v-model="newDescripcion"></textarea>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group" style="padding-top: 15px;">
          <label for="fechainicio" class="col-sm-2 control-label">Fecha Ingreso:*</label>
          <div class="col-sm-4">
            <input type="date" class="form-control" id="fechainicio" name="fechainicio"
              placeholder="Fecha de inicio de gestion" maxlength="200" autofocus v-model="newFechaInicio">
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group" style="padding-top: 15px;">
          <label for="fechafin" class="col-sm-2 control-label">Fecha Salida:*</label>
          <div class="col-sm-4">
            <input type="date" class="form-control" id="fechafin" name="fechafin" placeholder="Fecha de fin de gestion"
              maxlength="200" autofocus v-model="newFechaFin">
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
    <h3 class="box-title">Listado de Banner</h3>

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
          <th style="border:1px solid #ddd;padding: 5px; width: 5%;">dni</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Nombres</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Apellidos</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Foto</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Descripcion</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Cargo Academico</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Fecha Inicio</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Fecha Fin</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Estado</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Gestión</th>
        </tr>
        <tr v-for="autoridad, key in autoridades">
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">@{{key+pagination.from}}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">@{{ autoridad.dni }}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">@{{ autoridad.nombres }}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">@{{ autoridad.apellidos }}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px; text-align: center;vertical-align: middle;">
            <img :src="getImg(autoridad)" alt="" style="width: 150px;height:80px">
          </td>
          </td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">@{{ autoridad.descripcion }}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">@{{ autoridad.cargo }}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">@{{ autoridad.fechainicio }}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">@{{ autoridad.fechafin }}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px; vertical-align: middle;">
            <center>
              <span class="label label-success" v-if="autoridad.activo=='1'">Activo</span>
              <span class="label label-warning" v-if="autoridad.activo=='0'">Inactivo</span>
            </center>
          </td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">
            <center>
              <a href="#" v-if="autoridad.activo=='1'" class="btn bg-navy btn-sm"
                v-on:click.prevent="bajadocente(autoridad)" data-placement="top" data-toggle="tooltip"
                title="Desactivar autoridad"><i class="fa fa-arrow-circle-down"></i></a>

              <a href="#" v-if="autoridad.activo=='0'" class="btn btn-success btn-sm"
                v-on:click.prevent="altadocente(autoridad)" data-placement="top" data-toggle="tooltip"
                title="Activar autoridad"><i class="fa fa-check-circle"></i></a>

              <a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editbanner(autoridad)" data-placement="top"
                data-toggle="tooltip" title="Editar autoridad"><i class="fa fa-edit"></i></a>
              <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="borrardocente(autoridad)"
                data-placement="top" data-toggle="tooltip" title="Borrar autoridad"><i class="fa fa-trash"></i></a>
            </center>
          </td>
        </tr>

      </tbody>
    </table>

  </div>
  <!-- /.box-body -->
  <div style="padding: 15px;">
    <div>
      <h5>Registros por Página: @{{ pagination.per_page }}</h5>
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
            <span>@{{ page }}</span>
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
      <h5>Registros Totales: @{{ pagination.total }}</h5>
    </div>
  </div>
</div>

<form method="post" v-on:submit.prevent="updateBanner(fillAutoridad.idauto,fillPersona.idper)">
  <div class="modal bs-example-modal-lg" id="modalEditar" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document" id="modaltamanio">
      <div class="modal-content" style="border: 1px solid #3c8dbc;">
        <div class="modal-header" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"
              style="font-size: 35px;">&times;</span></button>
          <h4 class="modal-title" id="desEditarTitulo" style="font-weight: bold;text-decoration: underline;">EDITAR
            DATOS DEL DOCENTE</h4>

        </div>
        <div class="modal-body">
          <div class="row">
            <div class="box" id="o" style="border:0px; box-shadow:none;">
              <!-- /.box-header -->
              <!-- form start -->
              <div class="box-body">

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="txttituloE" class="col-sm-2 control-label">DNI:*</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="dniE" name="dniE" placeholder="Banner" maxlength="200"
                        autofocus v-model="fillPersona.dni">
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group" style="padding-top: 15px;">
                    <label for="txttituloE" class="col-sm-2 control-label">Nombres:*</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="nombresE" name="nombresE"
                        placeholder="Nombres de la autoridad" maxlength="200" autofocus v-model="fillPersona.nombres">
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group" style="padding-top: 15px;">
                    <label for="txttituloE" class="col-sm-2 control-label">Apellidos:*</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="ApellidosE" name="ApellidosE"
                        placeholder="Apellidos de la autoridad" maxlength="200" autofocus
                        v-model="fillPersona.apellidos">
                    </div>
                  </div>
                </div>

                <div class="col-md-12" style="padding-top: 15px;">
                  <div class="form-group">
                    <label for="archivo" class="col-sm-2 control-label">Foto :*</label>
                    <div class="col-sm-8" style="padding-top: 10px;">
                      <input name="archivo" type="file" id="archivo" class="archivo form-control" @change="getImage"
                        accept=".png, .jpg, .jpeg, .gif, .jpe, .PNG, .JPG, .JPEG, .GIF, .JPE" />
                    </div>
                  </div>
                </div>

                <div class="col-md-12" style="padding-top: 15px;">
                  <div class="form-group">
                    <label for="cbgeneroE" class="col-sm-2 control-label">Genero:*</label>
                    <div class="col-sm-4">
                      <select class="form-control" id="cbgeneroE" name="cbgeneroE" v-model="fillPersona.genero">
                        <option value="1">Masculino</option>
                        <option value="0">Femenino</option>
                      </select>
                    </div>
                  </div>
                </div>


                <div class="col-md-12" style="padding-top: 15px; color: black;">
                  <div class="form-group">
                    <label for="cdCargoE" class="col-sm-2 control-label">Grado Academico:*</label>
                    <div class="col-sm-4">
                      <select class="form-control" id="cdCargoE" name="cdCargoE" v-model="fillAutoridad.cargo_id">
                        <option disabled value="">Seleccione una cargo </option>
                        <option v-for="cargo, key in cargos" v-bind:value="cargo.id">@{{ cargo.cargo }} </option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group" style="padding-top: 15px;">
                    <label for="descripcion" class="col-sm-2 control-label">Descripcion*</label>
                    <div class="col-sm-8">
                      <textarea name="descripcion" id="descripcion" cols="120" rows="5"
                        placeholder="Descripcion del autoridad" maxlength="200" autofocus
                        v-model="fillAutoridad.descripcion"></textarea>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group" style="padding-top: 15px;">
                    <label for="fechainicio" class="col-sm-2 control-label">Fecha Ingreso:*</label>
                    <div class="col-sm-4">
                      <input type="date" class="form-control" id="fechainicio" name="fechainicio"
                        placeholder="Fecha de inicio de gestion" maxlength="200" autofocus v-model="fillAutoridad.fechainicio">
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group" style="padding-top: 15px;">
                    <label for="fechafin" class="col-sm-2 control-label">Fecha Salida:*</label>
                    <div class="col-sm-4">
                      <input type="date" class="form-control" id="fechafin" name="fechafin"
                        placeholder="Fecha de fin de gestion" maxlength="200" autofocus v-model="fillAutoridad.fechafin">
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
</form>