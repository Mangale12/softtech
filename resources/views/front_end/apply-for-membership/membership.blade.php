@extends('front_end.user_dashboard')
@section('content')
    <section class="mt-lg-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="login  register">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="p-lg-5">
                                    <h3>Apply for Membership</h3>
                                    {{-- <p>Welcome Back! Please inter your details.</p> --}}
                                    <form class="row" action="" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-lg-6 mb-3">
                                            <label for="company_name" class="form-label"> Name</label>
                                            <input type="text" id="company_name" name="company_name" class="form-control"
                                                placeholder=" Name" required>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label for="company_email" class="form-label"> Email</label>
                                            <input type="email" id="company_email" name="company_email"
                                                class="form-control" placeholder="Email" required>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label for="phone_number" class="form-label">Phone Number</label>
                                            <input type="text" id="phone_number" name="phone" class="form-control"
                                                placeholder=" Phone Number" required>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label for="c_pan" class="form-label">Upload PAN </label>
                                            <input class="form-control" type="file" name="c_pan" id="c_pan"
                                                required>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label for="c_register" class="form-label">Upload Company Register File</label>
                                            <input class="form-control" type="file" name="c_register" id="c_register"
                                                required>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label for="t_clearanc" class="form-label">Tax Clearance Certificate</label>
                                            <input class="form-control" type="file" name="t_clearanc" id="t_clearanc"
                                                required>
                                        </div>
                                        <br>
                                        <div class="col-lg-6">
                                            <button type="submit" class="btn btn-login w-100">Apply Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-5">

                                <img width="100%" height="100%" src="{{ asset('user/images/hikin.png') }}"
                                    alt="img">

                            </div>

                        </div>



                    </div>
                </div>
                {{-- <div class="col-lg-5">
                    <div class="login p-lg-5">
                        <h3>Become a Member</h3>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="company_name" class="form-label">Company Name</label>
                                <input type="text" id="company_name" name="company_name" class="form-control" placeholder="Company Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="company_email" class="form-label">Company Email</label>
                                <input type="email" id="company_email" name="company_email" class="form-control" placeholder="Company Email" required>
                            </div>
                            <div class="mb-3">
                                <label for="c_pan" class="form-label">Upload PAN Number</label>
                                <input class="form-control" type="file" name="c_pan" id="c_pan"  required>
                            </div>
                            <div class="mb-3">
                                <label for="c_register" class="form-label">Upload Company Register File</label>
                                <input class="form-control" type="file" name="c_register" id="c_register" required>
                            </div>

                            <div class="">
                                <button type="submit" class="btn btn-login w-100">Apply Now</button>
                            </div>
                        </form>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
@endsection
