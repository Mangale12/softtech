@extends('user.user_dashboard')
@section('content')
<section class="about-us mt-lg-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mx-auto text-center">

                <h1>Organizations Chart</h1>

                <p> Welcome to Trekking Agencies' Association of Nepal (TAAN)</p>

                {{-- <div class="an-user mb-4 pb-xl-2 d-flex align-items-center">
                    <div class="image image-big">
                        <img src="{{asset('user/images/about/about-user.png')}}" width="100%" alt="">
                    </div>
                    <div class="text">
                        <h6 class="name">Ms. Ambica Shrestha</h6>
                        <p class="mb-0">Founder President </p>
                        <a href="#">
                            <div class="more-details d-flex align-items-center">
                                <img src="https://en.wikipedia.org/static/images/icons/wikipedia.png" height="20" alt="img"> <span class="ms-2">Wiki Profile</span>
                            </div>
                        </a>
                      
                    </div>
                
                </div> --}}
             
            </div>
            <div class="col-lg-12">
                <div class="org-chart">
                    <img src="{{asset('user/images/org-chart.jpg')}}" alt="org-chart">
                </div>
            </div>
          
        </div>
    </div>
    
</section>
   
@endsection