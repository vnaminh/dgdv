@extends('layout.default')
@section('content')
    <div class="card card-custom">
        <div class="card-body">
            <div>
                <div class="align-center">
                    <form class="form" action="{{ route('capdodanhgiaManage.updateCapDoDanhGia', ['cap_do_danh_gia_id' => $info->cap_do_danh_gia_id]) }}"
                        method="post" id="userformedit">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT" />
                        <div class="form-outline mb-4">
                            <input type="text" id="ten" name="ten" value="{{ $info->cap_do_danh_gia_ten }}"
                                class="form-control" />
                            <label class="form-label" for="ten">Tên Cấp Độ Đánh Giá</label>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
