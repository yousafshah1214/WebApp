@extends('layouts.app')

@section('content')
    <!-- Login Section -->
    <section id="login-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="login-box">
                        <img src="{{ asset("build/img/logo.png") }}" alt="logo" />
                        <div class="social-log" >
                            <ul>
                                <li>
                                    <a class="btn btn-block btn-lg btn-social btn-facebook" href="{{ route('login.facebook') }}">
                                        <span class="fa fa-facebook-official"></span> Login with Facebook
                                    </a>
                                </li>
                                <li>
                                    <a class="btn btn-block btn-lg btn-social btn-twitter" href="{{ route('login.twitter') }}">
                                        <span class="fa fa-twitter"></span> Login with Twitter
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="or"><span>or</span></div>
                    </div>
                </div>
                <div class="col-sm-4 col-sm-offset-4">
                    <div class="login-form">
                        {!! Form::open(array('url'  =>  'login/process','id' => 'login')) !!}
                        <div class="input-group">
                            <input id="username" type="text" class="form-control uname-control" placeholder="Username" aria-describedby="sizing-addon2" name="username">
										<span class="input-group-addon log-icon-one" id="sizing-addon2"><i class="fa fa-user"></i>
										</span>
										<span id="username_error" class="error"
                                              @if($errors->has('username'))
                                              style="display:block"
                                                @endif>
										    <i class="fa fa-times"></i>
                                            @if($errors->has('username'))
                                                {{ $errors->first('username') }}
                                            @endif
										</span>
                        </div>
                        <div class="input-group pass-box">
                            <input id="password" type="password" class="form-control uname-control" placeholder="Password" aria-describedby="sizing-addon2" name="password">
										<span class="input-group-addon log-icon-one" id="sizing-addon4"><i class="fa fa-lock"></i>
										</span>
										<span id="pass_error" class="error"
                                              @if($errors->has('password'))
                                              style="display:block"
                                                @endif>
                                        <i class="fa fa-times"></i>
                                            @if($errors->has('password'))
                                                {{ $errors->first('password') }}
                                            @endif
                                        </span>
                        </div>
                        <div class="forget">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" value="true" name="remember_me"> Remember me
                            </label>
                            <a href="{{ url('forget/password') }}">Forgot your password?</a>
                        </div>
                        <input class="log-btn" type="submit" id="submit" name="" value="Login" />
                        {!! Form::close() !!}
                        <span class="singnup-now"> Not a member?<a href="{{ url("signup") }}"> Sign Up now!</a> </span>
                    </div>
                </div>

            </div>

        </div>
        </div>
    </section>

@endsection