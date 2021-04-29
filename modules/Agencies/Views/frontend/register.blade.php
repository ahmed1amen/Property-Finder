@extends('layouts.app')
@section('head')
@endsection
@section('content')
    <section class="our-agent-single bgc-f7 pb30-991">


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-7">

                    <form class="form bravo-form-register-vendor" method="post"
                          action="{{route('agent.register.store')}}">
                        @csrf

                        <div class="form-group">
                            <input type="text" class="form-control" name="first_name" autocomplete="off"
                                   placeholder="{{__("First Name")}}">
                            @error('first_name')
                            <span class="invalid-feedback d-block error">
                        {{ $message }}
                        </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="last_name" autocomplete="off"
                                   placeholder="{{__("Last Name")}}">
                           @error('last_name')
                            <span class="invalid-feedback d-block error">
                        {{ $message }}
                        </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="phone" autocomplete="off"
                                   placeholder="{{__("Phone")}}">
                           @error('phone')
                            <span class="invalid-feedback d-block error">
                        {{ $message }}
                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" autocomplete="off"
                                   placeholder="{{__("Email")}}">
                           @error('email')
                            <span class="invalid-feedback d-block error">
                        {{ $message }}
                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" autocomplete="off"
                                   placeholder="{{__("Password")}}">
                           @error('password')
                            <span class="invalid-feedback d-block error">
                        {{ $message }}
                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="term">
                                <input id="term" type="checkbox" name="term" class="mr5">
                                {!! __("I have read and accept the <a href=':link' target='_blank'>Terms and Privacy Policy</a>",['link'=>get_page_url(setting_item('vendor_term_conditions'))]) !!}
                                <span class="checkmark fcheckbox"></span>
                            </label>
                            @error('term')
                            <span class="invalid-feedback d-block error">
                        {{ $message }}
                        </span>
                            @enderror
                        </div>
                        @if(setting_item("user_enable_register_recaptcha"))
                            <div class="form-group">
                                {{recaptcha_field($captcha_action ?? 'register_vendor')}}
                                <div><span class="invalid-feedback error error-g-recaptcha-response"></span></div>
                            </div><!--End form-group-->
                        @endif
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary form-submit">
                                {{ __('Sign Up') }}
                                <span class="spinner-grow spinner-grow-sm icon-loading" role="status" aria-hidden="true"
                                      style="display: none"></span>
                            </button>
                        </div>
                        <div class="message-error"></div>
                    </form>
                </div>

            </div>
        </div>
        @endsection
    </section>
