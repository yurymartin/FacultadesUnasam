<div class="box box-primary panel-group">
  <div class="box-header with-border" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
    <h3 class="box-title">Gestión de los Roles de los usuarios</h3>
    <a style="float: right;" type="button" class="btn btn-default" href="<?php echo e(URL::to('home')); ?>"><i class="fa fa-reply-all"
        aria-hidden="true"></i>
      Volver</a>
  </div>

  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create roles', Model::class)): ?>
  <div class="box-body" style="border: 1px solid #3c8dbc;">
    <div class="form-group form-primary">
      <button type="button" class="btn btn-primary" id="btnCrear" @click.prevent="nuevo()"><i
          class="fa fa-plus-square-o" aria-hidden="true"></i>Nuevo Rol de usuario</button>
    </div>

  </div>
  <?php endif; ?>

</div>

<div class="box box-success" v-if="divNuevo" style="border: 1px solid #00a65a;">
  <div class="box-header with-border" style="border: 1px solid #00a65a;background-color: #00a65a; color: white;">
    <h3 class="box-title" id="tituloAgregar">Nuevo Rol de usuario</h3>
  </div>

  <form v-on:submit.prevent="create">
    <div class="box-body">

      <div class="col-md-12" style="padding-top: 10px;">
        <div class="form-group">
          <label for="rol" class="col-sm-2 control-label">Rol de usuario:*</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="rol" name="rol" placeholder="rol de estudio" maxlength="200"
              autofocus v-model="newName">
          </div>
        </div>
      </div>

      <div class="col-md-12 text-center">
        <hr>
        <h2 style="font-family: 'Times New Roman', Times, serif"><strong>LISTA DE PERMISOS</strong></h2>
        <br><br>
      </div>
      <div class="col-md-12">
        <div class="col-md-3" v-for="permiso in permissions">
          <ul style="list-style-type: none">
            <li>
              <label>
                <input type="checkbox" name="permissions[]" value="permiso.id"><strong><span
                    style="font-size: 14px;font-family:'Times New Roman', Times, serif;padding-left: 10px">{{permiso.name}}</span>
              </label>
            </li>
          </ul>
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




<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read roles', Model::class)): ?>
<div class="box box-primary" style="border: 1px solid #3c8dbc;">
  <div class="box-header" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
    <h3 class="box-title">Listado de Temas de Estudio</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body table-responsive">
    <table class="table table-hover table-bordered table-dark table-condensed table-striped">
      <tbody>
        <tr>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">#</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 20%;">Rol</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 20%;">Gestión</th>
        </tr>
        <tr v-for="rol, key in roles">
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px">{{key+pagination.from}}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px">{{ rol.name }}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">
            <center>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update roles', Model::class)): ?>
              <a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editbanner(rol)" data-placement="top"
                data-toggle="tooltip" title="Editar descripcion facultad"><i class="fa fa-edit"></i></a>
              <?php endif; ?>
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
<?php endif; ?>

<form method="post" v-on:submit.prevent="updateBanner(fillRol.id)">
  <div class="modal bs-example-modal-lg" id="modalEditar" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document" id="modaltamanio">
      <div class="modal-content" style="border: 1px solid #3c8dbc;">
        <div class="modal-header" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"
              style="font-size: 35px;">&times;</span></button>
          <h4 class="modal-title" id="desEditarTitulo" style="font-weight: bold;text-decoration: underline;">EDITAR
            EL TEMA DE ESTUDIO</h4>

        </div>
        <div class="modal-body">
          <div class="row">
            <div class="box" id="o" style="border:0px; box-shadow:none;">
              <!-- /.box-header -->
              <!-- form start -->
              <div class="box-body">

                <div class="col-md-12" style="padding-top: 10px;">
                  <div class="form-group">
                    <label for="rol" class="col-sm-2 control-label">Nombre del Rol:*</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="rol" name="rol" placeholder="rol de estudio"
                        maxlength="200" autofocus v-model="fillRol.name">
                    </div>
                  </div>
                </div>

                <div class="col-md-12 text-center">
                  <hr>
                  <h2 style="font-family: 'Times New Roman', Times, serif"><strong>LISTA DE PERMISOS</strong></h2>
                  <br><br>
                </div>
                <div class="col-md-12">
                  <div class="col-md-3" v-for="permiso in permissions">
                    <ul style="list-style-type: none">
                      <li>
                        <label>
                          <input type="checkbox" name="permissions[]" value="permiso.id"><strong><span
                              style="font-size: 14px;font-family:'Times New Roman', Times, serif;padding-left: 10px">{{permiso.name}}</span>
                        </label>
                      </li>
                    </ul>
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
</form><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/roles/principal.blade.php ENDPATH**/ ?>