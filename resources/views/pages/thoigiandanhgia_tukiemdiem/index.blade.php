@extends('layout.default')
@section('content')
    <div class="card card-custom">
        @if (session('success'))
            <div class="alert alert-success">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Danh sách</h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ route('thoigiandanhgiaManage.edit') }}" class="btn btn-primary font-weight-bolder">
                    Chỉnh sửa
                </a>
                <!--end::Button-->
            </div>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-bordered table-hover table-checkable" id="dsthoigiandanhgiatukiemdiem">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">{{ __('STT') }}</th>
                        <th class="text-center">{{ __('Loại đánh giá') }}</th>
                        <th class="text-center">{{ __('Thời hạn đánh giá') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td>Đảng viên</td>
                        @if ($data != null)
                            <td class="text-center">{{ $data->thoi_gian_danh_gia_tu_kiem_diem_dang_vien }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td>Lãnh đạo đơn vị</td>
                        @if ($data != null)
                            <td class="text-center">{{ $data->thoi_gian_danh_gia_tu_kiem_diem_lanh_dao_don_vi }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="text-center">3</td>
                        <td>Chi bộ</td>
                        @if ($data != null)
                            <td class="text-center">{{ $data->thoi_gian_danh_gia_tu_kiem_diem_chi_bo }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="text-center">4</td>
                        <td>Chi uỷ</td>
                        @if ($data != null)
                            <td class="text-center">{{ $data->thoi_gian_danh_gia_tu_kiem_diem_chi_uy }}</td>
                        @endif
                    </tr>
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/pages/crud/datatables/thoigiandanhgiatukiemdiem.js') }}"></script>
@endsection
