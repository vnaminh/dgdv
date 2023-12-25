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
                <a href="{{ route('userManage.createUser') }}" class="btn btn-primary font-weight-bolder">
                    <span class="flaticon2-add-1 icon-md"></span> {{ __('Thêm mới') }}</a>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-checkable" id="danhSachNguoiDung">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">{{ __('STT') }}</th>
                        <th class="text-center">{{ __('ID') }}</th>
                        <th class="text-center">{{ __('Mã Cán Bộ') }}</th>
                        <th class="text-center">{{ __('Họ Tên') }}</th>
                        <th class="text-center">{{ __('Chi Bộ') }}</th>
                        <th class="text-center">{{ __('Ngày Sinh') }}</th>
                        <th class="text-center">{{ __('Giới Tính') }}</th>
                        <th class="text-center">{{ __('Chức Vụ Đảng') }}</th>
                        <th class="text-center">{{ __('Chức Vụ Chính Quyền') }}</th>
                        <th class="text-center">{{ __('Chức Vụ Đoàn Thể') }}</th>
                        <th class="text-center">{{ __('Đơn Vị Công Tác') }}</th>
                        <th class="text-center">{{ __('Thao Tác') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item => $value)
                        <tr>
                            <td class="text-center font-weight-bold">{{ $item + 1 }}</td>
                            <td>{{ $value->user_id }}</td>
                            <td>{{ $value->user_ma }}</td>
                            <td>{{ $value->user_ho_ten }}</td>
                            <td>{{ $value->chi_bo }}</td>
                            <td>{{ $value->user_ngay_sinh }}</td>
                            <td>{{ $value->user_gioi_tinh }}</td>
                            <td>{{ $value->chuc_vu_dang }}</td>
                            <td class="text-center">{{ $value->chuc_vu_chinh_quyen }}</td>
                            <td>{{ $value->chuc_vu_doan_the }}</td>
                            <td>
                                {{ $value->don_vi_cong_tac }}
                            </td>
                            <td>
                                <table>
                                    <tr>
                                        <td class="border-0 pt-0 pb-0">
                                            <a href="{{ route('userManage.editUser', ['user_id' => $value->user_id]) }}"
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
