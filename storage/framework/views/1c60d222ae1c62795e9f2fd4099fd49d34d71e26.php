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

                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;"><?php echo e($user->iduser); ?></td>
                    <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;"><?php echo e($user->dni); ?></td>
                    <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">
                        <?php echo e($user->nombres); ?><?php echo e($user->apellidos); ?>

                    </td>
                    <td
                        style="border:1px solid #ddd;font-size: 14px; padding: 5px; text-align: center;vertical-align: middle;">
                        <img :src="getImg(user)" alt="" style="width: 60px;height: 30px">
                    </td>
                    </td>
                    <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;"><?php echo e($user->name); ?></td>
                    <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;"><?php echo e($user->email); ?></td>
                    <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;"><?php echo e($user->roles->implode('name', ', ')); ?></td>
                    <td style="border:1px solid #ddd;font-size: 14px; padding: 5px; vertical-align: middle;">
                        <center>
                            <span class="label label-success" v-if="user.activo=='1'">Activo</span>
                            <span class="label label-warning" v-if="user.activo=='0'">Inactivo</span>
                        </center>
                    </td>
                    <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">
                        <center>
                            <a href="#" v-if="user.activo=='1'" class="btn bg-navy btn-sm"
                                v-on:click.prevent="bajadocente(user)" data-placement="top" data-toggle="tooltip"
                                title="Desactivar user"><i class="fa fa-arrow-circle-down"></i></a>

                            <a href="#" v-if="user.activo=='0'" class="btn btn-success btn-sm"
                                v-on:click.prevent="altadocente(user)" data-placement="top" data-toggle="tooltip"
                                title="Activar user"><i class="fa fa-check-circle"></i></a>

                            <a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editbanner(user,roles)"
                                data-placement="top" data-toggle="tooltip" title="Editar user"><i
                                    class="fa fa-edit"></i></a>

                            <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="borrardocente(user)"
                                data-placement="top" data-toggle="tooltip" title="Borrar user"><i
                                    class="fa fa-trash"></i></a>
                        </center>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    </div><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/usuario/tabla.blade.php ENDPATH**/ ?>