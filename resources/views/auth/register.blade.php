@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nv_tu_dien_nhan_vien_ten" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="nv_tu_dien_nhan_vien_ten" type="text" class="form-control{{ $errors->has('nv_tu_dien_nhan_vien_ten') ? ' is-invalid' : '' }}" name="nv_tu_dien_nhan_vien_ten" value="{{ old('nv_tu_dien_nhan_vien_ten') }}" required autofocus>

                                @if ($errors->has('nv_tu_dien_nhan_vien_ten'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nv_tu_dien_nhan_vien_ten') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nv_tu_dien_nhan_vien_user" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="nv_tu_dien_nhan_vien_user" type="text" class="form-control{{ $errors->has('nv_tu_dien_nhan_vien_user') ? ' is-invalid' : '' }}" name="nv_tu_dien_nhan_vien_user" value="{{ old('nv_tu_dien_nhan_vien_user') }}" required>

                                @if ($errors->has('nv_tu_dien_nhan_vien_user'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nv_tu_dien_nhan_vien_user') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
