<div class="box box-primary panel-group">
  <div class="box-header with-border" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
    <h3 class="box-title">Gestión de Descripcion de Escuelas Profesionales</h3>
    <a style="float: right;" type="button" class="btn btn-default" href="<?php echo e(URL::to('home')); ?>"><i class="fa fa-reply-all"
        aria-hidden="true"></i>
      Volver</a>
  </div>

  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create descripcion escuelas', Model::class)): ?>
  <div class="box-body" style="border: 1px solid #3c8dbc;">
    <div class="form-group form-primary">
      <button type="button" class="btn btn-primary" id="btnCrear" @click.prevent="nuevo()"><i
          class="fa fa-plus-square-o" aria-hidden="true"></i>Nueva Descripcion de las Escuelas Profesionales</button>
    </div>

  </div>
  <?php endif; ?>

</div>

<div class="box box-success" v-if="divNuevo" style="border: 1px solid #00a65a;">
  <div class="box-header with-border" style="border: 1px solid #00a65a;background-color: #00a65a; color: white;">
    <h3 class="box-title" id="tituloAgregar">Nueva Descripciòn de La Escuelas Profesionales</h3>
  </div>

  <form v-on:submit.prevent="create" name="descripcionEscuela">
    <div class="box-body">

      <div class="col-md-12" style="padding-top: 10px;">
        <div class="form-group">
          <label for="cbEscuelas" class="col-sm-2 control-label">Escuela Profesional:*</label>
          <div class="col-sm-8">
            <select name="cbEscuelas" id="cbEscuelas" class="form-control" v-model="escuela_id">
              <option value="0">Seleccione una Escuela Profesional</option>
              <option v-for="escuela, key in escuelas" v-bind:value="escuela.id">{{escuela.nombre}}
              </option>
            </select>
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 10px;">
        <div class="form-group">
          <label for="descripcion" class="col-sm-2 control-label">Descripcion:*</label>
          <div class="col-sm-8">
            <textarea name="descripcion" id="descripcion" cols="80" rows="5" v-model="newDescripcion"
              placeholder="Descripcion de la Escuela profesional" class="form-control"></textarea>
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 10px;">
        <div class="form-group">
          <label for="titulo" class="col-sm-2 control-label">Titulo Profesional:*</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="titulo" name="titulo"
              placeholder="Titulo profesional que obtinen los estudiantes" maxlength="200" autofocus
              v-model="newTitulo">
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 10px;">
        <div class="form-group">
          <label for="gradoacade" class="col-sm-2 control-label">Grado Profesional:*</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="gradoacade" name="gradoacade"
              placeholder="Grado Profesional que se obtiene al terminar la carrera" maxlength="200" autofocus
              v-model="newGradoAcade">
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 10px;">
        <div class="form-group">
          <label for="duracion" class="col-sm-2 control-label">Duracion:*</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="duracion" name="duracion"
              placeholder="Duracion de la Carrera Profesional" maxlength="200" autofocus v-model="newDuracion">
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 10px;">
        <div class="form-group">
          <label for="vs" class="col-sm-2 control-label">Mision:*</label>
          <div class="col-sm-8">
            <textarea name="mision" id="mision" cols="80" rows="5" v-model="newMision"
              placeholder="mision de la escuela Profesional" class="form-control"></textarea>
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 10px;">
        <div class="form-group">
          <label for="vision" class="col-sm-2 control-label">Vision:*</label>
          <div class="col-sm-8">
            <textarea name="vision" id="vision" cols="80" rows="5" v-model="newVision"
              placeholder="vision de la escuela Profesional" class="form-control"></textarea>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group" style="padding-top: 10px;">
          <label for="historia" class="col-sm-2 control-label">Historia:*</label>
          <div class="col-sm-8">
            <textarea name="historia" id="historia" cols="80" rows="5" v-model="newHistoria"
              placeholder="historia de la escuela Profesional" class="form-control"></textarea>
          </div>
        </div>
      </div>


      <div class="col-md-12" style="padding-top: 10px;">
        <div class="form-group">
          <label for="archivo" class="col-sm-2 control-label">imagen:*</label>
          <div class="col-sm-8" style="padding-top: 10px;">
            <input name="archivo" type="file" id="archivo" class="archivo form-control" @change="getImage"
              accept=".png, .jpg, .jpeg, .gif, .jpe, .PNG, .JPG, .JPEG, .GIF, .JPE" />
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 10px;">
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

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read descripcion escuelas', Model::class)): ?>
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
          <th style="border:1px solid #ddd;padding: 5px; width: 1%;">#</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Descripciòn</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 9%;">Titulo</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Grado Academico</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 5%;">Duracion</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Mision</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Vision</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">historia</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Escuela Profesional</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Logo</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 5%;">Estado</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Gestión</th>
        </tr>
        <tr v-for="descripcionescuela, key in descripcionescuelas">
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;text-align: justify">{{key+pagination.from}}
          </td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;text-align: justify">
            {{ descripcionescuela.descripcion }}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">{{ descripcionescuela.tituloprofesional}}
          </td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">{{ descripcionescuela.gradoacade }}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">{{ descripcionescuela.duracion }}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;text-align: justify">
            {{ descripcionescuela.mision }}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;text-align: justify">
            {{ descripcionescuela.vision }}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;text-align: justify">
            {{ descripcionescuela.historia }}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">{{ descripcionescuela.nombre }}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px; text-align: center;vertical-align: middle;">
            <img :src="getImg(descripcionescuela)" alt="" class="img img-responsive" style="width: 120px;height: 100px">
          </td>
          </td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px; vertical-align: middle;">
            <center>
              <span class="label label-success" v-if="descripcionescuela.activo=='1'">Activo</span>
              <span class="label label-warning" v-if="descripcionescuela.activo=='0'">Inactivo</span>
            </center>
          </td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">
            <center>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update descripcion escuelas', Model::class)): ?>
              <a href="#" v-if="descripcionescuela.activo=='1'" class="btn bg-navy btn-sm"
                v-on:click.prevent="bajadocente(descripcionescuela)" data-placement="top" data-toggle="tooltip"
                title="Desactivar descripcion escuela"><i class="fa fa-arrow-circle-down"></i></a>

              <a href="#" v-if="descripcionescuela.activo=='0'" class="btn btn-success btn-sm"
                v-on:click.prevent="altadocente(descripcionescuela)" data-placement="top" data-toggle="tooltip"
                title="Activar descripcion escuela"><i class="fa fa-check-circle"></i></a>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update descripcion escuelas', Model::class)): ?>
              <a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editbanner(descripcionescuela)"
                data-placement="top" data-toggle="tooltip" title="Editar descripcion facultad"><i
                  class="fa fa-edit"></i></a>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete descripcion escuelas', Model::class)): ?>
              <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="borrardocente(descripcionescuela)"
                data-placement="top" data-toggle="tooltip" title="Borrar docente"><i class="fa fa-trash"></i></a>
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

<form method="post" v-on:submit.prevent="updateBanner(fillDescripcionEscuelas.id)">
  <div class="modal bs-example-modal-lg" id="modalEditar" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document" id="modaltamanio">
      <div class="modal-content" style="border: 1px solid #3c8dbc;">
        <div class="modal-header" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"
              style="font-size: 35px;">&times;</span></button>
          <h4 class="modal-title" id="desEditarTitulo" style="font-weight: bold;text-decoration: underline;">EDITAR
            LA DESCRIPCION DE LAS ESCUELAS</h4>

        </div>
        <div class="modal-body">
          <div class="row">
            <div class="box" id="o" style="border:0px; box-shadow:none;">
              <!-- /.box-header -->
              <!-- form start -->
              <div class="box-body">

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="descripcion" class="col-sm-2 control-label">Descripciòn:*</label>
                    <div class="col-sm-8">
                      <textarea name="descripcionE" id="descripcionE" cols="80" rows="5"
                        v-model="fillDescripcionEscuelas.descripcion" placeholder="descripcion"
                        class="form-control"></textarea>
                    </div>
                  </div>
                </div>

                <div class="col-md-12" style="padding-top: 10px;">
                  <div class="form-group">
                    <label for="titulo" class="col-sm-2 control-label">Titulo Profesional:*</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="titulo" name="titulo"
                        placeholder="Nombre de la categoria" maxlength="200" autofocus
                        v-model="fillDescripcionEscuelas.tituloprofesional">
                    </div>
                  </div>
                </div>

                <div class="col-md-12" style="padding-top: 10px;">
                  <div class="form-group">
                    <label for="gradoacade" class="col-sm-2 control-label">Grado Profesional:*</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="gradoacade" name="gradoacade"
                        placeholder="Nombre de la categoria" maxlength="200" autofocus
                        v-model="fillDescripcionEscuelas.gradoacade">
                    </div>
                  </div>
                </div>

                <div class="col-md-12" style="padding-top: 10px;">
                  <div class="form-group">
                    <label for="duracion" class="col-sm-2 control-label">Duracion:*</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="duracion" name="duracion"
                        placeholder="Nombre de la categoria" maxlength="200" autofocus
                        v-model="fillDescripcionEscuelas.duracion">
                    </div>
                  </div>
                </div>

                <div class="col-md-12" style="padding-top: 10px;">
                  <div class="form-group">
                    <label for="vs" class="col-sm-2 control-label">Mision:*</label>
                    <div class="col-sm-8">
                      <textarea name="mision" id="mision" cols="80" rows="5" v-model="fillDescripcionEscuelas.mision"
                        placeholder="mision de la escuela Profesional" class="form-control"></textarea>
                    </div>
                  </div>
                </div>

                <div class="col-md-12" style="padding-top: 10px;">
                  <div class="form-group">
                    <label for="vision" class="col-sm-2 control-label">Vision:*</label>
                    <div class="col-sm-8">
                      <textarea name="vision" id="vision" cols="80" rows="5" v-model="fillDescripcionEscuelas.vision"
                        placeholder="vision de la escuela Profesional" class="form-control"></textarea>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group" style="padding-top: 10px;">
                    <label for="historia" class="col-sm-2 control-label">Historia:*</label>
                    <div class="col-sm-8">
                      <textarea name="historia" id="historia" cols="80" rows="5"
                        v-model="fillDescripcionEscuelas.historia" placeholder="historia de la escuela Profesional"
                        class="form-control"></textarea>
                    </div>
                  </div>
                </div>

                <div class="col-md-12" style="padding-top: 15px;">
                  <div class="form-group">
                    <label for="archivo" class="col-sm-2 control-label">Imagen :*</label>
                    <div class="col-sm-8" style="padding-top: 10px;">
                      <input name="archivo" type="file" id="archivo" class="archivo form-control" @change="getImage"
                        accept=".png, .jpg, .jpeg, .gif, .jpe, .PNG, .JPG, .JPEG, .GIF, .JPE" />
                    </div>
                  </div>
                </div>

                <div class="col-md-12" style="padding-top: 15px;">
                  <div class="form-group">
                    <label for="cbEscuelas" class="col-sm-2 control-label">Escuela Profesional:*</label>
                    <div class="col-sm-8">
                      <select name="cbEscuelas" id="cbEscuelas" class="form-control"
                        v-model="fillDescripcionEscuelas.escuela_id">
                        <option disabled value="0">Seleccione una Escuela Profesional</option>
                        <option v-for="escuela, key in escuelas" v-bind:value="escuela.id">{{escuela.nombre}}
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
</form><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/descripcionescuelas/principal.blade.php ENDPATH**/ ?>