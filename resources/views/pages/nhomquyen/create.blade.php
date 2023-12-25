@extends('layout.default')
@section('content')
    <div class="card card-custom">
        <div class="card-body">

            <div class="row">
                <div class="col-6">
            <form class="form" action="{{ route('nhomquyenManage.storeNhomQuyen') }}" method="post" id="nhomquyenform">
                {{ csrf_field() }}
                <div class="form-outline mb-4">
                    <input type="text" id="ten" name="ten" class="form-control" />
                    <label class="form-label" for="ten">Tên</label>
                </div>
                <div class="form-outline mb-4">
                    <input type="text" id="level" name="level" class="form-control" />
                    <label class="form-label" for="level">Cấp</label>
                </div>
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block">Lưu</button>
            </form>
            </div>
            </div>
        </div>
    </div>
@endsection
