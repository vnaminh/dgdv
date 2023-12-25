@extends('layout.default')
@section('content')
    <div class="card card-custom">
        <div class="card-body">
            <div>
                <div class="align-center">
                    <form class="form" action="{{ route('phanquyendanhgiataptheManage.storePhanQuyenDanhGiaTapThe') }}" method="post" id="phanquyendanhgiataptheform">
                        {{ csrf_field() }}
                        <div class="form-outline mb-4">
                            <label class="visually-hidden" for="user_id">Preference</label>
                            <select class="form-select" name="user_id" id="user_id">
                                <option value="" disabled selected>Tài khoản</option>
                                @foreach ($datauser_ as $item => $value)
                                    <option value="{{ $value->user_id }}">ID:{{ $value->user_id }}; Tên: {{ $value->user_ten }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-outline mb-4">
                            <label class="visually-hidden" for="nhomtaptheid">Preference</label>
                            <select class="form-select" name="nhomtaptheid" id="nhomtaptheid">
                                <option value="" disabled selected>Nhóm tập thể id</option>

                                @foreach ($datanhom as $item => $value)
                                    <option value="{{ $value->nhom_tap_the_id }}">ID: {{ $value->nhom_tap_the_id }}; Tên nhóm: {{ $value->nhom_tap_the_ten }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Submit button -->
                        <div class="align-center">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
