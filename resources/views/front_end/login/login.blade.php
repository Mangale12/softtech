@extends('user.user_dashboard')
@section('content')
<section class="mt-lg-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="login d-flex justify-content-center">
                <div class="login__form flex-fill p-lg-5">
                  <h3>Welcome Back</h3>
                  <p>Welcome Back! Please inter your details.</p>
                  <form action="#">
                    <div class="mb-3">
                      <label class="py-2" for="email">Email</label>
                     
                      <input type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="mb-3">
                      <label class="py-2" for="email">Password</label>

                      <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="mb-3 text-center">
                  
                      <a href="#">Forget Password?</a>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-login w-100">Sign In</button>
                    </div>
                  </form>
                </div>
                <div class="login__img flex-fill">
                  <img src="{{asset('user/images/login-temple-1.jpg')}}" alt="img">
                </div>
               
              </div>
            </div>
        </div>
    </div>
  </section>
   
@endsection