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
            font-size: 12px !important;
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
                <td style="text-align: center">
                    ĐẢNG BỘ TRƯỜNG ĐẠI HỌC CẦN THƠ<br />
                    <b>ĐẢNG BỘ/CHI BỘ TRUNG TÂM CÔNG NGHỆ PHẦN MỀM</b>
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
            <strong style="font-size: 16px">BÁO CÁO KIỂM ĐIỂM TẬP THỂ</strong><br>
            <i>Năm: {{ $year }}</i>
        </div>
        <br />
        <div>Căn cứ kết quả lãnh đạo, chỉ đạo thực hiện nhiệm vụ chính trị tại địa phương (cơ quan, đơn vị);
            tập thể <strong>{{ $datakiemdiemtapthe->nhom_tap_the_ten }}</strong>. kiểm điểm với các nội dung chủ yếu sau:</div>
        <span>
            <div>
                <strong>I. Ưu điểm, kết quả đạt được</strong>
            </div>
            <div>
                <i>1. Việc chấp hành nguyên tắc tổ chức và hoạt động,
                    nhất là nguyên tắc tập trung dân chủ; thực hiện quy chế làm việc.</i>
                {!! $datakiemdiemtapthe->uu_diem_1_noi_dung !!}
            </div>
            <div>
                <i>Tự đánh giá về cấp độ thực hiện:</i>
                <table border="0" width="100%">
                    <tr>
                        <td width="7%">
                            <div class="box text-center">{{ $datakiemdiemtapthe->uu_diem_1_danh_gia == 1 ? 'X' : '' }}</div>
                        </td>
                        <td width="18%">Xuất sắc</td>

                        <td width="7%">
                            <div class="box text-center">{{ $datakiemdiemtapthe->uu_diem_1_danh_gia == 2 ? 'X' : '' }}</div>
                        </td>
                        <td width="18%">Tốt</td>

                        <td width="7%">
                            <div class="box text-center">{{ $datakiemdiemtapthe->uu_diem_1_danh_gia == 3 ? 'X' : '' }}</div>
                        </td>
                        <td width="18%">Trung bình</td>

                        <td width="7%">
                            <div class="box text-center">{{ $datakiemdiemtapthe->uu_diem_1_danh_gia == 4 ? 'X' : '' }}</div>
                        </td>
                        <td width="18%">Kém</td>
                    </tr>
                </table>
            </div>
            <div>
                <i>2. Kết quả thực hiện các mục tiêu, chỉ tiêu, nhiệm vụ được đề ra
                    trong nghị quyết đại hội, kế hoạch, chương trình công tác năm
                    được cấp có thẩm quyền giao, phê duyệt.</i>
                {!! $datakiemdiemtapthe->uu_diem_2_noi_dung !!}
            </div>
            <div>
                <i>Tự đánh giá về cấp độ thực hiện:</i>
                <table border="0" width="100%">
                    <tr>
                        <td width="7%">
                            <div class="box text-center">{{ $datakiemdiemtapthe->uu_diem_2_danh_gia == 1 ? 'X' : '' }}</div>
                        </td>
                        <td width="18%">Xuất sắc</td>

                        <td width="7%">
                            <div class="box text-center">{{ $datakiemdiemtapthe->uu_diem_2_danh_gia == 2 ? 'X' : '' }}</div>
                        </td>
                        <td width="18%">Tốt</td>

                        <td width="7%">
                            <div class="box text-center">{{ $datakiemdiemtapthe->uu_diem_2_danh_gia == 3 ? 'X' : '' }}</div>
                        </td>
                        <td width="18%">Trung bình</td>

                        <td width="7%">
                            <div class="box text-center">{{ $datakiemdiemtapthe->uu_diem_2_danh_gia == 4 ? 'X' : '' }}</div>
                        </td>
                        <td width="18%">Kém</td>
                    </tr>
                </table>
            </div>
            <div>
                <i>3. Công tác xây dựng, chỉnh đốn Đảng và hệ thống chính trị; trách nhiệm nêu gương;
                     trách nhiệm giải trình; công tác đấu tranh phòng, chống tham nhũng, tiêu cực, lãng phí
                     và ngăn chặn, đẩy lùi những biểu hiện suy thoải về tư tường chính trị, đạo đức, lối sống,
                     "tự diễn biến", "tự chuyển hoá" trong nội bộ gắn với việc học tập và làm theo tư tưởng,
                     đạo đức, phong cách Hồ Chí Minh; công tác kiểm tra, giám sát, kỷ luật đảng và giải quyết
                     khiếu nại, tố cáo, kiến nghị, phản ánh của tổ chức, cá nhân.</i>
                {!! $datakiemdiemtapthe->uu_diem_3_noi_dung !!}
            </div>
            <div>
                <i>Tự đánh giá về cấp độ thực hiện:</i>
                <table border="0" width="100%">
                    <tr>
                        <td width="7%">
                            <div class="box text-center">{{ $datakiemdiemtapthe->uu_diem_3_danh_gia == 1 ? 'X' : '' }}</div>
                        </td>
                        <td width="18%">Xuất sắc</td>

                        <td width="7%">
                            <div class="box text-center">{{ $datakiemdiemtapthe->uu_diem_3_danh_gia == 2 ? 'X' : '' }}</div>
                        </td>
                        <td width="18%">Tốt</td>

                        <td width="7%">
                            <div class="box text-center">{{ $datakiemdiemtapthe->uu_diem_3_danh_gia == 3 ? 'X' : '' }}</div>
                        </td>
                        <td width="18%">Trung bình</td>

                        <td width="7%">
                            <div class="box text-center">{{ $datakiemdiemtapthe->uu_diem_3_danh_gia == 4 ? 'X' : '' }}</div>
                        </td>
                        <td width="18%">Kém</td>
                    </tr>
                </table>
            </div>
            <div>
                <i>4. Trách nhiệm của tập thể lãnh đạo, quản lý trong thực hiện
                    nhiệm vụ chính trị của địa phương,
                    tổ chức, cơ quan, đơn vị.</i>
                {!! $datakiemdiemtapthe->uu_diem_4_noi_dung !!}
            </div>
            <div>
                <i>Tự đánh giá về cấp độ thực hiện:</i>
                <table border="0" width="100%">
                    <tr>
                        <td width="7%">
                            <div class="box text-center">{{ $datakiemdiemtapthe->uu_diem_4_danh_gia == 1 ? 'X' : '' }}</div>
                        </td>
                        <td width="18%">Xuất sắc</td>

                        <td width="7%">
                            <div class="box text-center">{{ $datakiemdiemtapthe->uu_diem_4_danh_gia == 2 ? 'X' : '' }}</div>
                        </td>
                        <td width="18%">Tốt</td>

                        <td width="7%">
                            <div class="box text-center">{{ $datakiemdiemtapthe->uu_diem_4_danh_gia == 3 ? 'X' : '' }}</div>
                        </td>
                        <td width="18%">Trung bình</td>

                        <td width="7%">
                            <div class="box text-center">{{ $datakiemdiemtapthe->uu_diem_4_danh_gia == 4 ? 'X' : '' }}</div>
                        </td>
                        <td width="18%">Kém</td>
                    </tr>
                </table>
            </div>
            {{-- <div>
                <i>5. Kết quả lãnh đạo, chỉ đạo, thực hiện công tác kiểm tra, giám sát, kỷ luật đảng và thi đua, khen thưởng.
                </i>
                {!! $datakiemdiemtapthe->uu_diem_5_noi_dung !!}
            </div> --}}
            {{-- <div>
                <i>Tự đánh giá về cấp độ thực hiện:</i>
                <table border="0" width="100%">
                    <tr>
                        <td width="7%">
                            <div class="box text-center">{{ $datakiemdiemtapthe->uu_diem_5_danh_gia == 1 ? 'X' : '' }}</div>
                        </td>
                        <td width="18%">Xuất sắc</td>

                        <td width="7%">
                            <div class="box text-center">{{ $datakiemdiemtapthe->uu_diem_5_danh_gia == 2 ? 'X' : '' }}</div>
                        </td>
                        <td width="18%">Tốt</td>

                        <td width="7%">
                            <div class="box text-center">{{ $datakiemdiemtapthe->uu_diem_5_danh_gia == 3 ? 'X' : '' }}</div>
                        </td>
                        <td width="18%">Trung bình</td>

                        <td width="7%">
                            <div class="box text-center">{{ $datakiemdiemtapthe->uu_diem_5_danh_gia == 4 ? 'X' : '' }}</div>
                        </td>
                        <td width="18%">Kém</td>
                    </tr>
                </table>
            </div> --}}
        </span>

        <span>
            <div>
                <strong>II. Hạn chế, khuyết điểm và nguyên nhân</strong>
            </div>
            <div>
                <i>1. Hạn chế, khuyết điểm:</i>
                {!! $datakiemdiemtapthe->han_che_khuyet_diem !!}
            </div>
            <div>
                <i>2. Nguyên nhân của hạn chế, khuyết điểm.</i>
                {!! $datakiemdiemtapthe->nguyen_nhan_han_che !!}
            </div>
        </span>

        <span>
            <div>
                <strong>III- Kết quả khắc phục những hạn chế, khuyết điểm đã được
                    cấp có thẩm quyền kết luận hoặc được chỉ ra ở các kỳ kiểm điểm trước (và trong năm)</strong>
                {!! $datakiemdiemtapthe->ket_qua_khac_phuc_noi_dung !!}
            </div>
            <table border="0" width="100%">
                <tr>
                    <td width="7%">
                        <div class="box text-center">{{ $datakiemdiemtapthe->ket_qua_khac_phuc_danh_gia == 1 ? 'X' : '' }}
                        </div>
                    </td>
                    <td width="18%">Xuất sắc</td>

                    <td width="7%">
                        <div class="box text-center">{{ $datakiemdiemtapthe->ket_qua_khac_phuc_danh_gia == 2 ? 'X' : '' }}
                        </div>
                    </td>
                    <td width="18%">Tốt</td>

                    <td width="7%">
                        <div class="box text-center">{{ $datakiemdiemtapthe->ket_qua_khac_phuc_danh_gia == 3 ? 'X' : '' }}
                        </div>
                    </td>
                    <td width="18%">Trung bình</td>

                    <td width="7%">
                        <div class="box text-center">{{ $datakiemdiemtapthe->ket_qua_khac_phuc_danh_gia == 4 ? 'X' : '' }}
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
                {!! $datakiemdiemtapthe->giai_trinh_van_de !!}
            </div>
        </span>

        <span>
            <div>
                <strong>"V- Trách nhiệm của tập thể, cá nhân.
                    Về những hạn chế, khuyết điểm trong thực hiện nhiệm vụ chính trị; nguyên tắc tập trung dân chủ; các quy định, quy chế làm việc; công tác tổ chức, cán bộ; quản lý đảng viên; đổi mới phương thức lãnh đạo; các biện pháp đấu tranh phòng, chống tham nhũng, tiêu cực, lãng phí; kết quả xử lý sai phạm đối với tập thể, cá nhân..."
                </strong>
                {!! $datakiemdiemtapthe->lam_ro_trach_nhiem !!}
            </div>
        </span>

        <span>
            <div>
                <strong>VI. Phương hướng, biện pháp khắc phục hạn chế, khuyết điểm</strong>
                {!! $datakiemdiemtapthe->bien_phap_khac_phuc !!}
            </div>
        </span>

        <span>
            <div>
                <strong>VII. Đề nghị mức xếp loại chất lượng</strong>
            </div>

            <div>
                <table border="0" width="100%">
                    <tr>
                        <td width="7%">
                            <div class="box text-center">{{ $datakiemdiemtapthe->tu_xep_loai == 1 ? 'X' : '' }}
                            </div>
                        </td>
                        <td>Hoàn thành xuất sắc nhiệm vụ</td>
                    </tr>
                    <tr>
                        <td width="7%">
                            <div class="box text-center">{{ $datakiemdiemtapthe->tu_xep_loai == 2 ? 'X' : '' }}
                            </div>
                        </td>
                        <td>Hoàn thành tốt nhiệm vụ</td>
                    </tr>
                    <tr>
                        <td width="7%">
                            <div class="box text-center">{{ $datakiemdiemtapthe->tu_xep_loai == 3 ? 'X' : '' }}
                            </div>
                        </td>
                        <td>Hoàn thành nhiệm vụ</td>
                    </tr>
                    <tr>
                        <td width="7%">
                            <div class="box text-center">{{ $datakiemdiemtapthe->tu_xep_loai == 4 ? 'X' : '' }}
                            </div>
                        </td>
                        <td>Không hoàn thành nhiệm vụ</td>
                    </tr>
                </table>
            </div>
            <br />
        </span>
        <br />
        <div class="text-center">
            <i>(kèm theo phiếu phân tích chất lượng).</i>
        </div>
        <br/>
        <span>
            <div align="right" style="padding-right: 50px">
                <b>T/M BAN THƯỜNG VỤ (TẬP THỂ LÃNH ĐẠO, QUẢN LÝ)</b>
            </div>
            <div align="right" style="padding-right: 70px">
                <i>(Ký, ghi rõ họ tên và đóng dấu)
                </i>
            </div>
        </span>
        <div style="height: 120px"></div>
    </div>
</body>

</html>
