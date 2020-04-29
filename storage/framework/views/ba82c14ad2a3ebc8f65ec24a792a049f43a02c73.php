<div class="box box-primary panel-group">
  <div class="box-header with-border" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
    <h3 class="box-title">Gestión de Redes Sociales de las escuelas</h3>
    <a style="float: right;" type="button" class="btn btn-default" href="<?php echo e(URL::to('home')); ?>"><i class="fa fa-reply-all"
        aria-hidden="true"></i>
      Volver</a>
  </div>
  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create redes sociales escuelas', Model::class)): ?>
  <div class="box-body" style="border: 1px solid #3c8dbc;">
    <div class="form-group form-primary">
      <button type="button" class="btn btn-primary" id="btnCrear" @click.prevent="nuevo()"><i
          class="fa fa-plus-square-o" aria-hidden="true"></i>Nueva Redes Sociales</button>
    </div>
  </div>
  <?php endif; ?>
</div>

<div class="box box-success" v-if="divNuevo" style="border: 1px solid #00a65a;">
  <div class="box-header with-border" style="border: 1px solid #00a65a;background-color: #00a65a; color: white;">
    <h3 class="box-title" id="tituloAgregar">Nueva Redes Sociales</h3>
  </div>
  <form v-on:submit.prevent="create">
    <div class="box-body">

      <div class="col-md-12">
        <div class="form-group">
          <label for="cbescuela" class="col-sm-2 control-label">Escuela:*</label>
          <div class="col-sm-8">
            <select name="cbescuela" id="cbescuela" class="form-control" v-model="escuela_id">
              <option disabled value="0">Seleccione una de las Escuelas</option>
              <option v-for="escuela, key in escuelas" v-bind:value="escuela.id">
                {{escuela.nombre}}
              </option>
            </select>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group" style="padding-top: 15px;">
          <label for="facebook" class="col-sm-2 control-label">URL Facebook:</label>
          <div class="col-sm-8">
            <textarea class="form-control" name="facebook" id="facebook" cols="30" rows="3" v-model="newFacebook"
              placeholder="link o url de la pagina de facebook"></textarea>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group" style="padding-top: 15px;">
          <label for="google" class="col-sm-2 control-label">URL Google:</label>
          <div class="col-sm-8">
            <textarea class="form-control" name="google" id="google" cols="30" rows="3" v-model="newGoogle"
              placeholder="link o url de la pagina de google"></textarea>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group" style="padding-top: 15px;">
          <label for="youtube" class="col-sm-2 control-label">URL Youtube:</label>
          <div class="col-sm-8">
            <textarea class="form-control" name="youtube" id="youtube" cols="30" rows="3" v-model="newYoutube"
              placeholder="link o url de la pagina de youtube"></textarea>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group" style="padding-top: 15px;">
          <label for="twitter" class="col-sm-2 control-label">URL Twitter:</label>
          <div class="col-sm-8">
            <textarea class="form-control" name="twitter" id="twitter" cols="30" rows="3" v-model="newTwitter"
              placeholder="link o url de la pagina de twitter"></textarea>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group" style="padding-top: 15px;">
          <label for="instagram" class="col-sm-2 control-label">URL Instagram:</label>
          <div class="col-sm-8">
            <textarea class="form-control" name="instagram" id="instagram" cols="30" rows="3" v-model="newInstagram"
              placeholder="link o url de la pagina de instagram"></textarea>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group" style="padding-top: 15px;">
          <label for="linkedln" class="col-sm-2 control-label">URL Linkedln:</label>
          <div class="col-sm-8">
            <textarea class="form-control" name="linkedln" id="linkedln" cols="30" rows="3" v-model="newLinkedln"
              placeholder="link o url de la pagina de linkedln"></textarea>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group" style="padding-top: 15px;">
          <label for="pinterest" class="col-sm-2 control-label">URL Pinterest:</label>
          <div class="col-sm-8">
            <textarea class="form-control" name="pinterest" id="pinterest" cols="30" rows="3" v-model="newPinterest"
              placeholder="link o url de la pagina de pinterest"></textarea>
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="cbuestado" class="col-sm-2 control-label">Estado:*</label>
          <div class="col-sm-4">
            <select class="form-control" id="cbuestado" name="cbuestado" v-model="newEstado">
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




<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read redes sociales escuelas')): ?>
<div class="box box-primary" style="border: 1px solid #3c8dbc;">
  <div class="box-header" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
    <h3 class="box-title">Listado de Redes Sociales de las escuelas</h3>

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
    <table class="table table-hover table-bordered table-dark table-condensed table-striped"
      style="border-collapse: collapse">
      <tbody>
        <tr>
          <th style="border:1px solid #ddd;padding: 5px; width: 1%;">#</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 14%;">Escuela</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Facebook</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Google</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Youtube</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Twitter</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Instagram</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Linkedln</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Pinterest</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 5%;">Estado</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Gestión</th>
        </tr>
        <tr v-for="redes, key in redesfacultades" style="text-align: center;vertical-align: middle">
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">{{key+pagination.from}}</td>

          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">{{ redes.nombre }}</td>

          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;vertical-align: middle;"><a href=""
              v-on:click.prevent="url_facebook(redes)" target="__blank" class="btn btn-primary btn-sm btn-block"
              v-if="redes.facebook != 'null'"><i class="fa fa-facebook-square"></i></a></td>

          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;vertical-align: middle;"><a href="#"
              v-on:click.prevent="url_google(redes)" target="__blank" class="btn btn-warning btn-sm btn-sm btn-block"
              v-if="redes.google != 'null'"><i class="fa fa-google-plus"></i></a></td>

          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;vertical-align: middle;"><a href="#"
              v-on:click.prevent="url_youtube(redes)" target="__blank" class="btn btn-danger btn-sm btn-sm btn-block"
              v-if="redes.youtube != 'null'"><i class="fa fa-youtube-play"></i></a></td>

          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;vertical-align: middle;"><a href="#"
              v-on:click.prevent="url_twitter(redes)" target="__blank" class="btn btn-info btn-sm btn-sm btn-block"
              v-if="redes.twitter != 'null'"><i class="fa fa-twitter"></i></a></td>

          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;vertical-align: middle;"><a href="#"
              v-on:click.prevent="url_instagram(redes)" target="__blank" class="btn bg-maroon btn-sm btn-sm btn-block"
              v-if="redes.instagram != 'null'"><i class="fa fa-instagram"></i></a></td>

          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;vertical-align: middle;"><a href="#"
              v-on:click.prevent="url_linkedln(redes)" target="__blank" class="btn btn-primary btn-sm btn-sm btn-block"
              v-if="redes.linkedln != 'null'"><i class="fa fa-linkedin"></i></a></td>

          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;vertical-align: middle;"><a href="#"
              v-on:click.prevent="url_pinterest(redes)" target="__blank" class="btn btn-danger btn-sm btn-sm btn-block"
              v-if="redes.pinterest != 'null'"><i class="fa fa-pinterest-square"></i></a></td>

          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px; vertical-align: middle;">
            <center>
              <span class="label label-success" v-if="redes.activo=='1'">Activo</span>
              <span class="label label-warning" v-if="redes.activo=='0'">Inactivo</span>
            </center>
          </td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;vertical-align: middle;">
            <center>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update redes sociales escuelas')): ?>
              <a href="#" v-if="redes.activo=='1'" class="btn bg-navy btn-sm" v-on:click.prevent="bajafacultad(redes)"
                data-placement="top" data-toggle="tooltip" title="Desactivar redes"><i
                  class="fa fa-arrow-circle-down"></i></a>
              <a href="#" v-if="redes.activo=='0'" class="btn btn-success btn-sm"
                v-on:click.prevent="altafacultad(redes)" data-placement="top" data-toggle="tooltip"
                title="Activar redes"><i class="fa fa-check-circle"></i></a>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update redes sociales escuelas')): ?>
              <a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editfacultad(redes)" data-placement="top"
                data-toggle="tooltip" title="Editar redes"><i class="fa fa-edit"></i></a>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete redes sociales escuelas')): ?>
              <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="borrarfacultad(redes)" data-placement="top"
                data-toggle="tooltip" title="Borrar redes"><i class="fa fa-trash"></i></a>
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

<form method="post" v-on:submit.prevent="updateFacultad(fillredesfacultades.id)">
  <div class="modal bs-example-modal-lg" id="modalEditar" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document" id="modaltamanio">
      <div class="modal-content" style="border: 1px solid #3c8dbc;">
        <div class="modal-header" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"
              style="font-size: 35px;">&times;</span></button>
          <h4 class="modal-title" id="desEditarTitulo" style="font-weight: bold;text-decoration: underline;">EDITAR
            LA FACULTAD</h4>

        </div>
        <div class="modal-body">
          <div class="row">
            <div class="box" id="o" style="border:0px; box-shadow:none;">
              <!-- /.box-header -->
              <!-- form start -->
              <div class="box-body">

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="cbescuela" class="col-sm-2 control-label">Escuela:*</label>
                    <div class="col-sm-8">
                      <select name="cbescuela" id="cbescuela" class="form-control"
                        v-model="fillredesfacultades.escuela_id">
                        <option disabled value="0">Seleccione una Escula</option>
                        <option v-for="escuela, key in escuelas" v-bind:value="escuela.id">
                          {{escuela.nombre}}
                        </option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-md-12" style="padding-top: 15px;">
                  <div class="form-group">
                    <label for="facebook" class="col-sm-2 control-label">URL Facebook:</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="facebook" id="facebook" cols="30" rows="3"
                        v-model="fillredesfacultades.facebook"
                        placeholder="link o url de la pagina de facebook"></textarea>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group" style="padding-top: 15px;">
                    <label for="google" class="col-sm-2 control-label">URL Google:</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="google" id="google" cols="30" rows="3"
                        v-model="fillredesfacultades.google" placeholder="link o url de la pagina de google"></textarea>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group" style="padding-top: 15px;">
                    <label for="youtube" class="col-sm-2 control-label">URL Youtube:</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="youtube" id="youtube" cols="30" rows="3"
                        v-model="fillredesfacultades.youtube"
                        placeholder="link o url de la pagina de youtube"></textarea>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group" style="padding-top: 15px;">
                    <label for="twitter" class="col-sm-2 control-label">URL Twitter:</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="twitter" id="twitter" cols="30" rows="3"
                        v-model="fillredesfacultades.twitter"
                        placeholder="link o url de la pagina de twitter"></textarea>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group" style="padding-top: 15px;">
                    <label for="instagram" class="col-sm-2 control-label">URL Instagram:</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="instagram" id="instagram" cols="30" rows="3"
                        v-model="fillredesfacultades.instagram"
                        placeholder="link o url de la pagina de instagram"></textarea>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group" style="padding-top: 15px;">
                    <label for="linkedln" class="col-sm-2 control-label">URL Linkedln:</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="linkedln" id="linkedln" cols="30" rows="3"
                        v-model="fillredesfacultades.linkedln"
                        placeholder="link o url de la pagina de linkedln"></textarea>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group" style="padding-top: 15px;">
                    <label for="pinterest" class="col-sm-2 control-label">URL Pinterest:</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="pinterest" id="pinterest" cols="30" rows="3"
                        v-model="fillredesfacultades.pinterest"
                        placeholder="link o url de la pagina de pinterest"></textarea>
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
</form><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/redesescuelas/principal.blade.php ENDPATH**/ ?>