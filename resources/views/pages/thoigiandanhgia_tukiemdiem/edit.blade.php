@extends('layout.default')
@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            @include('layout.base._pagename')
        </div>
        <div class="card-body">
            <form class="form" action="{{ route('thoigiandanhgiaManage.update') }}" method="POST" id="tgdgformedit">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT" />
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-8">
                        <div class="my-5">
                            <div class="form-group row">
                                <label class="col-3">
                                    Hạn đánh giá của Đảng viên
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-6">
                                    <input type="date" id="thoigiandanhgiadangvien" name="thoigiandanhgiadangvien" class="form-control"
                                        value="{{ $data->thoi_gian_danh_gia_tu_kiem_diem_dang_vien }}" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">
                                    Hạn đánh giá của Lãnh đạo đơn vị
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-6">
                                    <input type="date" id="thoigiandanhgialanhdao" name="thoigiandanhgialanhdao" class="form-control"
                                        value="{{ $data->thoi_gian_danh_gia_tu_kiem_diem_lanh_dao_don_vi }}" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">
                                    Hạn đánh giá của Chi bộ
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-6">
                                    <input type="date" id="thoigiandanhgiachibo" name="thoigiandanhgiachibo" class="form-control"
                                        value="{{ $data->thoi_gian_danh_gia_tu_kiem_diem_chi_bo }}" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">
                                    Hạn đánh giá của Chi uỷ
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-6">
                                    <input type="date" id="thoigiandanhgiachiuy" name="thoigiandanhgiachiuy" class="form-control"
                                        value="{{ $data->thoi_gian_danh_gia_tu_kiem_diem_chi_uy }}" required />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-toolbar">
                            <a href="{{ route('thoigiandanhgiaManage.index') }}" @include('layout.base._button_back')
                            </a>
                            <div class="btn-group">
                                @include('layout.base._button_save')
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
