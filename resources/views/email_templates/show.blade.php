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

@extends('layouts.admin')

@section('page-title')
{{__('Email Templates')}}
@endsectiona

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item">{{ __('Email Templates') }}</li>
@endsection

@push('css-page')
<link rel="stylesheet" href="{{asset('css/summernote/summernote-bs4.css')}}">
@endpush

@push('scripts')
<script src="{{asset('css/summernote/summernote-bs4.js')}}"></script> 
<script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
<script>
    if ($(".pc-tinymce-2").length) {
        tinymce.init({
            selector: '.pc-tinymce-2',
            height: "400",
            content_style: 'body { font-family: "Inter", sans-serif; }'
        });
    }
</script>
@endpush

@section('multiple-action-button')
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
                <span class="drp-text hide-mob text-primary">{{Str::upper($currEmailTempLang->lang )}}</span>
                <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                </a>
                <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                    @foreach ($languages as $lang)

                    <a href="{{ route('manage.email.language', [$emailTemplate->id, $lang]) }}"
                    class="dropdown-item {{ $currEmailTempLang->lang == $lang ? 'text-primary' : '' }}">{{ Str::upper($lang) }}</a>
                @endforeach
            
                </div>
            </li>
        </ul>    
        <ul class="list-unstyled mb-0 m-2">
            <li class="dropdown dash-h-item drp-language" style="list-style-type: none;">
                <a class="dash-head-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span class="drp-text hide-mob text-primary">{{ __('Template: ') }} {{ $emailTemplate->name }}</span>
                <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                </a>
                <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                    @foreach ($EmailTemplates as $EmailTemplate)
                    <a href="{{ route('manage.email.language', [$EmailTemplate->id,(Request::segment(3)?Request::segment(3):\Auth::user()->lang)]) }}"
                    class="dropdown-item {{$emailTemplate->name == $EmailTemplate->name ? 'text-primary' : '' }}">{{ $EmailTemplate->name }}
                    </a>
                @endforeach
            
                </div>
            </li>
        </ul>
    </div>
</div> -->
@endsection
@section('content')

   

    <div class="row">
        
        <div class="col-12">
            <div class="row">
                
            </div>
            <div class="card">
                <div class="card-body">
    
                    <div class="language-wrap">
                        <div class="row"> 
                            <h6>{{ __('Place Holders') }}</h6>
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

<!--                                         <input type="submit" value="{{__('Save')}}" >
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
@endsection