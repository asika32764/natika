{{-- Part of Front project. --}}

<?php
$socialLogin = (array) $app->get('social_login');
$socialLogin = \Windwalker\Utilities\ArrayHelper::getColumn($socialLogin, 'enabled');
$socialLogin = in_array(true, $socialLogin);
?>

@extends($warderExtends)

@section('content')
    <style>
        #social-login-buttons {
            text-align: center;
        }
        #social-login-buttons button.btn {
            width: 300px;
        }
    </style>
    <div class="container warder-page login-page">
        <div class="row">

            @section('login-content')
                <form id="user-form" class="form-horizontal" action="{{ $router->html('login') }}" method="POST" enctype="multipart/form-data">
                    <div class="col-md-12" style="margin-top: 50px">

                        @yield('login-desc')

                        <div class="row">
                            <div class="col-md-6 {{ $socialLogin ? null : 'col-md-offset-3' }} login-form-wrapper">
                                {!! $form->renderFields() !!}
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <p class="login-button-group">
                                            <button class="login-button btn btn-primary">
                                                @translate($warderPrefix . 'login.submit.button')
                                            </button>
                                            <a class="go-register-button btn btn-success" href="{{ $router->html('registration') }}">
                                                @translate($warderPrefix . 'login.register.button')
                                            </a>
                                        </p>

                                        <p class="login-action-group">
                                            <a class="forget-link" href="{{ $router->html('forget_request') }}">
                                                @translate($warderPrefix . 'login.forget.link')
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            @if ($socialLogin)
                            <div class="col-md-6 social-login-wrapper">

                                <div id="social-login-buttons">
                                    @if ($app->get('social_login.facebook.enabled'))
                                        <p>
                                            <button class="social-login-facebook-button btn btn-primary"
                                                onclick="jQuery('#user-form').attr('action', '{{ $router->html('social_login', array('provider' => 'facebook')) }}')">
                                                Facebook
                                            </button>
                                        </p>
                                    @endif

                                    @if ($app->get('social_login.twitter.enabled'))
                                        <p>
                                            <button class="social-login-twitter-button btn btn-info"
                                                onclick="jQuery('#user-form').attr('action', '{{ $router->html('social_login', array('provider' => 'twitter')) }}')">
                                                Twitter
                                            </button>
                                        </p>
                                    @endif

                                    @if ($app->get('social_login.google.enabled'))
                                        <p>
                                            <button class="social-login-google-button btn btn-danger"
                                                onclick="jQuery('#user-form').attr('action', '{{ $router->html('social_login', array('provider' => 'google')) }}')">
                                                Google
                                            </button>
                                        </p>
                                    @endif

                                    @if ($app->get('social_login.yahoo.enabled'))
                                        <p>
                                            <button class="social-login-yahoo-button btn btn-success"
                                                style="background-color: #514099; border-color: #514099"
                                                onclick="jQuery('#user-form').attr('action', '{{ $router->html('social_login', array('provider' => 'yahoo')) }}')">
                                                Yahoo
                                            </button>
                                        </p>
                                    @endif

                                    @if ($app->get('social_login.github.enabled'))
                                        <p>
                                            <button class="social-login-github-button btn btn-success"
                                                style="background-color: #111; border-color: #111"
                                                onclick="jQuery('#user-form').attr('action', '{{ $router->html('social_login', array('provider' => 'github')) }}')">
                                                GitHub
                                            </button>
                                        </p>
                                    @endif
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="hidden-inputs">
                        {!! \Windwalker\Core\Security\CsrfProtection::input() !!}
                    </div>
                </form>
            @show

        </div>
    </div>
@stop
