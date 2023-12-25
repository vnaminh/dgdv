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
            @if ($errors->toArray() != null)
                <div class="alert alert-danger pt-6 pb-6">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <div class="card-title">
                <h3 class="card-label"></h3>
            </div>
            <div>
                <a class="btn btn-primary" href="{{ route('tukiemdiemManage.formTuKiemDiem') }}">
                    Tự Đánh Giá
                </a>
                @if (session()->get('quyen')==3)
                    &ensp;
                    <a class="btn btn-success mb-1" target="_blank"
                        href="{{ route('formPDF.form6') }}">
                        Xuất PDF - Form 6
                    </a>
                @endif
            </div>
        </div>
        <hr>
        <div class="card-body">
            <div align="right">
                Tải về file PDF cho các đảng viên đã chọn:
                <input class="btn btn-sm btn-success" type="button" onclick="clicksubmitbutton()" value="download"/>
            </div>
            <hr>
            <div>
                <div class="overflow">
                    <form action="{{ route('formPDF.downloadform2') }}" method="POST" id="downloadform2">
                        @csrf
                    <table class="table table-sm table-bordered table-hover table-checkable" id="dstukiemdiem">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center"><input type="checkbox" id="checkall"/></th>
                                <th class="text-center">STT</th>
                                <th class="text-center">Mã cán bộ</th>
                                <th class="text-center">Tên Đảng viên</th>
                                <th class="text-center">Đánh giá của Đoàn Thanh niên (nếu có)</th>
                                <th class="text-center">Đánh giá của Công Đoàn</th>
                                <th class="text-center">Tự nhận mức xếp loại cán bộ</th>
                                <th class="text-center">Tự nhận mức xếp loại Đảng viên</th>
                                <th class="text-center">Lãnh đạo đơn vị đánh giá</th>
                                <th class="text-center">Chi bộ đánh giá</th>
                                <th class="text-center">Chi uỷ đánh giá</th>
                                <th class="text-center">Đánh giá</th>
                                <th class="text-center">File</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datatukiemdiem as $item => $dv)
                                <tr onclick="selectRow(this)">
                                    @php
                                        $danhgiadv = ['Xuất sắc', 'Tốt', 'Trung bình', 'Kém'];
                                        $danhgia = ['HT xuất sắc', 'HT tốt', 'Hoàn thành', 'Không hoàn thành'];
                                    @endphp
                                    <td class="text-center"><input type="checkbox" name="check[]" value="{{ $dv->user_id }}"/></td>
                                    <td class="text-center font-weight-bold">{{ $item + 1 }}</td>
                                    <td>{{ $datatukiemdiem[$item]->user_ma }}</td>
                                    <td>{{ $datatukiemdiem[$item]->user_ho_ten }}</td>
                                    <td>
                                        @if ($dv->form_tu_kiem_diem_doan_thanh_nien_danh_gia == null)
                                            <span class="text-red">Chưa đánh giá</span>
                                        @else
                                            {{ $danhgia[$dv->form_tu_kiem_diem_doan_thanh_nien_danh_gia - 1] }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($dv->form_tu_kiem_diem_cong_doan_danh_gia == null)
                                            <span class="text-red">Chưa đánh giá</span>
                                        @else
                                            {{ $danhgia[$dv->form_tu_kiem_diem_cong_doan_danh_gia - 1] }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($dv->tu_nhan_muc_xl_can_bo == null)
                                            <span class="text-red">Chưa đánh giá</span>
                                        @else
                                            {{ $danhgia[$dv->tu_nhan_muc_xl_can_bo - 1] }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($dv->tu_nhan_muc_xl_dang_vien == null)
                                            <span class="text-red">Chưa đánh giá</span>
                                        @else
                                            {{ $danhgia[$dv->tu_nhan_muc_xl_dang_vien - 1] }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($dv->lanh_dao_don_vi_danh_gia == null)
                                            <span class="text-red">Chưa đánh giá</span>
                                        @else
                                            {{ $danhgia[$dv->lanh_dao_don_vi_danh_gia - 1] }}
                                        @endif
                                    <td>
                                        @if ($dv->chi_bo_danh_gia == null)
                                            <span class="text-red">Chưa đánh giá</span>
                                        @else
                                            {{ $danhgia[$dv->chi_bo_danh_gia - 1] }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($dv->chi_uy_danh_gia == null)
                                            <span class="text-red">Chưa đánh giá</span>
                                        @else
                                            {{ $danhgia[$dv->chi_uy_danh_gia - 1] }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($datatukiemdiem[$item]->user_id == session('user_id'))
                                            <a class="btn btn-sm {{ $datastatus[$item] == 1 ? 'btn-primary' : 'btn-warning' }}"
                                            href="{{ route('tukiemdiemManage.formTuKiemDiem') }}">
                                                Đánh giá
                                        </a>
                                        @else
                                            <a class="btn btn-sm {{ $datastatus[$item] == 1 ? 'btn-primary' : 'btn-warning' }}"
                                                href="{{ route('tukiemdiemManage.dgTuKiemDiem', ['user_id' => $datatukiemdiem[$item]->user_id]) }}">
                                                Đánh giá
                                            </a>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-success mb-1" target="_blank"
                                            href="{{ route('formPDF.form2', ['user_id' => $dv->user_id]) }}">Xuất
                                            File PDF</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <input id="submit" style="display: none" type="submit" value="dl">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/pages/crud/datatables/tukiemdiem.js') }}" type="text/javascript"></script>
    <script>
        // Chức năng chọn hết
        document.getElementById("checkall").onclick = function ()
            {
                // Lấy danh sách checkbox
                var checkboxes = document.getElementsByName('check[]');
                // Lặp và thiết lập checked
                if (this.checked) {
                    for (var i = 0; i < checkboxes.length; i++){
                        checkboxes[i].checked = true;
                    }
                } else {
                    for (var i = 0; i < checkboxes.length; i++){
                        checkboxes[i].checked = false;
                    }
                }
            };
        // Chọn checkbox theo hàng
        function selectRow(row)
        {
            var firstInput = row.getElementsByTagName('input')[0];
            firstInput.checked = !firstInput.checked;
        }

        // Click submit
        function clicksubmitbutton() {
            if (document.getElementById('submit') != "")
                document.getElementById('submit').click();
        }
    </script>
@endsection
