@php
    $logo = Utility::get_superadmin_logo();
    $logos=\App\Models\Utility::get_file('uploads/logo/');

@endphp

@extends('layouts.auth')

@section('page-title')
    {{ __('Search Your Ticket') }}
@endsection

@section('content')

    <div class="auth-wrapper auth-v3">
        <div class="bg-auth-side bg-primary"></div>
        <div class="auth-content">
            
            <nav class="navbar navbar-expand-md navbar-light default">
                <div class="container-fluid pe-2">
                    <a class="navbar-brand" href="#">
                        <img src="{{ $logos.$logo }}" alt="logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01" style="flex-grow: 0;">
                        <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('login') }}">{{ __('Agent Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">{{ __('Create Ticket') }}</a>
                            </li>
                            <li class="nav-item">
                                @if ($setting['FAQ'] == 'on')
                                    <a href="{{route('faq')}}" class="nav-link">{{ __('FAQ') }}</a>
                                @endif
                            </li>  
                            <li class="nav-item">
                                @if ($setting['Knowlwdge_Base'] == 'on')
                                    <a href="{{route('knowledge')}}" class="nav-link">{{ __('Knowledge') }}</a>
                                @endif
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="card">
                <div class="row align-items-center text-start">
                    <div class="col-xl-6">
                        <div class="card-body">
                            <div class="">
                                <h2 class="mb-3 f-w-600">{{ __('Search Your Ticket') }}</h2>
                            </div>
                            <form method="POST" >
                                @csrf
                                @if(session()->has('info'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('info') }}
                                    </div>
                                @endif
                                @if(session()->has('status'))
                                    <div class="alert alert-info">
                                        {{ session()->get('status') }}
                                    </div>
                                @endif

                                <div class="">                   
                                    <div class="form-group mb-3">
                                        <label for="ticket_id" class="form-label">{{ __('Ticket Number') }}</label>
                                        <input type="number" class="form-control {{ $errors->has('ticket_id') ? 'is-invalid' : '' }}" min="0" id="ticket_id" name="ticket_id" placeholder="{{ __('Enter Ticket Number') }}" required="" value="{{ old('ticket_id') }}" autofocus>
                                        <div class="invalid-feedback d-block">
                                            {{ $errors->first('ticket_id') }}
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label">{{ __('Email') }}</label>                            
                                        <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" placeholder="{{ __('Email address') }}" reuired="" value="{{ old('email') }}">
                                        <div class="invalid-feedback d-block">
                                            {{ $errors->first('email') }}
                                        </div>
                                    </div>
                                    
                                    <div class="d-grid">
                                        <button class="btn btn-primary btn-submit btn-block mt-2">{{ __('Search') }}</button>
                                    </div>


                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="col-xl-6 img-card-side">
                        <div class="auth-img-content">
                            <img src="{{ asset('assets/images/auth/img-auth-3.svg') }}" alt="" class="img-fluid">
                            <h3 class="text-white mb-4 mt-5">{{ __('“Attention is the new currency”')}}</h3>
                            <p class="text-white">
                                {{ __('The more effortless the writing looks, the more effort the writer actually put into the process.')}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="auth-footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6">
                            <p class="text-muted">{{env('FOOTER_TEXT')}}</p> 
                        </div>
                        <div class="col-6 text-end">
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
