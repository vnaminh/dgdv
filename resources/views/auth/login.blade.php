@extends('layout.login')

@section('content')

    <body id="kt_body"
        class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
        <!-- Google Tag Manager (noscript) -->
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
                style="display:none;visibility:hidden"></iframe>
        </noscript>
        <!-- End Google Tag Manager (noscript) -->
        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Login-->
            <div class="login login-3 login-signin-on d-flex flex-row-fluid" id="kt_login">
                <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid"
                    style="background-image: url({{ asset('media/bg/bg-1.jpg') }});">
                    <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
                        <!--begin::Login Header-->
                        {{--                    <div class="d-flex flex-center mb-15"> --}}
                        {{--                        <a href="#"> --}}
                        {{--                            <img src="media/logos/logo-letter-9.png" class="max-h-100px" alt="" /> --}}
                        {{--                        </a> --}}
                        {{--                    </div> --}}
                        <!--end::Login Header-->
                        <!--begin::Login Sign in form-->
                        <form method="POST" action="{{ route('auto-login') }}">
                            {{ csrf_field() }}
                            <div class="login-signin">
                                <div class="mb-20">
                                    <h3>Đăng nhập</h3>
                                    <p class="opacity-60 font-weight-bold">Nhập thông tin đăng nhập vào tài khoản:</p>
                                </div>
                                <form class="form" id="kt_login_signin_form">
                                    <div class="form-group">
                                        <input
                                            class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5"
                                            type="text" placeholder="Tài khoản" name="user_name" id="user_name"
                                            autocomplete="off" autofocus />
                                        @if ($errors->has('user_name'))
                                            <span
                                                class="form-text text-danger text-left pl-8">{{ $errors->first('user_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input
                                            class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5"
                                            type="password" placeholder="Mật khẩu" name="password" id="password" />
                                        @if ($errors->has('password'))
                                            <span
                                                class="form-text text-danger text-left pl-8">{{ $errors->first('password') }}</span>
                                            {{--                                        <span class="invalid-feedback" role="alert"> --}}
                                            {{--                                            <strong>{{ $errors->first('password') }}</strong> --}}
                                            {{--                                        </span> --}}
                                        @endif
                                    </div>
                                    <div class="form-group text-center mt-10">
                                        <button id="submit"
                                            class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3">
                                            Đăng nhập
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </form>
                        <!--end::Login Sign in form-->
                    </div>
                </div>
            </div>
            <!--end::Login-->
        </div>
        <!--end::Main-->
    </body>
@endsection

@section('scripts')
    {{-- page scripts --}}
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";

            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;

                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;

                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>
@endsection
