@extends('customer.layout')
@section('title', "Trang chủ")


@section('css')

@endsection()


@section('body') 
	<div class="container" style="margin: 140px auto;">
      <div class="row justify-content-center">
         <div class="col-xl-6 col-lg-8">
            <div class="tp-login-wrapper">

               <div class="tp-login-option"> 
                  <div class="tp-login-mail text-center mb-40">
                     <p>Sign in with <a href="#">Email</a></p>
                  </div>
                  <div class="tp-login-input-wrapper">
                     <div class="tp-login-input-box">
                        <div class="tp-login-input">
                           <input id="email" type="email" placeholder="top-mobile@mail.com" style="width: 100%;">
                        </div>
                        <div class="tp-login-input-title">
                           <label for="email">Your Email</label>
                        </div>
                     </div>
                     <div class="tp-login-input-box">
                        <div class="tp-login-input">
                           <input id="tp_password" type="password" placeholder="Min. 6 character" style="width: 100%;">
                        </div>
                        <div class="tp-login-input-eye" id="password-show-toggle">
                           <span id="open-eye" class="open-eye">
                              <img src="{{ asset("customer/icon/eye-close.svg") }}" alt="">
                           </span>
                           <span id="close-eye" class="open-close">
                              <img src="{{ asset("customer/icon/eye.svg") }}" alt="">
                           </span>
                        </div>
                        <div class="tp-login-input-title">
                           <label for="tp_password">Password</label>
                        </div>
                     </div>
                  </div> 
                  <div class="tp-login-bottom">
                     <a href="/profile" class="tp-login-btn w-100">Login</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection()

@section('js') 
<script type="text/javascript" src="{{ asset("customer/assets/js/page/login.js") }}"></script> 
@endsection()