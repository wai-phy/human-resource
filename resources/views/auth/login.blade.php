@extends('layouts.app_plain')
@section('title','Login')
@section('content')
    <div class="container">
        <div class="row justify-content-center align-content-center" style="height: 100vh;"> 
            <div class="col-md-6">
                <div class="text-center mb-2">
                    <img src="{{asset('image/management.png')}}" style="width: 75px" alt="management hr">
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center mb-3">Login</h5>
                        <p class="text-muted text-center">Please Fill Login Form</p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="phone" class="">Phone Address</label>

                                <div class="col-md-6">
                                    <input id="phone" type="number"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required ="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 ">
                                    <button type="submit" class="btn btn-theme btn-block">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
