@extends('layout.default')
@section('content')
    <div class="card card-custom">
        <div class="card-body">
            <div>
                <div class="align-center">
                    <form class="form" action="{{ route('userManage.updateUser', ['user_id' => $info->user_id]) }}"
                        method="post" id="userformedit">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT" />
                        <div class="form-outline mb-4">
                            <input type="text" id="hoten" name="hoten" value="{{ $info->user_ho_ten }}"
                                class="form-control" />
                            <label class="form-label" for="hoten">Họ và Tên</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="userma" name="userma" value="{{ $info->user_ma }}"
                                class="form-control" />
                            <label class="form-label" for="userma">Mã Cán Bộ</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="ngaysinh" name="ngaysinh" value="{{ $info->user_ngay_sinh }}"
                                class="form-control" />
                            <label class="form-label" for="ngaysinh">Ngày Sinh</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="gioitinh" name="gioitinh" value="{{ $info->user_gioi_tinh }}"
                                class="form-control" />
                            <label class="form-label" for="gioitinh">Giới Tính</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="chibo" name="chibo" value="{{ $info->chi_bo }}"
                                class="form-control" />
                            <label class="form-label" for="chibo">Chi bộ</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="chucvudang" name="chucvudang" value="{{ $info->chuc_vu_dang }}"
                                class="form-control" />
                            <label class="form-label" for="chucvudang">Chức vụ Đảng</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="chucvuchinhquyen" name="chucvuchinhquyen"
                                value="{{ $info->chuc_vu_chinh_quyen }}" class="form-control" />
                            <label class="form-label" for="chucvuchinhquyen">Chức vụ chính quyền</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="chucvudoanthe" name="chucvudoanthe"
                                value="{{ $info->chuc_vu_doan_the }}" class="form-control" />
                            <label class="form-label" for="chucvudoanthe">Chức vụ đoàn thể</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="donvicongtac" name="donvicongtac" value="{{ $info->don_vi_cong_tac }}"
                                class="form-control" />
                            <label class="form-label" for="donvicongtac">Đơn vị công tác</label>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
