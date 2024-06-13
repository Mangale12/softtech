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
        margin-top: 55px;
    }
</style><br>
<article class="banner">किसान सूचीकरण तथा अनुदान व्यवस्थापन प्रणाली</article>
<div class="col-md-4 offset-md-4 mt-5" style="background-color: #fff;color:#000">
    <div class="content">
        <div class="brand">
            <a class="link" href="{{ route('login') }}"></a><br>
        </div>
        <form id="login-form" action="{{ route('login') }}" method="POST">
            @csrf
            <h4 class="login-title" style="text-align: center;">प्रयोगकर्ता लग-ईन</h4>
            <hr>
            @if (Session::has('success'))
            <div class="alert alert-info">{{ Session::get('success') }}सफलतापूर्वक लग आउट गरिएको छ ।
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            </div>
            @endif
            <div class="form-group">
                <div class="input-group-icon right">
                    <input class="form-control rounded" type="email" value="{{ old('email') }}" name="email" placeholder="इमेल" autocomplete="off">
                    @if($errors->has('email'))
                    <small id="name-error" class="help-block " style="color: red;" for="name"><span>{{ $errors->first('email') }}</span></small>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <input id="password-field" type="password" class="form-control rounded" name="password" placeholder="पासवर्ड" value="">
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    @if($errors->has('password'))
                    <small id="name-error" class="help-block " style="color: red;" for="password"><span>{{ $errors->first('password') }}</small></p>
                    @endif
                </div>
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
                <button class="btn btn-info btn-block" type="submit" style="cursor: pointer;">साइन इन</button>
            </div>
            <div class="social-auth-hr">
            </div>
            <div class="text-center social-auth m-b-20">

            </div>
            @if (Route::has('register'))
            <div class="text-center d-flex justify-content-end" style="font-size: 14px;">खाता छैन ?&nbsp;&nbsp;
                <a class="color-blue" href="{{ route('register') }}">रजिस्टर</a>
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
    setTimeout(function() {
        $('.alert-info').slideUp();
    }, 2000);
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