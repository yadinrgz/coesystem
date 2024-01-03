@extends('layouts.admin')

@section('page-title')
    {{ __('Edit Knowledge') }} ({{ $knowledge->title }})
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.knowledge') }}">{{ __('Knowledge') }}</a></li>
    <li class="breadcrumb-item">{{ __('Edit') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('admin.knowledge.update', $knowledge->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label">{{ __('Title') }}</label>
                                <div class="col-sm-12 col-md-12">
                                    <input type="text" placeholder="{{ __('Title of the Knowledge') }}" name="title"
                                        class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}"
                                        value="{{ $knowledge->title }}" autofocus>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('title') }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label">{{ __('Category') }}</label>
                                <div class="col-sm-12 col-md-12">
                                    <select class="form-select" name="category">
                                        @foreach ($category as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label">{{ __('Description') }}</label>
                                <div class="col-sm-12 col-md-12">
                                    <textarea name="description"
                                        class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">{!! $knowledge->description !!}</textarea>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('description') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="form-label"></label>
                                <div class="col-sm-12 col-md-12 text-end">
                                    <button
                                        class="btn btn-primary btn-block btn-submit"><span>{{ __('Update') }}</span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="//cdn.ckeditor.com/4.12.1/basic/ckeditor.js"></script>
    <script src="{{ asset('js/editorplaceholder.js') }}"></script>
    <script>
        CKEDITOR.replace('description', {
            // contentsLangDirection: 'rtl',
            extraPlugins: 'editorplaceholder',
            editorplaceholder: '{{ __('Start Text here..') }}'
        });
    </script>
@endpush
