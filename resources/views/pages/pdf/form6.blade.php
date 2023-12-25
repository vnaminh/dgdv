<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html" />
    <title>Form6</title>
    <style>
        body {
            font-size: 14px;
        }

        table {
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
        }

        #table2 {
            font-size: 12px;
        }
    </style>
</head>

<body style="font-family: DejaVu Sans">
    <div style="margin: 10px 30px 10px 30px;display: block;">
        <table border="0" width="100%">
            <tr>
                <td width="50%">
                    ĐẢNG BỘ ĐẠI HỌC CẦN THƠ<br />
                    <b>Đảng bộ, chi bộ:.................................</b>
                </td>
                <td width="50%" style="text-align: center">
                    <p>
                        <strong>
                            <u>ĐẢNG CỘNG SẢN VIỆT NAM</u>
                        </strong><br>
                    </p>
                    <i>.........,ngày {{ $day }} tháng {{ $month }} năm {{ $year }}</i>
                </td>
            </tr>
        </table>
        <br>
        <div align="center">
            <div style="font-size: 16px">TỔNG HỢP ĐỀ XUẤT MỨC CHẤT LƯỢNG<br>ĐẢNG VIÊN CỦA CÁC CHỦ THỂ NĂM {{ $year }}</div>
            <div>-----</div>
        </div>
        <br>
        <table id="table2" border="1" style="border-collapse: collapse;">
            <thead>
                <tr>
                    <th>STT</th>
                    <th width="150px">Họ và tên Đảng viên</th>
                    <th>MSVC/MSSV</th>
                    {{-- <th>Đánh giá của Đoàn Thanh niên (nếu có)</th> --}}
                    {{-- <th>Đánh giá của Công Đoàn</th> --}}
                    <th>Đảng viên tự đánh giá, xếp loại</th>
                    <th>Đánh giá, xếp loại, viên chức, người lao động (Nếu là VC-NLĐ)</th>
                    {{-- <th>Lãnh đạo đơn vị đánh giá</th> --}}
                    <th>Chi uỷ đánh giá</th>
                    <th>Tập thể lãnh đạo đoàn thể mà đảng viên là thành viên lãnh đạo</th>
                    <th>Chi bộ đánh giá</th>
                    <th width="50px">Ghi chú</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datatukiemdiem as $item => $dv)
                    <tr>
                        @php
                            $danhgiadv = ['Xuất sắc', 'Tốt', 'Trung bình', 'Kém'];
                            $danhgia = ['HTXSNV', 'HTTNV', 'HTNV', 'KHTNV'];
                        @endphp
                        <td>{{ $item + 1 }}</td>
                        <td>{{ $datatukiemdiem[$item]->user_ho_ten }}</td>
                        <td>{{ $datatukiemdiem[$item]->user_ma }}</td>
                        {{-- <td>{{ $dv->form_tu_kiem_diem_doan_thanh_nien_danh_gia == null ? '' : $danhgia[$dv->form_tu_kiem_diem_doan_thanh_nien_danh_gia - 1] }}
                        </td> --}}
                        {{-- <td>{{ $dv->form_tu_kiem_diem_cong_doan_danh_gia == null ? '' : $danhgia[$dv->form_tu_kiem_diem_cong_doan_danh_gia - 1] }}
                        </td> --}}
                        <td>{{ $dv->tu_nhan_muc_xl_dang_vien == null ? '' : $danhgia[$dv->tu_nhan_muc_xl_dang_vien - 1] }}
                        </td>
                        <td>{{ $dv->tu_nhan_muc_xl_can_bo == null ? '' : $danhgia[$dv->tu_nhan_muc_xl_can_bo - 1] }}
                        </td>
                        {{-- <td>{{ $dv->lanh_dao_don_vi_danh_gia == null ? '' : $danhgia[$dv->lanh_dao_don_vi_danh_gia - 1] }}
                        </td> --}}
                        <td>{{ $dv->chi_uy_danh_gia == null ? '' : $danhgia[$dv->chi_uy_danh_gia - 1] }}
                        </td>
                        <td></td>
                        <td>{{ $dv->chi_bo_danh_gia == null ? '' : $danhgia[$dv->chi_bo_danh_gia - 1] }}
                        </td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br />
        <div align="right" style="padding-bottom: 120px">
            <div>
                <div style="padding-right: 40px">
                    <b> T/M ĐẢNG BỘ/CHI UỶ (CHI BỘ)
                    </b>
                </div>
                <div style="padding-right: 150px">
                    BÍ THƯ
                </div>
                <div style="padding-right: 105px">
                    <i>(ký, ghi rõ họ tên)</i>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
