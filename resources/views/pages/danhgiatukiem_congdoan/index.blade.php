@extends('layout.default')
@section('styles')
    <style>
        .danh-gia-cap-do {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            align-content: center;
        }
    </style>
@endsection
@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            {{-- @include('layout.base._pagename') --}}
            <div class="card-title">
                <h3 class="card-label">Danh sách Đảng viên</h3>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div>
                {{-- {{ dd($datadoanthanhniendanhgia) }} --}}
                <div>
                    <form id="congdoandanhgia" method="POST" action="{{ route('congdoanManage.updatecongdoan_danhgia') }}">
                        @csrf

                        <table class="table table-sm table-bordered table-hover table-checkable" id="dscongdoan">
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>Mã cán bộ</th>
                                    <th>Tên Đảng viên</th>
                                    <th>Đánh giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- {{ dd($datadoanthanhniendanhgia) }} --}}

                                @foreach ($datacongdoandanhgia as $item => $dv)
                                    <tr>
                                        <td>{{ $item + 1 }}</td>
                                        <td>{{ $dv->user_ma }}</td>
                                        <td>{{ $dv->user_ho_ten }}</td>
                                        <td class="danh-gia-cap-do">
                                            <span>
                                                @php
                                                    $check = $dv->form_tu_kiem_diem_cong_doan_danh_gia;
                                                @endphp
                                                <input type="radio" name="{{ $dv->user_id }}" value="1"
                                                    {{ $check == 1 ? 'checked' : '' }} /> Xuất sắc
                                            </span>
                                            <span>
                                                <input type="radio" name="{{ $dv->user_id }}" value="2"
                                                    {{ $check == 2 ? 'checked' : '' }} /> Tốt
                                            </span>
                                            <span>
                                                <input type="radio" name="{{ $dv->user_id }}" value="3"
                                                    {{ $check == 3 ? 'checked' : '' }} /> Trung bình
                                            </span>
                                            <span>
                                                <input type="radio" name="{{ $dv->user_id }}" value="4"
                                                    {{ $check == 4 ? 'checked' : '' }} /> Kém
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <div class="modal-footer">
                            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                <div class="card-toolbar">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-primary font-weight-bolder">
                                            <i class="flaticon2-checkmark icon-sm"></i>{{ __('luu') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js\pages\crud\datatables\congdoan.js') }}" type="text/javascript"></script>
@endsection
