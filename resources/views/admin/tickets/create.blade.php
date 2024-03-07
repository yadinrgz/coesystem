@extends('layouts.admin')

@section('page-title')
{{ __('Create Ticket') }}
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
<li class="breadcrumb-item"><a href="{{ route('admin.tickets.index') }}">{{ __('Tickets') }}</a></li>
<li class="breadcrumb-item">{{ __('Create') }}</li>
@endsection

@section('content')
<form action="{{route('admin.tickets.store')}}" class="mt-3" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h6>{{ __('Ticket Information') }}</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="require form-label">{{ __('Name') }}</label>
                            <input class="form-control {{(!empty($errors->first('name')) ? 'is-invalid' : '')}}" type="text" name="name" required="" placeholder="{{ __('Name') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="require form-label">{{ __('Email') }}</label>
                            <input class="form-control {{(!empty($errors->first('email')) ? 'is-invalid' : '')}}" type="email" name="email" required="" placeholder="{{ __('Email') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="require form-label">{{ __('Category') }}</label>
                            <select class="form-control {{(!empty($errors->first('category')) ? 'is-invalid' : '')}}" name="category" required="">
                                <option value="">{{ __('Select Category') }}</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('category') }}
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="require form-label">{{ __('Status') }}</label>
                            <select class="form-control {{(!empty($errors->first('status')) ? 'is-invalid' : '')}}" name="status" required="">
                                <option value="">{{ __('Select Status') }}</option>
                                <option value="In Progress">{{ __('In Progress') }}</option>
                                <option value="On Hold">{{ __('On Hold') }}</option>
                                <option value="On Waiting">{{ __('On Waiting') }}</option>
                                <option value="Closed">{{ __('Closed') }}</option>
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('status') }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="require form-label">{{ __('Subject') }}</label>
                            <input class="form-control {{(!empty($errors->first('subject')) ? 'is-invalid' : '')}}" type="text" name="subject" required="" placeholder="{{ __('Subject') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('subject') }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="require form-label">{{ __('Attachments') }} <small>({{__('You can select multiple files')}})</small> </label>
                            <div class="choose-file form-group">
                                <label for="file" class="form-label d-block">
                                    {{-- <input type="file" class="form-control {{ $errors->has('attachments') ? ' is-invalid' : '' }}" multiple="" name="attachments[]" id="file" data-filename="multiple_file_selection"> --}}

                                    <input type="file" name="attachments[]" id="file" class="form-control mb-2 {{ $errors->has('attachments') ? ' is-invalid' : '' }}" multiple="" data-filename="multiple_file_selection" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                    <img src="" id="blah" width="20%" />
                                    <div class="invalid-feedback">
                                        {{ $errors->first('attachments.*') }}
                                    </div>
                                </label>
                            </div>
                            <p class="multiple_file_selection mx-4"></p>
                        </div>

                        <!-- FORMULARIO -->
                        <!-- FORMULARIO -->
                        <!-- FORMULARIO -->
                        <!-- FORMULARIO -->
                        <div class="row text-center">
                            <div class="form-group col-md-1">
                                <label class="require form-label  mt-4 pt-3">O.D.</label>

                            </div>
                            <div class="form-group col">
                                <label class="require form-label">ESFERA</label>
                                <input type="number" class="form-control" name="esfera_der" id="valorInput" min="-6" max="8" step="0.01" placeholder="">
                                <div class="invalid-feedback">
                                    Por favor, ingresa un valor válido entre -6.00 y +8.00.
                                </div>
                            </div>
                            <div class="form-group col">
                                <label class="require form-label">CILINDRO</label>
                                <input class="form-control {{(!empty($errors->first('subject')) ? 'is-invalid' : '')}}" type="text" name="cilindro_der" required="" placeholder="{{ __('Subject') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('subject') }}
                                </div>
                            </div>
                            <div class="form-group col">
                                <label class="require form-label">EJE</label>
                                <input class="form-control {{(!empty($errors->first('subject')) ? 'is-invalid' : '')}}" type="text" name="eje_der" required="" placeholder="{{ __('Subject') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('subject') }}
                                </div>
                            </div>
                            <div class="form-group col">
                                <label class="require form-label">ADICION</label>
                                <input class="form-control {{(!empty($errors->first('subject')) ? 'is-invalid' : '')}}" type="text" name="adicion_der" required="" placeholder="{{ __('Subject') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('subject') }}
                                </div>
                            </div>
                            <div class="form-group col">
                                <label class="require form-label">D.N.P.</label>
                                <input class="form-control {{(!empty($errors->first('subject')) ? 'is-invalid' : '')}}" type="text" name="dnp_der" required="" placeholder="{{ __('Subject') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('subject') }}
                                </div>
                            </div>
                            <div class="form-group col">
                                <label class="require form-label">ALTURA</label>
                                <input class="form-control {{(!empty($errors->first('subject')) ? 'is-invalid' : '')}}" type="text" name="altura_der" required="" placeholder="{{ __('Subject') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('subject') }}
                                </div>
                            </div>
                        </div>


                        <div class="row text-center">
                            <div class="form-group col-md-1">
                                <label class="require form-label">O.I.</label>

                            </div>
                            <div class="form-group col">
                                <!-- ESFEREA IZQ -->
                                <input class="form-control {{(!empty($errors->first('subject')) ? 'is-invalid' : '')}}" type="text" name="esfera_izq" required="" placeholder="{{ __('Subject') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('subject') }}
                                </div>
                            </div>
                            <div class="form-group col">
                                <!-- CILINDRO IZQ -->
                                <input class="form-control {{(!empty($errors->first('subject')) ? 'is-invalid' : '')}}" type="text" name="cilindro_izq" required="" placeholder="{{ __('Subject') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('subject') }}
                                </div>
                            </div>
                            <div class="form-group col">
                                <!-- EJE IZQ -->
                                <input class="form-control {{(!empty($errors->first('subject')) ? 'is-invalid' : '')}}" type="text" name="eje_izq" required="" placeholder="{{ __('Subject') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('subject') }}
                                </div>
                            </div>
                            <div class="form-group col">
                                <!-- ADICION IZQ -->
                                <input class="form-control {{(!empty($errors->first('subject')) ? 'is-invalid' : '')}}" type="text" name="adicion_izq" required="" placeholder="{{ __('Subject') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('subject') }}
                                </div>
                            </div>
                            <div class="form-group col">
                                <!-- DNP IZQ -->
                                <input class="form-control {{(!empty($errors->first('subject')) ? 'is-invalid' : '')}}" type="text" name="dnp_izq" required="" placeholder="{{ __('Subject') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('subject') }}
                                </div>
                            </div>
                            <div class="form-group col">
                                <!-- ALTURA IZQ -->
                                <input class="form-control {{(!empty($errors->first('subject')) ? 'is-invalid' : '')}}" type="text" name="altura_izq" required="" placeholder="{{ __('Subject') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('subject') }}
                                </div>
                            </div>
                        </div>

                        <!-- // FORMULARIO -->
                        <!-- // FORMULARIO -->

                        <hr />
                        <div class="row">
                            <div class="col-12 text-center">
                                <h5>MEDIDAS DEL ARMAZÓN</h5>
                            </div>
                            <div class="row text-center mt-3">
                                <div class="form-group col">
                                    <label>Horizontal</label>
                                    <input class="form-control" type="text" name="horizontal" placeholder="">
                                </div>

                                <div class="form-group col">
                                    <label>Puente</label>
                                    <input class="form-control" type="text" name="puente" placeholder="">
                                </div>

                                <div class="form-group col">
                                    <label>Vertical</label>
                                    <input class="form-control" type="text" name="vertical" placeholder="">
                                </div>

                                <div class="form-group col">
                                    <label>Diagonal</label>
                                    <input class="form-control" type="text" name="diagonal" placeholder="">
                                </div>
                            </div>
                        </div>
                     
                     
                        <!-- //////////////////////    
                                TIPO DE LENTE
                            ////////////////////// -->


                            <hr />
                        <div class="row">
                        
                            <div class="row text-center mt-3">
                                <div class="form-group col">
                                    <label>Tipo de lente</label>
                                    <input class="form-control" type="text" name="tipo_lente" placeholder="">
                                </div>
                          
                                <div class="form-group col">
                                    <label>Biselado</label>
                                    <input class="form-control" type="text" name="biselado" placeholder="">
                                </div>
                          
                                <div class="form-group col">
                                    <label>Tipo armazón</label>
                                    <input class="form-control" type="text" name="tipo_armazon" placeholder="">
                                </div>
                          
                                <div class="form-group col">
                                    <label>Material</label>
                                    <input class="form-control" type="text" name="material" placeholder="">
                                </div>
                                <div class="form-group col">
                                    <label>Tratamiento</label>
                                    <input class="form-control" type="text" name="tratamiento" placeholder="">
                                </div>
                                <div class="form-group col">
                                    <label>Tinte</label>
                                    <input class="form-control" type="text" name="tinte" placeholder="">
                                </div>
                            </div>
                        </div>




                        <!-- //////////////////////    
                               DESCRIPCIÓN
                            ////////////////////// -->

                        <div class="form-group col-md-12">
                            <label class="form-label">{{ __('Description') }}</label>
                            <textarea name="description" class="form-control ckdescription {{(!empty($errors->first('description')) ? 'is-invalid' : '')}}"></textarea>
                            <div class="invalid-feedback">
                                {{ $errors->first('description') }}
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end text-end">
                        <a class="btn btn-secondary btn-light btn-submit" href="{{route('admin.tickets.index')}}">{{ __('Cancel') }}</a>
                        <button class="btn btn-primary btn-submit ms-2" type="submit">{{ __('Submit') }}</button>
                    </div>
                </div>


            </div>
        </div>
        {{-- <div class="col-md-4 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <h6>{{ __('Attachments') }}<small class="d-block">({{__('You can select multiple files')}})</small></h6>
    </div>
    <div class="card-body">
        <div class="choose-file form-group">
            <label for="file" class="form-label">
                <div>{{ __('Choose File Here') }}</div>
                <input type="file" class="form-control {{ $errors->has('attachments') ? ' is-invalid' : '' }}" multiple="" name="attachments[]" id="file" data-filename="multiple_file_selection">
                <div class="invalid-feedback">
                    {{ $errors->first('attachments.*') }}
                </div>
            </label>
        </div>
    </div>
    <p class="multiple_file_selection mx-4"></p>
    </div>
    </div> --}}
    </div>
</form>
@endsection

@push('scripts')
<script src="//cdn.ckeditor.com/4.12.1/basic/ckeditor.js"></script>
<script src="{{ asset('js/editorplaceholder.js') }}"></script>
<script>
    $(document).ready(function() {
        $.each($('.ckdescription'), function(i, editor) {

            CKEDITOR.replace(editor, {
                // contentsLangDirection: 'rtl',
                extraPlugins: 'editorplaceholder',
                editorplaceholder: editor.placeholder
            });
        });
    });
</script>

<script>
    // Obtén el input y su contenedor
    const valorInput = document.getElementById('valorInput');
    const valorInputContainer = valorInput.closest('.container');

    // Agrega un evento de cambio al input para validar el rango
    valorInput.addEventListener('input', function() {
        const valor = parseFloat(valorInput.value);
        if (isNaN(valor) || valor < -6 || valor > 8) {
            valorInput.classList.add('is-invalid');
        } else {
            valorInput.classList.remove('is-invalid');
        }
    });
</script>
@endpush