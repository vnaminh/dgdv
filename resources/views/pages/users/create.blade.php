@extends('layout.default')
@section('content')
    <div class="card card-custom">
        <div class="card-body">
            <div>
                <div class="align-center">
                    <form class="form" action="{{ route('userManage.storeUser') }}" method="post" id="userform">
                        {{ csrf_field() }}
                        <input type="text" id="user_id" name="user_id" class="form-control" />
                        <div class="form-outline mb-4">
                            <input type="text" id="hoten" name="hoten" class="form-control" />
                            <label class="form-label" for="hoten">Họ và Tên</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="userma" name="userma" class="form-control" />
                            <label class="form-label" for="userma">Mã Cán Bộ</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="ngaysinh" name="ngaysinh" class="form-control" />
                            <label class="form-label" for="ngaysinh">Ngày Sinh</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="gioitinh" name="gioitinh" class="form-control" />
                            <label class="form-label" for="gioitinh">Giới Tính</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="chibo" name="chibo" class="form-control" />
                            <label class="form-label" for="chibo">Chi bộ</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="chucvudang" name="chucvudang" class="form-control" />
                            <label class="form-label" for="chucvudang">Chức vụ Đảng</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="chucvuchinhquyen" name="chucvuchinhquyen" class="form-control" />
                            <label class="form-label" for="chucvuchinhquyen">Chức vụ chính quyền</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="chucvudoanthe" name="chucvudoanthe" class="form-control" />
                            <label class="form-label" for="chucvudoanthe">Chức vụ đoàn thể</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="donvicongtac" name="donvicongtac" class="form-control" />
                            <label class="form-label" for="donvicongtac">Đơn vị công tác</label>
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
