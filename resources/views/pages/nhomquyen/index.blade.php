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
                <a href="{{ route('nhomquyenManage.createNhomQuyen') }}" class="btn btn-primary font-weight-bolder">
                    <span class="flaticon2-add-1 icon-md"></span> {{ __('Thêm mới') }}</a>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-checkable" id="danhSachNhomQuyen">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">{{ __('stt') }}</th>
                        <th class="text-center">{{ __('ID') }}</th>
                        <th class="text-center">{{ __('Tên') }}</th>
                        <th class="text-center">{{ __('Cấp') }}</th>
                        <th class="text-center">{{ __('Thao Tác') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item => $value)
                        <tr>
                            <td class="text-center font-weight-bold">{{ $item + 1 }}</td>
                            <td>{{ $value->nhom_quyen_id }}</td>
                            <td>{{ $value->nhom_quyen_ten }}</td>
                            <td>{{ $value->nhom_quyen_level }}</td>
                            <td>
                                <table>
                                    <tr>
                                        <td class="border-0 pt-0 pb-0">
                                            <a href="{{ route('nhomquyenManage.editNhomQuyen', ['nhom_quyen_id' => $value->nhom_quyen_id]) }}"
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
    <script>
        $(document).ready(function() {
            $('#danhSachNhomQuyen').DataTable();
        });
    </script>
@endsection
