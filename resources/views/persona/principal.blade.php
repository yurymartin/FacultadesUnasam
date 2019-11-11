<div class="box box-primary panel-group">
        <div class="box-header with-border" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
          <h3 class="box-title">Gestión de Personas</h3>
          <a style="float: right;" type="button" class="btn btn-default" href="{{URL::to('home')}}"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</a>
        </div>
      
      <div class="box-body" style="border: 1px solid #3c8dbc;">
          <div class="form-group form-primary">
            <button type="button" class="btn btn-primary" id="btnCrear" @click.prevent="nuevo()"><i class="fa fa-plus-square-o" aria-hidden="true" ></i> Nueva Persona</button>
          </div>
      
      
      
          {{--  
            <div class="box-footer">
              <button type="button" class="btn btn-primary" onclick="enviarMSj();" id="btnEnviarMsj"><i class="fa fa-envelope-o" aria-hidden="true" ></i> Enviar Mensaje</button>
              <div id="divCarga0" style="display: inline-block;"><div id="dcarga0" style="display: none;"><img src="{{ asset('/img/ajax-loader.gif')}}"/></div></div>
            </div>
            --}}
      
          </div>
      
        </div>
      
        <div class="box box-success" v-if="divNuevo" style="border: 1px solid #00a65a;">
          <div class="box-header with-border" style="border: 1px solid #00a65a;background-color: #00a65a; color: white;">
            <h3 class="box-title" id="tituloAgregar">Nueva Persona</h3>
          </div>
      
          <form v-on:submit.prevent="create">
           <div class="box-body">


              <div class="col-md-12">
                  <div class="form-group">
                    <label for="cbstipopersona" class="col-sm-2 control-label">Tipo de Persona:*</label>
          
                    <div class="col-sm-8">
  
                      <select name="cbstipopersona" id="cbstipopersona" class="form-control" v-model="tipopersona_id" @change="seltipo">
  
                          <option disabled value="0">Seleccione un Tipo de Persona</option>
                      <option v-for="tipoper, key in tipopersonas" v-bind:value="tipoper.id">@{{tipoper.tipo}}</option>
                      </select>
                    </div>
                  </div>
                </div>


      
            <div class="col-md-12" style="padding-top: 15px;" v-if="tipopersona_id>0">
      
              <div class="form-group">
                <label for="txtnom" class="col-sm-2 control-label">Nombres:*</label>
      
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="txtnom" name="txtnom" placeholder="Apellidos y Nombres" maxlength="1000" autofocus v-model="nombre" >
                </div>
              </div>
            </div>


            <div class="col-md-12" style="padding-top: 15px;" v-if="tipopersona_id>0">
      
                <div class="form-group">
                  <label for="txtdni" class="col-sm-2 control-label">DNI:*</label>
        
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="txtdni" name="txtdni" placeholder="DNI-RUC" maxlength="20"  v-model="dni_ruc" onkeypress="return soloNumeros(event);">
                  </div>
                </div>
              </div>

              <div class="col-md-12" style="padding-top: 15px;" v-if="tipopersona_id==3">
                  <div class="form-group">
                    <label for="cbsescuela" class="col-sm-2 control-label">Escuela Profesional:*</label>
          
                    <div class="col-sm-8">
  
                      <select name="cbsescuela" id="cbsescuela" class="form-control">
  
                          <option disabled value="0">Seleccione su Escuela Profesional</option>
                      <option v-for="escuela, key in escuelas" v-bind:value="escuela.id">@{{escuela.nombre}}</option>
                      </select>
                    </div>
                  </div>
                </div>

              <div class="col-md-12" style="padding-top: 15px;" v-if="tipopersona_id==3">
      
                  <div class="form-group">
                    <label for="txtcod" class="col-sm-2 control-label">Código:*</label>
          
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="txtcod" name="txtcod" placeholder="Código" maxlength="45"  v-model="codigo_alumno" >
                    </div>
                  </div>
                </div>


              <div class="col-md-12" style="padding-top: 15px;" v-if="tipopersona_id>0">
      
                  <div class="form-group">
                    <label for="txtdir" class="col-sm-2 control-label">Dirección:*</label>
          
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="txtdir" name="txtdir" placeholder="Av. Jr. Psje." maxlength="2000"  v-model="direccion" >
                    </div>
                  </div>
                </div>


           
      
      
      
            <div class="col-md-12" style="padding-top: 15px;" v-if="tipopersona_id>0">
              <div class="form-group">
                <label for="cbuestado" class="col-sm-2 control-label">Estado:*</label>
                <div class="col-sm-4">
                  <select class="form-control" id="cbuestado" name="cbuestado" v-model="activo">
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
      
      
      
      
      <div class="box box-primary" style="border: 1px solid #3c8dbc;">
        <div class="box-header" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
          <h3 class="box-title">Listado de Personas</h3>
      
          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 300px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="Buscar" v-model="buscar" @keyup.enter="buscarBtn()">
      
              <div class="input-group-btn">
                <button type="submit" class="btn btn-default" @click.prevent="buscarBtn()"><i class="fa fa-search"></i></button>
              </div>
      
      
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table class="table table-hover table-bordered table-dark table-condensed table-striped" >
            <tbody><tr>
              <th style="border:1px solid #ddd;padding: 5px; width: 5%;">#</th>
              <th style="border:1px solid #ddd;padding: 5px; width: 24%;">Apellidos y Nombres</th>
              <th style="border:1px solid #ddd;padding: 5px; width: 8%;">DNI / RUC</th>
              <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Tipo</th>
              <th style="border:1px solid #ddd;padding: 5px; width: 25%;">Escuela Profesional</th>
              <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Código Alumno</th>
              <th style="border:1px solid #ddd;padding: 5px; width: 8%;">Estado</th>
              <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Gestión</th>
            </tr>
            <tr v-for="persona, key in personas">
              <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">@{{key+pagination.from}}</td>
              <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">@{{ persona.nombre }}</td>
              <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">@{{ persona.dni_ruc }}</td>
              <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">@{{ persona.tipo }}</td>
              <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">@{{ persona.escuela }}</td>
              <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">@{{ persona.codigo_alumno }}</td>
              <td style="border:1px solid #ddd;font-size: 14px; padding: 5px; vertical-align: middle;">
                  <center>
               <span class="label label-success" v-if="persona.activo=='1'">Activo</span>
               <span class="label label-warning" v-if="persona.activo=='0'">Inactivo</span>
              </center>
             </td>
             <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">
      <center>
               <a href="#" v-if="persona.activo=='1'" class="btn bg-navy btn-sm" v-on:click.prevent="bajapersona(persona)" data-placement="top" data-toggle="tooltip" title="Desactivar Persona"><i class="fa fa-arrow-circle-down"></i></a>
      
               <a href="#" v-if="persona.activo=='0'" class="btn btn-success btn-sm" v-on:click.prevent="altapersona(persona)" data-placement="top" data-toggle="tooltip" title="Activar Persona"><i class="fa fa-check-circle"></i></a>
      
      
               <a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editpersona(persona)" data-placement="top" data-toggle="tooltip" title="Editar Persona"><i class="fa fa-edit"></i></a>
               <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="borrarpersona(persona)" data-placement="top" data-toggle="tooltip" title="Borrar Persona"><i class="fa fa-trash"></i></a>
      </center>
             </td>
           </tr>
      
         </tbody></table>
      
       </div>
       <!-- /.box-body -->
       <div style="padding: 15px;">
         <div><h5>Registros por Página: @{{ pagination.per_page }}</h5></div>
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
      <div><h5>Registros Totales: @{{ pagination.total }}</h5></div>
      </div>
      </div>
      
      <form method="post" v-on:submit.prevent="updatePersona(fillPersona.id)">
        <div class="modal bs-example-modal-lg" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
          <div class="modal-dialog modal-lg" role="document" id="modaltamanio">
            <div class="modal-content" style="border: 1px solid #3c8dbc;">
              <div class="modal-header" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="font-size: 35px;">&times;</span></button>
                <h4 class="modal-title" id="desEditarTitulo" style="font-weight: bold;text-decoration: underline;">EDITAR Persona</h4>
      
              </div> 
              <div class="modal-body">
                <input type="hidden" id="idServicio" value="0">
      
                <div class="row">
      
                  <div class="box" id="o" style="border:0px; box-shadow:none;" >
                    <div class="box-header with-border">
                      <h3 class="box-title" id="boxTitulo">Persona:</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
      
                    <div class="box-body">
      
                      

                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="cbstipopersonaE" class="col-sm-2 control-label">Tipo de Persona:*</label>
                    
                              <div class="col-sm-8">
            
                                <select name="cbstipopersonaE" id="cbstipopersonaE" class="form-control" v-model="fillPersona.tipopersona_id" @change="seltipoE">
            
                                    <option disabled value="0">Seleccione un Tipo de Persona</option>
                                <option v-for="tipoper, key in tipopersonas" v-bind:value="tipoper.id">@{{tipoper.tipo}}</option>
                                </select>
                              </div>
                            </div>
                          </div>
          
          
                
                      <div class="col-md-12" style="padding-top: 15px;" v-if="fillPersona.tipopersona_id>0">
                
                        <div class="form-group">
                          <label for="txtnomE" class="col-sm-2 control-label">Nombres:*</label>
                
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="txtnomE" name="txtnomE" placeholder="Apellidos y Nombres" maxlength="1000" autofocus v-model="fillPersona.nombre" >
                          </div>
                        </div>
                      </div>
          
          
                      <div class="col-md-12" style="padding-top: 15px;" v-if="fillPersona.tipopersona_id>0">
                
                          <div class="form-group">
                            <label for="txtdniE" class="col-sm-2 control-label">DNI-RUC:*</label>
                  
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="txtdniE" name="txtdniE" placeholder="DNI-RUC" maxlength="20"  v-model="fillPersona.dni_ruc" onkeypress="return soloNumeros(event);">
                            </div>
                          </div>
                        </div>
          
                        <div class="col-md-12" style="padding-top: 15px;" v-if="fillPersona.tipopersona_id==3">
                            <div class="form-group">
                              <label for="cbsescuelaE" class="col-sm-2 control-label">Escuela Profesional:*</label>
                    
                              <div class="col-sm-8">
            
                                <select name="cbsescuelaE" id="cbsescuelaE" class="form-control">
            
                                    <option disabled value="0">Seleccione su Escuela Profesional</option>
                                <option v-for="escuela, key in escuelas" v-bind:value="escuela.id">@{{escuela.nombre}}</option>
                                </select>
                              </div>
                            </div>
                          </div>
          
                        <div class="col-md-12" style="padding-top: 15px;" v-if="fillPersona.tipopersona_id==3">
                
                            <div class="form-group">
                              <label for="txtcodE" class="col-sm-2 control-label">Código:*</label>
                    
                              <div class="col-sm-8">
                                <input type="text" class="form-control" id="txtcodE" name="txtcodE" placeholder="Código" maxlength="45"  v-model="fillPersona.codigo_alumno" >
                              </div>
                            </div>
                          </div>
          
          
                        <div class="col-md-12" style="padding-top: 15px;" v-if="fillPersona.tipopersona_id>0">
                
                            <div class="form-group">
                              <label for="txtdirE" class="col-sm-2 control-label">Dirección:*</label>
                    
                              <div class="col-sm-8">
                                <input type="text" class="form-control" id="txtdirE" name="txtdirE" placeholder="Av. Jr. Psje." maxlength="2000"  v-model="fillPersona.direccion" >
                              </div>
                            </div>
                          </div>
          
          
                     
                
                
                
                      <div class="col-md-12" style="padding-top: 15px;" v-if="fillPersona.tipopersona_id>0">
                        <div class="form-group">
                          <label for="cbuestadoE" class="col-sm-2 control-label">Estado:*</label>
                          <div class="col-sm-4">
                            <select class="form-control" id="cbuestadoE" name="cbuestadoE" v-model="fillPersona.activo">
                              <option value="1">Activado</option>
                              <option value="0">Desactivado</option>
                            </select>
                          </div>
                        </div>
                      </div>
      
      
      
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" id="btnSaveE"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
      
                  <button type="button" id="btnCancelE" class="btn btn-default" data-dismiss="modal"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar</button>
      
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
      