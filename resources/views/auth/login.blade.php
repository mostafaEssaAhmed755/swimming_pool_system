@extends('layouts.app')

@section('content')

<div class="limiter">
    <div class="container-login100 page-background">
        <div class="wrap-login100">
            <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                @csrf
                <span class="login100-form-logo">
                    <img alt="" src="{{ asset('assets/img/logo-2.png') }}">
                </span>
                <span class="login100-form-title p-b-34 p-t-27">
                    {{ __('Login') }}
                </span>
                <div class="wrap-input100 validate-input @error('username') alert-validate @enderror" 
                    @error('username') data-validate="{{ $message }}" @enderror>
                    <input class="input100" type="text" name="username" placeholder="{{ __('User Name') }}"
                    value="{{ old('username') }}" required autocomplete="username" autofocus>
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>
                <div class="wrap-input100 validate-input @error('password') alert-validate @enderror" 
                @error('password')data-validate="{{ $message }}"@enderror >
                    <input class="input100" type="password" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>
                <div class="contact100-form-checkbox">
                    <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember"  {{ old('remember') ? 'checked' : '' }}>
                    <label class="label-checkbox100" for="ckb1">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        {{ __('Login') }}
                    </button>
                </div>
                @if (Route::has('password.request'))
                <div class="text-center p-t-30">
                        <a class="txt1" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                </div>
                @endif

            </form>
        </div>
    </div>
</div>
@endsection
