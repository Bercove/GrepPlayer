@extends('layouts.public')

@section('stylesheets')

@endsection

@section('contents')
<section class="sign-in-page">
    <div class="container">
       <div class="row justify-content-center align-items-center height-self-center mt-10">
          <div class="col-md-6 col-sm-12 col-12 align-self-center">
             <div class="sign-user_card ">
                <div class="d-flex justify-content-center">
                   <div class="sign-user_logo">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class=" img-fluid" alt="Logo">
                   </div>
                </div>
                <div class="sign-in-page-data">
                   <div class="sign-in-from w-100 pt-5 m-auto">
                      <h1 class="mb-3 text-center">Sign in</h1>
                      <form method="POST" 
                      action="{{ route('login') }}" class="mt-4">
            
                        {{ csrf_field() }}

                         <div class="form-group">
                            <label for="exampleInputEmail2">Email address</label>
                            <input type="email" name="email" 
                            value="{{ old('email') }}"  class="form-control mb-0" id="exampleInputEmail2" placeholder="Enter email" >
                         </div>
                         <div class="form-group">
                            <label for="exampleInputPassword2">Password</label>
                            <input type="password" name="password" class="form-control mb-0" id="exampleInputPassword2" placeholder="Password" >
                         </div>
                         <div class="sign-info">
                            <button type="submit" class="btn btn-primary mb-2">Sign in</button>
                            <span class="dark-color d-block line-height-2">Don't have an account? <a href="sign-up.html">Sign up</a></span>
                         </div>
                         <div class="d-inline-block w-100">
                            <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                               <input type="checkbox" class="custom-control-input" id="customCheck1">
                               <label class="custom-control-label" for="customCheck1">Remember Me</label>
                            </div>
                         </div>
                      </form>
                   </div>
                </div>
                <div class="mt-2">
                    <div class="d-flex justify-content-center links">
                        <a href="{{ route('auth.google.redirect') }}">
                            <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png">
                        </a>
                    </div>
                   <div class="d-flex justify-content-center links">
                      Don't have an account? <a href="{{ route('auth.google.redirect') }}" class="ml-2">Sign Up</a>
                   </div>
                   <div class="d-flex justify-content-center links">
                      <a href="javascript:;">Forgot your password?</a>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <!-- Sign in END -->
       <!-- color-customizer -->
    </div>
 </section>

@section('scripts')

@endsection 