@extends('layout.default')
@section('css')
    <style>
        .table>thead,
        td {
            vertical-align: middle !important;
        }

        .text-red {
            color: red;
        }
    </style>
@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label"></h3>
            </div>
            <div>
                <a class="btn btn-primary" href="{{ route('camketManage.indexCamKet', [session()->get('user_id')]) }}">
                    Cam kết
                </a>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <div>
                {{-- <div class="align-center">
                    <h4>Danh sách Đảng viên cam kết <a class="btn btn-primary"
                            href="{{ route('formPDF.form6') }}">Form6.pdf</a></h4>
                </div> --}}
                <div class="overflow">
                    <table class="table table-sm table-bordered table-hover table-checkable" id="dscamket">
                        <thead class="text-center">
                            <tr>
                                <th>STT</th>
                                <th>Mã cán bộ</th>
                                <th>Tên Đảng viên</th>
                                <th>Đánh giá</th>
                                <th>File Excel</th>
                                <th>File Word</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($datacamket as $item => $dv)
                                <tr>
                                    @php
                                        $danhgiadv = ['Xuất sắc', 'Tốt', 'Trung bình', 'Kém'];
                                        $danhgia = ['HT xuất sắc', 'HT tốt', 'Hoàn thành', 'Không hoàn thành'];
                                    @endphp
                                    <td>{{ $item + 1 }}</td>
                                    <td>{{ $datacamket[$item]->user_ma }}</td>
                                    <td>{{ $datacamket[$item]->user_ho_ten }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('camketManage.indexCamKet', ['user_id' => $datacamket[$item]->user_id]) }}">
                                            Chỉnh Sửa
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-success mb-1" target="_blank"
                                            href="{{ route('formPDF.formcamket', ['user_id' => $dv->user_id]) }}">Xuất
                                            File PDF</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-success mb-1" target="_blank"
                                            href="{{ route('formWORD.formcamketword', ['user_id' => $dv->user_id]) }}">Xuất
                                            File Word</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/pages/crud/datatables/camket.js') }}" type="text/javascript"></script>
@endsection
