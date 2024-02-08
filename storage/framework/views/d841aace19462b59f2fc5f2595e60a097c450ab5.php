<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "soesystem";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $marca = $_POST['marca'];
    $tipo_lente = $_POST['tipo_lente'];
    $material = $_POST['material'];
    $tratamiento = $_POST['tratamiento'];

    // Insertar datos en la base de datos
    $sql = "INSERT INTO catalogos (marca, tipo_lente, material, tratamiento) VALUES ('$marca', '$tipo_lente', '$material', '$tratamiento')";

    if ($conn->query($sql) === TRUE) {
        echo "Datos guardados correctamente";
    } else {
        echo "Error al guardar datos: " . $conn->error;
    }
}
?>



<?php $__env->startSection('page-title'); ?>
<?php echo e(__('Email Templates')); ?>

@endsectiona

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Email Templates')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css-page'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/summernote/summernote-bs4.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('css/summernote/summernote-bs4.js')); ?>"></script> 
<script src="<?php echo e(asset('js/tinymce/tinymce.min.js')); ?>"></script>
<script>
    if ($(".pc-tinymce-2").length) {
        tinymce.init({
            selector: '.pc-tinymce-2',
            height: "400",
            content_style: 'body { font-family: "Inter", sans-serif; }'
        });
    }
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('multiple-action-button'); ?>
<!-- <div class="text-end mb-3">
    <div class="d-flex justify-content-end drp-languages">
        <ul class="list-unstyled mb-0 m-2">
            <li class="dropdown dash-h-item drp-language" style="list-style-type: none;">
                <a
                class="dash-head-link dropdown-toggle arrow-none me-0"
                data-bs-toggle="dropdown"
                href="#"
                role="button"
                aria-haspopup="false"
                aria-expanded="false"
                >
                <span class="drp-text hide-mob text-primary"><?php echo e(Str::upper($currEmailTempLang->lang )); ?></span>
                <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                </a>
                <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <a href="<?php echo e(route('manage.email.language', [$emailTemplate->id, $lang])); ?>"
                    class="dropdown-item <?php echo e($currEmailTempLang->lang == $lang ? 'text-primary' : ''); ?>"><?php echo e(Str::upper($lang)); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
                </div>
            </li>
        </ul>    
        <ul class="list-unstyled mb-0 m-2">
            <li class="dropdown dash-h-item drp-language" style="list-style-type: none;">
                <a class="dash-head-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span class="drp-text hide-mob text-primary"><?php echo e(__('Template: ')); ?> <?php echo e($emailTemplate->name); ?></span>
                <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                </a>
                <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                    <?php $__currentLoopData = $EmailTemplates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $EmailTemplate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('manage.email.language', [$EmailTemplate->id,(Request::segment(3)?Request::segment(3):\Auth::user()->lang)])); ?>"
                    class="dropdown-item <?php echo e($emailTemplate->name == $EmailTemplate->name ? 'text-primary' : ''); ?>"><?php echo e($EmailTemplate->name); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
                </div>
            </li>
        </ul>
    </div>
</div> -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

   

    <div class="row">
        
        <div class="col-12">
            <div class="row">
                
            </div>
            <div class="card">
                <div class="card-body">
    
                    <div class="language-wrap">
                        <div class="row"> 
                            <h6><?php echo e(__('Place Holders')); ?></h6>
                            <div class="col-lg-12 col-md-9 col-sm-12 language-form-wrap">


                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                              
                            
                            
                            <div class="row">
                                    <div class="form-group col-6">
                                    <label for="marca">Marca:</label>


        <select class="form-select" name="marca" required>
            <option value="SETO">SETO</option>
            <option value="SEIZZ">SEIZZ</option>
        </select>
        <br>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="from" class="form-control-label text-dark">Tipo de lente </label>
                                        <input class="form-control font-style" required="required" name="tipo_lente" type="text" value="" id="tipolente">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="from" class="form-control-label text-dark">Material </label>
                                        <input class="form-control font-style" required="required" name="material" type="text" value="" id="from">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="from" class="form-control-label text-dark">Tratamiento </label>
                                        <input class="form-control font-style" required="required" name="tratamiento" type="text" value="" id="from">
                                    </div>
                                
                                   
                                    <div class="col-md-12 text-end">
                                        <button type="submit" class="btn btn-print-invoice  btn-primary">Guardar</button>

<!--                                         <input type="submit" value="<?php echo e(__('Save')); ?>" >
 -->                                    </div>
                               
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yadinrodriguez/Sites/soesystem/resources/views/email_templates/show.blade.php ENDPATH**/ ?>