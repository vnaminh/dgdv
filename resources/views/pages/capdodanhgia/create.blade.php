@extends('layout.default')
@section('content')
    <div class="card card-custom">
        <div class="card-body">
            <div>
                <div class="align-center">
                    <form class="form" action="{{ route('capdodanhgiaManage.storeCapDoDanhGia') }}" method="post" id="capdodanhgiaform">
                        {{ csrf_field() }}
                        <div class="form-outline mb-4">
                            <input type="text" id="ten" name="ten" class="form-control" />
                            <label class="form-label" for="ten">Tên Cấp Độ Đánh Giá</label>
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
