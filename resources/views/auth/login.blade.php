@extends('auth.partials.topbar')

<x-guest-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card form-holder">
                    <h1><i class="fa-solid fa-user"></i>Login</h1>
                    @if (Session::has('error'))
                        <p class="text-danger">{{ Session::get('error') }}</p>
                    @endif

                    @if (Session::has('success'))
                        <p class="text-success">{{ Session::get('success') }}</p>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="form-group">
                            <label class="login-label" for="email">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label class="login-label" for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember me') }}
                                </label>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-8 text-left">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Password') }}
                                    </a>
                                @endif
                            </div>
                            <div class="col-4 text-right">
                                <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
