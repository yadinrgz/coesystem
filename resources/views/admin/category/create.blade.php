@extends('layouts.admin')

@section('page-title')
    {{ __('Create Category') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.category') }}">{{ __('Category') }}</a></li>
    <li class="breadcrumb-item">{{ __('Create') }}</li>
@endsection



@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" class="needs-validation" action="{{route('admin.category.store')}}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label">{{ __('Name') }}</label>
                                <div class="col-sm-12 col-md-12">
                                    <input type="text" placeholder="{{ __('Name of the Category') }}" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" required>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">

                                <label  for="exampleColorInput" class="form-label">{{ __('Color') }}</label>
                                <div class="col-sm-12 col-md-12">
                                    <input name="color" type="color" class=" form-control  form-control-color {{ $errors->has('color') ? ' is-invalid' : '' }}" value="#255ff7" id="exampleColorInput">
                                    <div class="invalid-feedback">
                                        {{ $errors->first('color') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="form-label"></label>
                                <div class="col-sm-12 col-md-12 text-end">
                                    <button class="btn btn-primary btn-block btn-submit"><span>{{ __('Add') }}</span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
