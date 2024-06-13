@extends('layouts.login')
@section('title', 'Login')
@section('content')
<style>
    .field-icon {
        float: right;
        margin-left: -25px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
    }

    .container {
        padding-top: 50px;
        margin: auto;
    }

    .info {
        color: #FFFFFF;
        margin: 0 auto;
        text-align: center;
        width: 70%;
        font-size: 12px;
    }

    .banner {
        color: #FFFFFF;
        font-family: 'Fjalla One', sans-serif;
        font-size: 27px;
        text-align: center;
        margin-left: 60px;
        text-shadow: 0 0.5px 2px #535353;
        width: 90%;
        margin-top: 0px;
    }
</style><br>
<article class="banner">किसान सूचीकरण तथा अनुदान व्यवस्थापन प्रणाली</article>

<div class="col-md-4 offset-md-4 mt-5" style="background-color: #fff;color:#000">
    <div class="content">
        <div class="brand">
            <a class="link" href="{{ route('register') }}"></a><br>
        </div>
        <form id="register-form" action="{{ route('register') }}" method="POST">
            @csrf
            <h4 class="login-title" style="text-align: center;">नयाँ प्रयोगकर्ता</h4>
            <hr>

            <div class="form-group">
                <div class="input-group-icon right">
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="नाम">
                    @if($errors->has('email'))
                    <small id="name-error" class="help-block " style="color: red;" for="name"><span>{{ $errors->first('email') }}</span></small>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="इमेल" autocomplete="off">
                    @if($errors->has('email'))
                    <small id="name-error" class="help-block " style="color: red;" for="name"><span>{{ $errors->first('email') }}</span></small>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <input class="form-control" type="text" name="mobile" value="{{ old('mobile') }}" placeholder="मोबाइल" autocomplete="off">
                    @if($errors->has('email'))
                    <small id="name-error" class="help-block " style="color: red;" for="name"><span>{{ $errors->first('email') }}</span></small>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <input class="form-control" id="password" type="password" name="password" placeholder="पासवर्ड">
                @if($errors->has('password'))
                <p id="name-error" class="help-block " for="name"><span>{{ $errors->first('password') }}</span></p>
                @endif
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password_confirmation" placeholder="पासवर्ड पुन: लेख्नुहोस">
                @if($errors->has('password_confirmation'))
                <p id="name-error" class="help-block " for="name"><span>{{ $errors->first('password_confirmation') }}</span></p>
                @endif
            </div>
            <div class="form-group d-flex justify-content-between" style="font-size: 14px;">
                <label class="ui-checkbox ui-checkbox-info">
                    <input type="checkbox" style="scale: 1.5;" name="remember" id="customCheck" {{ old('remember') ? 'checked' : '' }}>
                    <span class="input-span" for="customCheck"></span>&nbsp;पासवर्ड याद राख्नुहोस्</label>
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="d-flex justify-content-end">पासवर्ड भुल्नु भयो ?</a>
                @endif
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit" style="cursor: pointer;">साइन अप</button>
            </div>
            <div class="social-auth-hr">
            </div>
            <div class="text-center social-auth m-b-20">

            </div>
            @if (Route::has('register'))
            <div class="text-center d-flex justify-content-end" style="font-size: 14px;">खाता छैन ?&nbsp;&nbsp;
                <a class="color-blue" href="{{ route('login') }}">प्रयोगकर्ता लग-ईन</a>
            </div>
            @endif
        </form>
    </div>
</div><br>
<section class="info">
    <p>
        Copyright © 2023 ,<a href="http://softechfoundation.com">सफ्टेक फाउन्डेसन</a>, All Rights Reserved.<br>
    </p>
</section>

@endsection
@section('js')
<script>
    $(document).ready(function() {
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    });
</script>
@endsection