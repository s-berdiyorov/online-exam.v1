@extends('layouts.auth')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="text-center m-0">
                <a href="index.html" class="logo logo-admin"><img src="{{ asset('images/logo.png') }}" height="30" alt="logo"></a>
            </h3>

            <div class="p-3">
                <h4 class="text-muted font-18 m-b-5 text-center">Welcome Back ! {{ Request::segment(1) }}</h4>
                <p class="text-muted text-center">Sign in to continue to Admiria.</p>

                <form class="form-horizontal m-t-30" action="{{ route('moderator.login_page') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="username"
                               placeholder="Enter username" value="{{ old('email') }}"
                               name="email" parsley-type="email" required
                               autocomplete="email" autofocus>

                        @error('email')
                            <ul class="parsley-errors-list filled" id="parsley-id-7">
                                <li class="parsley-required">{{ $message }}</li>
                            </ul>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="user-password">Password</label>
                        <input type="password" class="form-control" id="user-password"
                               name="password" required autocomplete="current-password"
                               placeholder="Enter password" data-parsley-minlength="8">
                    </div>

                    <div class="form-group row m-t-20">
                        <div class="col-sm-6">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlInline"
                                       name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customControlInline">Remember me</label>
                            </div>
                        </div>
                        <div class="col-sm-6 text-right">
                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">{{ __('Login') }}</button>
                        </div>
                    </div>

                    <div class="form-group m-t-10 mb-0 row">
                        <div class="col-6 m-t-20">
                            <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock    "></i> Forgot
                                your password?</a>
                        </div>
                        <div class="col-6 m-t-20">
                            <div class="dropdown">
                                <a class="dropdown-toggle arrow-none text-muted float-right"
                                   data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="{{ asset('images/flags/'.app()->getLocale().'.jpg') }}" class="ml-2" height="16" alt=""/>
                                    {{ __('auth.locale-title') }}
                                </a>
                                <div class="dropdown-menu language-switch">
                                    <a class="dropdown-item" href="{{ url('locale/ru') }}">
                                        <img src="{{ asset('images/flags/ru.jpg') }}" alt="" height="16"/>
                                        <span> Русский </span>
                                    </a>
                                    <a class="dropdown-item" href="{{ url('locale/uz') }}">
                                        <img src="{{ asset('images/flags/uz.jpg') }}" alt="" height="16"/>
                                        <span> O'zbekcha </span>
                                    </a>
                                    <a class="dropdown-item" href="{{ url('locale/en') }}">
                                        <img src="{{ asset('images/flags/en.jpg') }}" alt="" height="16"/>
                                        <span> English </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
