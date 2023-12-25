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
            height: 17px;
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
            /* height: 17px; */
            /* line-height: 17px; */
            /* width: 100%; */
            border: 0.5px solid black;
            vertical-align: baseline;
        }

        .kyten {
            margin: auto;
        }

        div {
            padding-bottom: 6px;
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
            <strong style="font-size: 16px">BẢN KIỂM ĐIỂM CÁ NHÂN</strong><br>
            <i>Năm: {{ $year }}</i>
        </div>
        <br />
        <div>Họ và tên: {{ $datatukiemdiem->user_ho_ten }}</div>
        <div> Ngày sinh: {{ $datatukiemdiem->user_ngay_sinh }}</div>
        <div>Chức vụ Đảng: {{ $datatukiemdiem->user_chuc_vu_dang }}</div>
        <div>Chức vị chính quyền: {{ $datatukiemdiem->user_chuc_vu_chinh_quyen }}</div>
        <div>Chức vụ đoàn thể: {{ $datatukiemdiem->user_chuc_vu_doan_the }}</div>
        <div>Đơn vị công tác: {{ $datatukiemdiem->user_chi_bo }}</div>
        <div>Chi bộ: {{ $datatukiemdiem->user_chi_bo }}</div>
        <span>
            <div>
                <strong>I. Ưu điểm, kết quả đạt được</strong>
            </div>
            <div>
                <i>1. Về phẩm chất chính trị; phẩm chất đạo đức, lối sống; ý thức tổ chức kỷ luật; tác phong, lề lối làm
                    việc:</i>
                {!! $datatukiemdiem->uu_diem_1_noi_dung !!}
            </div>
            <div>
                <i>Tự đánh giá về cấp độ thực hiện:</i>
                <table border="0" width="100%">
                    <tr>
                        <td width="7%" class="box">
                            <div class="text-center">
                                <div>{{ $datatukiemdiem->uu_diem_1_danh_gia == 1 ? 'X' : '' }}</div>
                            </div>
                        </td>
                        <td width="18%">Xuất sắc</td>

                        <td width="7%" class="box">
                            <div class="text-center">{{ $datatukiemdiem->uu_diem_1_danh_gia == 2 ? 'X' : '' }}</div>
                        </td>
                        <td width="18%">Tốt</td>

                        <td width="7%" class="box">
                            <div class="text-center">{{ $datatukiemdiem->uu_diem_1_danh_gia == 3 ? 'X' : '' }}</div>
                        </td>
                        <td width="18%">Trung bình</td>

                        <td width="7%" class="box">
                            <div class="text-center">{{ $datatukiemdiem->uu_diem_1_danh_gia == 4 ? 'X' : '' }}</div>
                        </td>
                        <td width="18%">Kém</td>
                    </tr>
                </table>
            </div>

            <div>
                <i>2. Về thực hiện chức trách, nhiệm vụ được giao:</i>
                {!! $datatukiemdiem->uu_diem_2_noi_dung !!}
            </div>
            <div>
                <i>Tự đánh giá về cấp độ thực hiện:</i>
                <table border="0" width="100%">
                    <tr>
                        <td width="7%" class="box">
                            <div class="text-center">{{ $datatukiemdiem->uu_diem_2_danh_gia == 1 ? 'X' : '' }}</div>
                        </td>
                        <td width="18%">Xuất sắc</td>

                        <td width="7%" class="box">
                            <div class="text-center">{{ $datatukiemdiem->uu_diem_2_danh_gia == 2 ? 'X' : '' }}</div>
                        </td>
                        <td width="18%">Tốt</td>

                        <td width="7%" class="box">
                            <div class="text-center">{{ $datatukiemdiem->uu_diem_2_danh_gia == 3 ? 'X' : '' }}
                            </div>
                        </td>
                        <td width="18%">Trung bình</td>

                        <td width="7%" class="box">
                            <div class="text-center">{{ $datatukiemdiem->uu_diem_2_danh_gia == 4 ? 'X' : '' }}
                            </div>
                        </td>
                        <td width="18%">Kém</td>
                    </tr>
                </table>
            </div>
            {{-- @if ($quyen_level==1)  --}} <!-- Quyền lãnh đạo -->
            @if ($quyen_level>0) <!-- Quyền lãnh đạo trở lên -->
            <div>
                <div>
                    <i>3. Kết quả công tác lãnh đạo, chỉ đạo, quản lý, điều hành; thực hiện chức trách, nhiệm vụ; mức độ hoàn thành nhiệm vụ của các tổ chức, cơ quan, đơn vị thuộc quyền quản lý; khả năng quy tụ, xây dựng đoàn kết nội bộ.</i>
                    {!! $datatukiemdiem->uu_diem_3_noi_dung !!}
                </div>
                <div>
                    <i>Tự đánh giá về cấp độ thực hiện:</i>
                    <table border="0" width="100%">
                        <tr>
                            <td width="7%" class="box">
                                <div class="text-center">{{ $datatukiemdiem->uu_diem_3_danh_gia == 1 ? 'X' : '' }}</div>
                            </td>
                            <td width="18%">Xuất sắc</td>

                            <td width="7%" class="box">
                                <div class="text-center">{{ $datatukiemdiem->uu_diem_3_danh_gia == 2 ? 'X' : '' }}</div>
                            </td>
                            <td width="18%">Tốt</td>

                            <td width="7%" class="box">
                                <div class="text-center">{{ $datatukiemdiem->uu_diem_3_danh_gia == 3 ? 'X' : '' }}
                                </div>
                            </td>
                            <td width="18%">Trung bình</td>

                            <td width="7%" class="box">
                                <div class="text-center">{{ $datatukiemdiem->uu_diem_3_danh_gia == 4 ? 'X' : '' }}
                                </div>
                            </td>
                            <td width="18%">Kém</td>
                        </tr>
                    </table>
                </div>
                <div>
                    <i>4. Trách nhiệm trong công việc; tinh thần năng động, đổi mới, sáng tạo, dám nghĩ, dám làm, dám chịu trách nhiệm; xử lý những vấn đề khó, phức tạp, nhạy cảm trong thực hiện nhiệm vụ.</i>
                    {!! $datatukiemdiem->uu_diem_4_noi_dung !!}
                </div>
                <div>
                    <i>Tự đánh giá về cấp độ thực hiện:</i>
                    <table border="0" width="100%">
                        <tr>
                            <td width="7%" class="box">
                                <div class="text-center">{{ $datatukiemdiem->uu_diem_4_danh_gia == 1 ? 'X' : '' }}</div>
                            </td>
                            <td width="18%">Xuất sắc</td>

                            <td width="7%" class="box">
                                <div class="text-center">{{ $datatukiemdiem->uu_diem_4_danh_gia == 2 ? 'X' : '' }}</div>
                            </td>
                            <td width="18%">Tốt</td>

                            <td width="7%" class="box">
                                <div class="text-center">{{ $datatukiemdiem->uu_diem_4_danh_gia == 3 ? 'X' : '' }}
                                </div>
                            </td>
                            <td width="18%">Trung bình</td>

                            <td width="7%" class="box">
                                <div class="text-center">{{ $datatukiemdiem->uu_diem_4_danh_gia == 4 ? 'X' : '' }}
                                </div>
                            </td>
                            <td width="18%">Kém</td>
                        </tr>
                    </table>
                </div>
                <div>
                    <i>5. Trách nhiệm nêu gương của bản thân và gia đình; việc đấu tranh phòng, chống tham nhũng, tiêu cực, lãng phí; sự tín nhiệm của cán bộ, đảng viên.</i>
                    {!! $datatukiemdiem->uu_diem_5_noi_dung !!}
                </div>
                <div>
                    <i>Tự đánh giá về cấp độ thực hiện:</i>
                    <table border="0" width="100%">
                        <tr>
                            <td width="7%" class="box">
                                <div class="text-center">{{ $datatukiemdiem->uu_diem_5_danh_gia == 1 ? 'X' : '' }}</div>
                            </td>
                            <td width="18%">Xuất sắc</td>

                            <td width="7%" class="box">
                                <div class="text-center">{{ $datatukiemdiem->uu_diem_5_danh_gia == 2 ? 'X' : '' }}</div>
                            </td>
                            <td width="18%">Tốt</td>

                            <td width="7%" class="box">
                                <div class="text-center">{{ $datatukiemdiem->uu_diem_5_danh_gia == 3 ? 'X' : '' }}
                                </div>
                            </td>
                            <td width="18%">Trung bình</td>

                            <td width="7%" class="box">
                                <div class="text-center">{{ $datatukiemdiem->uu_diem_5_danh_gia == 4 ? 'X' : '' }}
                                </div>
                            </td>
                            <td width="18%">Kém</td>
                        </tr>
                    </table>
                </div>
                <i>6. Việc thực hiện cam kết tu dưỡng, rèn luyện, phấn đấu hằng năm:</i>
                {!! $datatukiemdiem->uu_diem_6_noi_dung !!}
            </div>
            @else
            <div>
                <i>3. Việc thực hiện cam kết tu dưỡng, rèn luyện, phấn đấu hằng năm:</i>
                {!! $datatukiemdiem->uu_diem_6_noi_dung !!}
            </div>
            @endif
        </span>

        <span>
            <div>
                <strong>II. Hạn chế, khuyết điểm và nguyên nhân</strong>
            </div>
            <div>
                <i>1. Hạn chế, khuyết điểm:</i>
                {!! $datatukiemdiem->han_che_1_noi_dung !!}
            </div>
            <div>
                <i>2. Nguyên nhân của hạn chế, khuyết điểm.</i>
                {!! $datatukiemdiem->han_che_2_noi_dung !!}
            </div>
        </span>

        <span>
            <div>
                <strong>III. Kết quả khắc phục những hạn chế, khuyết điểm đã được cấp có thẩm quyền kết luận hoặc được
                    chỉ ra ở các kỳ kiểm điểm trước</strong>
                {!! $datatukiemdiem->ket_qua_khac_phuc_noi_dung !!}
            </div>
            <table border="0" width="100%">
                <tr>
                    <td width="7%" class="box">
                        <div class="text-center">{{ $datatukiemdiem->ket_qua_khac_phuc_danh_gia == 1 ? 'X' : '' }}
                        </div>
                    </td>
                    <td width="18%">Xuất sắc</td>

                    <td width="7%" class="box">
                            <div class="text-center">{{ $datatukiemdiem->ket_qua_khac_phuc_danh_gia == 2 ? 'X' : '' }}
                        </div>
                    </td>
                    <td width="18%">Tốt</td>

                    <td width="7%" class="box">
                            <div class="text-center">{{ $datatukiemdiem->ket_qua_khac_phuc_danh_gia == 3 ? 'X' : '' }}
                        </div>
                    </td>
                    <td width="18%">Trung bình</td>

                    <td width="7%" class="box">
                            <div class="text-center">{{ $datatukiemdiem->ket_qua_khac_phuc_danh_gia == 4 ? 'X' : '' }}
                        </div>
                    </td>
                    <td width="18%">Kém</td>
                </tr>
            </table>
        </span>

        <span>
            <div>
                <strong>IV. Giải trình những vấn đề được gợi ý kiểm điểm (nếu có)
                </strong>
                {!! $datatukiemdiem->giai_trinh !!}
            </div>
        </span>

        <span>
            <div>
                <strong>V. Làm rõ trách nhiệm của cá nhân đối với những hạn chế, khuyết điểm của tập thể (nếu có)
                </strong>
                {!! $datatukiemdiem->lam_ro_trach_nhiem !!}
            </div>
        </span>

        <span>
            <div>
                <strong>VI. Phương hướng, biện pháp khắc phục hạn chế, khuyết điểm</strong>
                {!! $datatukiemdiem->bien_phap_khac_phuc !!}
            </div>
        </span>

        <span>
            <div>
                <strong>VII. Tự nhận mức xếp loại chất lượng</strong>
            </div>
            <div>
                <i>1. Xếp loại cán bộ, công chức, viên chức:</i>
            </div>
            <div>
                <table border="0" width="100%">
                    <tr>
                        <td width="7%" class="box">
                            <div class="text-center">{{ $datatukiemdiem->tu_nhan_muc_xl_can_bo == 1 ? 'X' : '' }}
                            </div>
                        </td>
                        <td>Hoàn thành xuất sắc nhiệm vụ</td>
                    </tr>
                    <tr>
                        <td width="7%" class="box">
                            <div class="text-center">{{ $datatukiemdiem->tu_nhan_muc_xl_can_bo == 2 ? 'X' : '' }}
                            </div>
                        </td>
                        <td>Hoàn thành tốt nhiệm vụ</td>
                    </tr>
                    <tr>
                        <td width="7%" class="box">
                            <div class="text-center">{{ $datatukiemdiem->tu_nhan_muc_xl_can_bo == 3 ? 'X' : '' }}
                            </div>
                        </td>
                        <td>Hoàn thành nhiệm vụ</td>
                    </tr>
                    <tr>
                        <td width="7%" class="box">
                            <div class="text-center">{{ $datatukiemdiem->tu_nhan_muc_xl_can_bo == 4 ? 'X' : '' }}
                            </div>
                        </td>
                        <td>Không hoàn thành nhiệm vụ</td>
                    </tr>
                </table>
            </div>
            <br />
            <div>
                <i>2. Xếp loại đảng viên:</i>
            </div>
            <div>
                <table border="0" width="100%">
                    <tr>
                        <td width="7%" class="box">
                            <div class="text-center">
                                {{ $datatukiemdiem->tu_nhan_muc_xl_dang_vien == 1 ? 'X' : '' }}
                            </div>
                        </td>
                        <td>Hoàn thành xuất sắc nhiệm vụ</td>
                    </tr>
                    <tr>
                        <td width="7%" class="box">
                            <div class="text-center">
                                {{ $datatukiemdiem->tu_nhan_muc_xl_dang_vien == 2 ? 'X' : '' }}
                            </div>
                        </td>
                        <td>Hoàn thành tốt nhiệm vụ</td>
                    </tr>
                    <tr>
                        <td width="7%" class="box">
                            <div class="text-center">
                                {{ $datatukiemdiem->tu_nhan_muc_xl_dang_vien == 3 ? 'X' : '' }}
                            </div>
                        </td>
                        <td>Hoàn thành nhiệm vụ</td>
                    </tr>
                    <tr>
                        <td width="7%" class="box">
                            <div class="text-center">
                                {{ $datatukiemdiem->tu_nhan_muc_xl_dang_vien == 4 ? 'X' : '' }}
                            </div>
                        </td>
                        <td>Không hoàn thành nhiệm vụ</td>
                    </tr>
                </table>
            </div>
        </span>
        <br />
        <span>
            <div align="right" style="padding-right: 50px">
                <b>NGƯỜI TỰ KIỂM ĐIỂM</b>
            </div>
            <div align="right" style="padding-right: 70px">
                <i>(ký, ghi rõ họ tên)</i>
            </div>
        </span>
        <div style="height: 120px"></div>
        <span>
            <div>
                <b>Đánh giá, xếp loại chất lượng công chức, viên chức
                </b>
            </div>
            <div>
                - Nhận xét, đánh giá của người quản lý, sử dụng công chức, viên chức:
                {!! $datatukiemdiem->lanh_dao_don_vi_noi_dung !!}
            </div>
            <div>- Mức xếp loại chất lượng công chức, viên chức: <i>{{ $datatukiemdiem->lanh_dao_don_vi_danh_gia }}</i>
            </div>
            <br>
            <div align="right" style="padding-right: 40px">
                <b>THỦ TRƯỞNG CƠ QUAN, ĐƠN VỊ
                </b>
            </div>
            <div align="right">
                <i>(Xác lập thời điểm, ký, ghi rõ họ tên và đóng dấu)</i>
            </div>
            <div style="height: 120px"></div>
        </span>
        <span>
            <div>
                <b>Đánh giá, xếp loại chất lượng đảng viên
                </b>
            </div>
            <div>
                - Nhận xét, đánh giá của chi ủy:
                {!! $datatukiemdiem->chi_bo_noi_dung !!}
            </div>
            <div>- Chi bộ đề xuất xếp loại mức chất lượng: <i>{{ $datatukiemdiem->chi_bo_danh_gia }}</i></div>
            <br>
            <div align="right" style="padding-right: 40px">
                <b> T/M CHI ỦY (CHI BỘ)
                </b>
            </div>
            <div align="right">
                <i>(Xác lập thời điểm, ký, ghi rõ họ tên)</i>
            </div>
            <div style="height: 120px"></div>
        </span>
        <span>
            <div>- Đảng ủy, chi ủy cơ sở xếp loại mức chất lượng: <i>{{ $datatukiemdiem->chi_uy_danh_gia }}</i></div>
            <br>
            <div align="right" style="padding-right: 40px">
                <b> T/M ĐẢNG UỶ (CHI UỶ)
                </b>
            </div>
            <div align="right">
                <i>(Xác lập thời điểm, ký, ghi rõ họ tên)</i>
            </div>
            <div style="height: 120px"></div>
        </span>
    </div>
</body>

</html>
