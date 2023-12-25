@extends('layout.default')
@section('content')
    <div class="card card-custom">
        @if (session('success'))
            <div class="alert alert-success">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            {{-- @include('layout.base._pagename') --}}
            <div class="card-toolbar">
                <a href="{{ route('tieuchidanhgiataptheManage.createTieuChiDanhGiaTapThe') }}" class="btn btn-primary font-weight-bolder">
                    <span class="flaticon2-add-1 icon-md"></span> {{ __('Thêm mới') }}</a>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-checkable" id="danhSachCapDoDanhGia">
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
                            <td>{{ $value->tieu_chi_danh_gia_tap_the_id }}</td>
                            <td>{{ $value->tieu_chi_danh_gia_tap_the_noi_dung }}</td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-icon {{ $value->tieu_chi_danh_gia_tap_the_active == 1 ? 'btn-active' : 'btn-inactive' }}"
                                    href="{{ route('tieuchidanhgiataptheManage.changeActive', ['tieu_chi_danh_gia_tap_the_id' => $value->tieu_chi_danh_gia_tap_the_id]) }}">
                                    {{ $value->tieu_chi_danh_gia_tap_the_active==1?"Active":"Inactive" }}</td>
                                </a>
                            <td class="text-center">{{ $value->tieu_chi_danh_gia_tap_the_noi_dung_active==1?"Active":"Inactive" }}</td>
                            <td class="text-center">{{ $value->tieu_chi_danh_gia_tap_the_danh_gia_active==1?"Active":"Inactive" }}</td>
                            <td class="text-center">
                                <table>
                                    <tr>
                                        <td class="border-0 pt-0 pb-0">
                                            <a href="{{ route('tieuchidanhgiataptheManage.editTieuChiDanhGiaTapThe', ['tieu_chi_danh_gia_tap_the_id' => $value->tieu_chi_danh_gia_tap_the_id]) }}"
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
