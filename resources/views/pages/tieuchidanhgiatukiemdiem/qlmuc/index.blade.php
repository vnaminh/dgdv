@extends('layout.default')
@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-tiltle">
                <h3 class="card-lable">
                    Danh sách
                </h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ route('tieuchidanhgiatukiemmucManage.create') }}"
                    class="btn btn-primary font-weight-bolder">
                    <span class="flaticon2-add-1 icon-md"></span> {{ __('Thêm mới') }}</a>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success pt-6 pb-6">
                    <div>{{ session('success') }}</div>
                </div>
            @endif
            <table class="table table-bordered table-hover table-checkable" id="danhsachmuctieuchidanhgiatukiem">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">{{ __('STT') }}</th>
                        <th class="text-center">{{ __('ID') }}</th>
                        <th class="text-center">{{ __('Nội Dung Tiêu Chí') }}</th>
                        <th class="text-center">{{ __('Trạng Thái') }}</th>
                        <th class="text-center">{{ __('Trạng Thái Của Nội Dung') }}</th>
                        <th class="text-center">{{ __('Trạng Thái Của Đánh Giá') }}</th>
                        <th class="text-center">{{ __('Thao Tác') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item => $value)
                        <tr>
                            <td class="text-center font-weight-bold">{{ $item + 1 }}</td>
                            <td>{{ $value->tieu_chi_danh_gia_tu_kiem_diem_muc_id }}</td>
                            <td>{{ $value->tieu_chi_danh_gia_tu_kiem_diem_muc_ten }}</td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-icon"
                                    href="{{ route('tieuchidanhgiatukiemmucManage.changeActive', ['id' => $value->tieu_chi_danh_gia_tu_kiem_diem_muc_id]) }}">
                                    {{ $value->tieu_chi_danh_gia_tu_kiem_diem_muc_active }}
                                </a>
                            </td>
                            <td class="text-center">{{ $value->has_noi_dung }}</td>
                            <td class="text-center">{{ $value->has_danh_gia }}</td>
                            <td class="text-center">
                                <table>
                                    <tr>
                                        <td class="border-0 pt-0 pb-0">
                                            <a href="{{ route('tieuchidanhgiatukiemmucManage.edit', ['id' => $value->tieu_chi_danh_gia_tu_kiem_diem_muc_id]) }}"
                                                class="btn btn-sm btn-clean btn-icon" title="{{ __('cap_nhat') }}">
                                                Chỉnh Sửa
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
@endsection
