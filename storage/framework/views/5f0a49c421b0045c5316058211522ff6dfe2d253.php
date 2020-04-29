<div class="box box-primary panel-group">
  <div class="box-header with-border" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
    <h3 class="box-title">Gestión de Usuarios</h3>
    <a style="float: right;" type="button" class="btn btn-default" href="<?php echo e(URL::to('home')); ?>"><i class="fa fa-reply-all"
        aria-hidden="true"></i>
      Volver</a>
  </div>

  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', Model::class)): ?>
  <div class="box-body" style="border: 1px solid #3c8dbc;">
    <div class="form-group form-primary">
      <button type="button" class="btn btn-primary" id="btnCrear" @click.prevent="nuevo()"><i
          class="fa fa-plus-square-o" aria-hidden="true"></i> Nuevo Usuario</button>
    </div>

  </div>
  <?php endif; ?>

</div>

<div class="box box-success" v-if="divNuevo" style="border: 1px solid #00a65a;">
  <div class="box-header with-border" style="border: 1px solid #00a65a;background-color: #00a65a; color: white;">
    <h3 class="box-title" id="tituloAgregar">Nuevo Usuario</h3>
  </div>

  <form v-on:submit.prevent="create">
    <?php echo csrf_field(); ?>
    <div class="box-body">
      <div class="col-md-12">
        <div class="form-group">
          <label for="dni" class="col-sm-2 control-label">DNI:*</label>
          <div class="col-sm-4">
            <input type="number" class="form-control" id="dni" name="dni" placeholder="DNI del user" maxlength="200"
              autofocus v-model="newDni">
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group" style="padding-top: 15px;">
          <label for="nombres" class="col-sm-2 control-label">Nombres:*</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres del user"
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

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="cbuestado" class="col-sm-2 control-label">Genero:*</label>
          <div class="col-sm-4">
            <select class="form-control" id="cbgenero" name="cbgenero" v-model="newGenero">
              <option value="1">Masculino</option>
              <option value="0">Femenino</option>
            </select>
          </div>
        </div>
      </div>


      <div class="col-md-12">
        <div class="form-group" style="padding-top: 15px;">
          <label for="login" class="col-sm-2 control-label">Login:*</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="login" name="login" placeholder="login del usuario"
              maxlength="500" v-model="newName" autocomplete="off">
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group" style="padding-top: 15px;">
          <label for="email" class="col-sm-2 control-label">Email:*</label>
          <div class="col-sm-4">
            <input type="email" class="form-control" id="email" name="email" placeholder="email del usuario"
              maxlength="500" v-model="newEmail" autocomplete="off">
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group" style="padding-top: 15px;">
          <label for="password" class="col-sm-2 control-label">Password:*</label>
          <div class="col-sm-4">
            <input type="password" class="form-control" id="password" name="password" placeholder="password del usuario"
              maxlength="500" v-model="newPassword" autocomplete="off">
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="rol" class="col-sm-2 control-label">Rol del Usuario:*</label>
          <div class="col-sm-4">
            <select name="rol" id="rol" class="form-control" v-model="newRol">
              <option value="0">Seleccione el rol del usuario</option>
              <option v-for="role, key in roles" v-bind:value="role.id">{{role.name}}
              </option>
            </select>
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="cbestado" class="col-sm-2 control-label">Estado:*</label>
          <div class="col-sm-4">
            <select class="form-control" id="cbestado" name="cbestado" v-model="newActivo">
              <option value="1">Activado</option>
              <option value="0">Desactivado</option>
            </select>
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




<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read', Model::class)): ?>
<div class="box box-primary" style="border: 1px solid #3c8dbc;">
  <div class="box-header" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
    <h3 class="box-title">Listado de Docentes</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body table-responsive">
    <table class="table table-hover table-bordered table-dark table-condensed table-striped">
      <tbody>
        <tr>
          <th style="border:1px solid #ddd;padding: 5px; width: 5%;">#</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 5%;">dni</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 20%;">Nombres y apellidos</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Foto</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 15%;">Usuario</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 15%;">Email</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Rol</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 5%;">Estado</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Gestión</th>
        </tr>
        <tr v-for="user, key in users">
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">{{key+pagination.from}}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">{{ user.dni }}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">{{ user.nombres }} {{ user.apellidos }}
          </td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px; text-align: center;vertical-align: middle;">
            <img :src="getImg(user)" alt="" style="width: 60px;height: 30px">
          </td>
          </td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">{{ user.name }}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">{{ user.email }}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">{{user.roles}}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px; vertical-align: middle;">
            <center>
              <span class="label label-success" v-if="user.activo=='1'">Activo</span>
              <span class="label label-warning" v-if="user.activo=='0'">Inactivo</span>
            </center>
          </td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">
            <center>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', Model::class)): ?>
              <a href="#" v-if="user.activo=='1'" class="btn bg-navy btn-sm" v-on:click.prevent="bajadocente(user)"
                data-placement="top" data-toggle="tooltip" title="Desactivar user"><i
                  class="fa fa-arrow-circle-down"></i></a>

              <a href="#" v-if="user.activo=='0'" class="btn btn-success btn-sm" v-on:click.prevent="altadocente(user)"
                data-placement="top" data-toggle="tooltip" title="Activar user"><i class="fa fa-check-circle"></i></a>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', Model::class)): ?>
              <a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editbanner(user,roles)"
                data-placement="top" data-toggle="tooltip" title="Editar user"><i class="fa fa-edit"></i></a>
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

<form method="post" v-on:submit.prevent="updateBanner(fillUser.id,fillPersona.id)">
  <?php echo csrf_field(); ?>
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
                    <label for="dni" class="col-sm-2 control-label">DNI:*</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="dni" name="dni" placeholder="DNI del usuario"
                        maxlength="200" autofocus v-model="fillPersona.dni">
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group" style="padding-top: 15px;">
                    <label for="txttituloE" class="col-sm-2 control-label">Nombres:*</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="nombresE" name="nombresE"
                        placeholder="Nombres del user" maxlength="200" autofocus v-model="fillPersona.nombres">
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group" style="padding-top: 15px;">
                    <label for="apellidos" class="col-sm-2 control-label">Apellidos:*</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="apellidos" name="apellidos"
                        placeholder="Apellidos del usuario" maxlength="200" autofocus v-model="fillPersona.apellidos">
                    </div>
                  </div>
                </div>

                <div class="col-md-12" style="padding-top: 15px;">
                  <div class="form-group">
                    <label for="genero" class="col-sm-2 control-label">Genero:*</label>
                    <div class="col-sm-4">
                      <select class="form-control" id="genero" name="genero" v-model="fillPersona.genero">
                        <option value="1">Masculino</option>
                        <option value="0">Femenino</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group" style="padding-top: 15px;">
                    <label for="login" class="col-sm-2 control-label">Login:*</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="login" name="login" placeholder="login del usuario"
                        maxlength="500" v-model="fillUser.name" autocomplete="off">
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group" style="padding-top: 15px;">
                    <label for="email" class="col-sm-2 control-label">Email:*</label>
                    <div class="col-sm-4">
                      <input type="email" class="form-control" id="email" name="email" placeholder="email del usuario"
                        maxlength="500" v-model="fillUser.email" autocomplete="off">
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group" style="padding-top: 15px;">
                    <label for="password" class="col-sm-2 control-label">Password:*</label>
                    <div class="col-sm-4">
                      <input type="password" class="form-control" id="password" name="password"
                        placeholder="password del usuario" maxlength="500" v-model="fillUser.password"
                        autocomplete="off">
                    </div>
                  </div>
                </div>

                <div class="col-md-12" style="padding-top: 15px;">
                  <div class="form-group">
                    <label for="rol" class="col-sm-2 control-label">Rol del Usuario:*</label>
                    <div class="col-sm-4">
                      <select name="rol" id="rol" class="form-control" v-model="fillRol.id">
                        <option value="0">Seleccione el rol del usuario</option>
                        <option v-for="role, key in roles" v-bind:value="role.id">{{role.name}}
                        </option>
                      </select>
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
</form><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/usuario/principal.blade.php ENDPATH**/ ?>