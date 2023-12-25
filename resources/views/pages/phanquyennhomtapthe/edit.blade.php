@extends('layout.default')
@section('content')
    <div class="card card-custom">
        <div class="card-body">
            <div>
                <div class="align-center">
                    <form class="form" action="{{ route('phanquyendanhgiataptheManage.updatePhanQuyenDanhGiaTapThe', ['phan_quyen_danh_gia_tap_the_id' => $info->phan_quyen_danh_gia_tap_the_id]) }}"
                        method="post" id="phanquyenformedit">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT" />
                        <div class="form-outline mb-4">
                            <label class="visually-hidden" for="user_id">Preference</label>
                            <select class="form-select" name="user_id" id="user_id" >
                                <option value="{{ $infouser_->user_id }}">ID:{{ $infouser_->user_id }}; Tên: {{ $infouser_->user_ten }}</option>
                                @foreach ($datauser_ as $item => $value)
                                    <option value="{{ $value->user_id }}">ID:{{ $value->user_id }}; Tên: {{ $value->user_ten }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-outline mb-4">
                            <label class="visually-hidden" for="nhomtaptheid">Preference</label>
                            <select class="form-select" name="nhomtaptheid" id="nhomtaptheid">
                                <option value="{{ $infonhom->nhom_tap_the_id }}">ID: {{ $infonhom->nhom_quyen_id }}; Tên nhóm: {{ $infonhom->nhom_tap_the_ten }}</option>

                                @foreach ($datanhom as $item => $value)
                                    <option value="{{ $value->nhom_tap_the_id }}">ID: {{ $value->nhom_tap_the_id }}; Tên nhóm: {{ $value->nhom_tap_the_ten }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
