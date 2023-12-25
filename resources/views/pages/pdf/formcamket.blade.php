<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html" />
    <title>{{ $title }}</title>
    <style>

        @font-face {
            font-family: 'Times New Roman';
            src: url('../../../css/fonts/Times-Roman.ttf') format('truetype');
            font-weight: 300;
            font-style: normal;
        }

        th,
        td {
            padding: 5px;
        }

        body {
            font-size: 14px !important;
            font-family: DejaVu Sans;
            /* font-family: Times New Roman; */
        }

        .text-center {
            text-align: center;
        }

        .border {
            border: 0.5px solid black;
        }

        .box {
            height: 17px;
            /* line-height: 17px; */
            width: 100%;
            border: 0.5px solid black;
        }

        .kyten {
            margin: auto;
        }
    </style>
</head>

<body>
    <div style="margin: 10px 30px 10px 30px; display: block;">
        <table border="0" width="100%">
            <tr>
                <td>
                    ĐẢNG BỘ:...................................<br />
                    <b>CHI BỘ:.................................</b>
                </td>
                <td style="text-align: center">
                    <p>
                        <strong>
                            <u>ĐẢNG CỘNG SẢN VIỆT NAM</u>
                        </strong><br>
                    </p>
                    <i>.........,ngày {{ $day}} tháng {{ $month }} năm {{ $year }}</i>
                </td>
            </tr>
        </table>
        <br /> <br />
        <div class="text-center">
            <strong style="font-size: 16px">BẢN KIỂM CAM KẾT</strong><br>
            <strong style="font-size: 16px">TU DƯỠNG, RÈN LUYỆN, PHẤN ĐẤU NĂM {{ $year }}</strong><br>
        </div>
        <br />
        <div>Họ và tên: {{ $datacamket->user_ho_ten }}, Ngày sinh: {{ $datacamket->user_ngay_sinh }}
        </div>
        <div>Đơn vị công tác: {{ $datacamket->user_don_vi_cong_tac }}</div>
        <div>Chức vụ Đảng: {{ $datacamket->user_chuc_vu_dang }}</div>
        <div>Chức vị chính quyền:{{ $datacamket->user_chuc_vu_chinh_quyen }}</div>
        <div>Chức vụ đoàn thể: {{ $datacamket->user_chuc_vu_doan_the }}</div>
        <div>Sinh hoạt tại chi bộ: {{ $datacamket->user_chi_bo }}</div><br/>
        <div>
            Sau khi nghiên cứu, học tập các nghị quyết, quy định của Đảng,
            tôi cam kết nghiêm túc thực hiện: Nghị quyết Đại hội đại biểu toàn quốc
            lần thứ XIII của Đảng; Nghị quyết Trung ương 4 khóa XII về tăng cường
            xây dựng, chỉnh đốn Đảng; ngăn chặn, đẩy lùi sự suy thoái về tư tưởng
            chính trị, đạo đức, lối sống, những biểu hiện “tự diễn biến”, “tự chuyển hóa” trong nội bộ;
            Kết luận số 21-KL/TW ngày 25/10/2021 của Ban Chấp hành Trung ương khóa XIII về đẩy mạnh xây dựng,
            chỉnh đốn Đảng và hệ thống chính trị; kiên quyết ngăn chặn, đẩy lùi, xử lý nghiêm cán bộ, đảng viên
            suy thoái về tư tưởng chính trị, đạo đức, lối sống, biểu hiện “tự diễn biến”, “tự chuyển hóa”;
            Chỉ thị số 05-CT/TW ngày 15/5/2016 của Bộ Chính trị về đẩy mạnh học tập và làm theo tư tưởng,
            đạo đức, phong cách Hồ Chí Minh; Kết luận số 01-KL/TW ngày 18/5/2021 của Bộ Chính trị về tiếp tục
            thực hiện Chỉ thị số 05-CT/TW của Bộ Chính trị về đẩy mạnh học tập và làm theo tư tưởng, đạo đức,
            phong cách Hồ Chí Minh; Quy định số 101-QĐ/TW ngày 07/6/2012
            của  Ban Bí thư về trách nhiệm nêu gương của cán bộ, đảng viên, nhất là
            cán bộ lãnh đạo chủ chốt các cấp; Quy định số 08-QĐi/TW ngày 25/10/2018 của
            Ban Chấp hành Trung ương về trách nhiệm nêu gương của cán bộ,
            đảng viên, trước hết là Ủy viên Bộ Chính trị, Ủy viên Ban Bí thư, Ủy viên
            Ban Chấp hành Trung ương; Quy định số 205-QĐ/TW ngày 23/9/2019
            của Bộ Chính trị về việc kiểm soát quyền lực trong công tác cán bộ
            và chống chạy chức, chạy quyền; Quy định số 37-QĐ/TW ngày 25/10/2021 của Ban Chấp hành
            Trung ương về những điều đảng viên không được làm; Nghị quyết Đại hội đại biểu Đảng bộ
            thành phố lần thứ XIV nhiệm kỳ
            2020 - 2025; Quy định số 03-QĐ/TU ngày 06/6/2016 của Ban Thường vụ Thành ủy
            về trách nhiệm và xử lý trách nhiệm người đứng đầu, cấp phó
            của người đứng đầu cấp ủy, tổ chức đảng, cơ quan, đơn vị trong thực hiện chức trách,
            nhiệm vụ được giao; Quy định số 19-QĐi/TU ngày 07/3/2019
            của Ban Thường vụ Thành ủy về trách nhiệm nêu gương của cán bộ,
            đảng viên, trước hết là cán bộ lãnh đạo, quản lý các cấp và người đứng đầu cấp ủy,
            tổ chức đảng, cơ quan, đơn vị; các nghị quyết, quy định có liên quan,
            với các nội dung chủ yếu sau đây:

        </div>
        <span>
            <div>
                <strong>1- Về tư tưởng chính trị
                </strong>
            </div>
            <div>
                {!! $datacamket->tieu_chi_1 !!}
            </div>
            <div>
                <strong>2- Về phẩm chất đạo đức, lối sống
                </strong>
            </div>
            <div>
                {!! $datacamket->tieu_chi_2 !!}
            </div>
            <div>
                <strong>3- Về ý thức tổ chức kỷ luật
                </strong>
            </div>
            <div>
                {!! $datacamket->tieu_chi_3 !!}
            </div>
            <div>
                <strong>4- Tác phong, lề lối làm việc</strong>
            </div>
            <div>
                {!! $datacamket->tieu_chi_4 !!}
            </div>
            <div>
                <strong>5- Về thực hiện chức trách, nhiệm vụ được giao</strong>
            </div>
            <div>
                {!! $datacamket->tieu_chi_5 !!}
            </div>
            <div>
                <strong>6- Về khắc phục những hạn chế, khuyết điểm thời gian qua
                        và qua kiểm điểm, đánh giá chất lượng cán bộ, đảng viên cuối năm…
                    </strong>
                    <i>(nếu có).</i>
            </div>
            <div>
                {!! $datacamket->tieu_chi_6 !!}
            </div>
            <div>
                <strong>7- Về kế hoạch hành động thực hiện Nghị quyết Đại hội XIII của Đảng</strong>
            </div>
            <div>
                {!! $datacamket->tieu_chi_7 !!}
            </div>
        </span>
        <br />
        <span>
            <div>
                Bản cam kết này đồng thời là nội dung kế hoạch hành động của bản thân để tu dưỡng, rèn luyện, phấn đấu và là căn cứ để kiểm điểm, đánh giá,       xếp loại cán bộ, đảng viên cuối năm.

            </div>
        </span>
        <table border="0" width="100%">
            <tr>
                <td style="text-align: center">
                    <b>XÁC NHẬN CỦA CHI BỘ</b>
                </td>
                <td style="text-align: center">
                    <b>NGƯỜI CAM KẾT</b>
                </td>
            </tr>
        </table>
        <div style="height: 120px"></div>

    </div>
</body>

</html>
