<?php $__env->startSection('contenido'); ?>

<div class="container cont" id="maincontenido">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12"><br>
                <h1 class="tituloe">Noticias<br>
                    <hr class="cab">
                </h1>
            </div>
        </div>
        <br><br>
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="col-md-12 contf">
                    <div class="col-md-12 ">

                        <?php
                        function getPalabras($pala){
                            $variable = explode(" ", $pala); //pasar a un array
                            $ret = "";
                            if (count($variable) > 25) {
                                for ($i = 0; $i < 25; $i++) {
                                    $ret .= $variable[$i];
                                    $ret .= " ";
                                }
                                $ret .= "...";
                            } else {
                                $ret = $pala;
                            }
                            return $ret;
                        }
                    ?>
                        <?php $__currentLoopData = $noticias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noti): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <img class="img-responsive" src="<?php echo e(asset('img/noticias/'. $noti->ruta )); ?>" alt="">
                            </div>
                            <a onclick="verNoticia('<?php echo e($noti->id); ?>')" class="enlaceNoticia" style="color: #337ab7;" >
                                <div class="col-md-8" style="cursor: pointer">
                                    <h5 style="font-family: 'Raleway', sans-serif;"><strong>Fecha:
                                        </strong><?php echo e($noti->fechaNoticia); ?></h5>
                                    <h4 style="font-family: 'Raleway', sans-serif;"><?php echo e($noti->tituloNoticia); ?></h4>
                                    <p></p>
                                    <p style="text-align:justify"><span style="background-color:white"><span
                                                style="font-size:11.5pt"><span style="font-family:" Bookman Old
                                                    Style",serif"><span style="color:#333333"><?php echo
                                                        getPalabras($noti->descrNoticia);
                                                        ?></span></span></span></span></p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 espacio"></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <span> <?php echo $noticias->render(); ?></span>
                    </div>
                </div>
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-12 espacio"></div>


   
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("web.layout.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Roger\Aplicaciones\webUNASAM2019\resources\views/web/Noticias.blade.php ENDPATH**/ ?>