@extends('layout.default')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/icon_in_tabs.css') }}">
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
            <div class="card-title">
                <h3 class="card-label">Đánh giá tập thể: {{ $nhom->nhom_tap_the_ten }}</h3>


            </div>
            <div>
                <a class="btn btn-success mb-1" target="_blank"
                    href="{{ route('formPDF.form1', ['user_id' => $user_id]) }}">
                    Xuất File PDF
                </a>
                <a href="{{ route('tapthetudanhgiaManage.index1DanhSachTapThe') }}" @include('layout.base._button_back')
                </a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    <p>{{ session('error') }}</p>
                </div>
            @endif
            @if ($errors->toArray() != null)
                <div class="alert alert-danger pt-6 pb-6">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <input type="hidden" id="tab-i" name="tab" value="{{ $tab }}" />
            {{-- {{ dd($tab) }} --}}
            <ul class="nav  nav-pills mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="ex2-tab-1" data-toggle="tab" href="#ex2-tabs-1" role="tab"
                        aria-controls="ex2-tabs-1" aria-selected="true">
                        Tập thể tự đánh giá- trang 1
                        &ensp;<i class="fa {{ $ttdg[1] }}"></i>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="ex2-tab-2" data-toggle="tab" href="#ex2-tabs-2" role="tab"
                        aria-controls="ex2-tabs-2" aria-selected="false">
                        Tập thể tự đánh giá- trang 2
                        &ensp;<i class="fa {{ $ttdg[2] }}"></i>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="ex2-tab-3" data-toggle="tab" href="#ex2-tabs-3" role="tab"
                        aria-controls="ex2-tabs-3" aria-selected="false">
                        Tập thể tự đánh giá- trang 3
                        &ensp;<i class="fa {{ $ttdg[3] }}"></i>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="ex2-tab-4" data-toggle="tab" href="#ex2-tabs-4" role="tab"
                        aria-controls="ex2-tabs-4" aria-selected="false">
                        Tập thể tự đánh giá- trang
                        4 &ensp;<i class="fa {{ $ttdg[4] }}"></i>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="ex2-tab-5" data-toggle="tab" href="#ex2-tabs-5" role="tab"
                        aria-controls="ex2-tabs-5" aria-selected="false">
                        Tập thể tự đánh giá- trang 5
                        &ensp;<i class="fa {{ $ttdg[5] }}"></i>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="ex2-tab-6" data-toggle="tab" href="#ex2-tabs-6" role="tab"
                        aria-controls="ex2-tabs-6" aria-selected="false">
                        Tập thể tự đánh giá- trang 6
                        &ensp;<i class="fa {{ $ttdg[6] }}"></i>
                    </a>
                </li>
            </ul>
            <!-- Tabs navs -->

            <!-- Tabs content -->

            <div class="tab-content" id="ex2-content">
                {{-- {{ dd($user_id) }} --}}
                <div class="tab-pane fade show active" id="ex2-tabs-1" role="tabpanel" aria-labelledby="ex2-tab-1">
                    <form class="form" method="post" id="formtapthetudanhgia1"
                        @if ($datadanhgiatapthe == null) action="{{ route('tapthetudanhgiaManage.storeTapTheTuDanhGia', ['user_id' => $user_id]) }}"
                    @else
                        action="{{ route('tapthetudanhgiaManage.updateTapTheTuDanhGia', ['user_id' => $user_id]) }}" @endif>
                        {{ csrf_field() }}
                        @if ($datadanhgiatapthe != null)
                            <input type="hidden" name="_method" value="PUT" />
                        @endif

                        <input type="hidden" id="tab-ii" name="tab" value="1" />
                        <table class="table" cellpadding="10px">
                            <thead>
                                <th>TT</th>
                                <th>Tiêu Chí</th>
                                <th>Nội dung tự đánh giá</th>
                            </thead>
                            <tbody>
                                <tr style="border-top: solid 1px black">
                                    <th>I</th>
                                    <th>Ưu Điểm, kết quả đạt được</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        1. Việc chấp hành nguyên tắc tổ chức và hoạt động,
                                        nhất là nguyên tắc tập trung dân chủ; thực hiện quy chế làm việc
                                    </td>
                                    <td>
                                        <textarea name="ud1noidung" class="ck-editor" cols="100" rows="20">
                                            @if (old('ud1noidung') != null)
                                            {{ old('ud1noidung', 'default') }}
                                            @else
                                            {{ $datadanhgiatapthe != null ? $datadanhgiatapthe->uu_diem_1_noi_dung : '' }}
                                            @endif
                                        </textarea>
                                    </td>
                                <tr>
                                <tr>
                                    <td></td>
                                    <td>Tự đánh giá về cấp độ thực hiện</td>
                                    <td class="danh-gia-cap-do">
                                        {{-- @foreach ($danhgia as $item => $capdo)
                                            <input type="radio" id="ud1danhgia{{ $capdo->cap_do_danh_gia_id }}"
                                                name="ud1danhgia" value="{{ $capdo->cap_do_danh_gia_id }}"
                                                @if ($datadanhgiatapthe != null) {{ $datadanhgiatapthe->uu_diem_1_danh_gia == $capdo->cap_do_danh_gia_id ? 'checked' : '' }} @endif />
                                            &nbsp;&nbsp;{{ $capdo->cap_do_danh_gia_ten }} &emsp;
                                        @endforeach --}}
                                        @if ($datadanhgiatapthe != null)
                                                <input type="hidden" id="ud1"
                                                    value="{{ $datadanhgiatapthe->uu_diem_1_danh_gia }}" />
                                            @endif
                                            <span><input type="radio" name="ud1danhgia" value="1" />Xuất Sắc</span>
                                            <span><input type="radio" name="ud1danhgia" value="2" />Tốt</span>
                                            <span><input type="radio" name="ud1danhgia" value="3" /> Trung bình</span>
                                            <span><input type="radio" name="ud1danhgia" value="4" /> Kém</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- Submit button -->
                        <div class="modal-footer">
                            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                <div class="card-toolbar">
                                    <div class="btn-group">
                                        @include('layout.base._button_save')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="tab-pane fade" id="ex2-tabs-2" role="tabpanel" aria-labelledby="ex2-tab-2">
                    <form class="form" method="post" id="formtapthetudanhgia2"
                        @if ($datadanhgiatapthe == null) action="{{ route('tapthetudanhgiaManage.storeTapTheTuDanhGia', ['user_id' => $user_id]) }}"
                    @else
                        action="{{ route('tapthetudanhgiaManage.updateTapTheTuDanhGia', ['user_id' => $user_id]) }}" @endif>
                        {{ csrf_field() }}
                        @if ($datadanhgiatapthe != null)
                            <input type="hidden" name="_method" value="PUT" />
                        @endif

                        <input type="hidden" id="tab-ii" name="tab" value="2" />
                        <table class="table" cellpadding="10px">
                            <thead>
                                <th>TT</th>
                                <th>Tiêu Chí</th>
                                <th>Nội dung tự đánh giá</th>
                            </thead>
                            <tbody>
                                <tr style="border-top: solid 1px black">
                                    <th>I</th>
                                    <th>Ưu Điểm, kết quả đạt được</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        2. Kết quả thực hiện các mục tiêu, chỉ tiêu, nhiệm vụ được đề ra trong nghị quyết đại hội,
                                         kế hoạch, chương trình công tác năm được cấp có thẩm quyền giao, phê duyệt.
                                    </td>
                                    <td>
                                        <textarea name="ud2noidung" class="ck-editor" cols="100" rows="20">
                                            @if (old('ud2noidung') != null)
                                            {{ old('ud2noidung', 'default') }}
                                            @else
                                            {{ $datadanhgiatapthe != null ? $datadanhgiatapthe->uu_diem_2_noi_dung : '' }}
                                            @endif
                                        </textarea>
                                    </td>
                                <tr>
                                <tr>
                                    <td></td>
                                    <td>Tự đánh giá về cấp độ thực hiện</td>
                                    <td class="danh-gia-cap-do">
                                        {{-- @foreach ($danhgia as $item => $capdo)
                                            <input type="radio" id="ud2danhgia{{ $capdo->cap_do_danh_gia_id }}"
                                                name="ud2danhgia" value="{{ $capdo->cap_do_danh_gia_id }}"
                                                @if ($datadanhgiatapthe != null) {{ $datadanhgiatapthe->uu_diem_2_danh_gia == $capdo->cap_do_danh_gia_id ? 'checked' : '' }} @endif />
                                            &nbsp;&nbsp;{{ $capdo->cap_do_danh_gia_ten }} &emsp;
                                        @endforeach --}}
                                        @if ($datadanhgiatapthe != null)
                                                <input type="hidden" id="ud2"
                                                    value="{{ $datadanhgiatapthe->uu_diem_2_danh_gia }}" />
                                            @endif
                                            <span><input type="radio" name="ud2danhgia" value="1" />Xuất Sắc</span>
                                            <span><input type="radio" name="ud2danhgia" value="2" />Tốt</span>
                                            <span><input type="radio" name="ud2danhgia" value="3" /> Trung bình</span>
                                            <span><input type="radio" name="ud2danhgia" value="4" /> Kém</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- Submit button -->
                        <div class="modal-footer">
                            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                <div class="card-toolbar">
                                    <div class="btn-group">
                                        @include('layout.base._button_save')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="ex2-tabs-3" role="tabpanel" aria-labelledby="ex2-tab-3">
                    <form class="form" method="post" id="formtapthetudanhgia3"
                        @if ($datadanhgiatapthe == null) action="{{ route('tapthetudanhgiaManage.storeTapTheTuDanhGia', ['user_id' => $user_id]) }}"
                    @else
                        action="{{ route('tapthetudanhgiaManage.updateTapTheTuDanhGia', ['user_id' => $user_id]) }}" @endif>
                        {{ csrf_field() }}
                        @if ($datadanhgiatapthe != null)
                            <input type="hidden" name="_method" value="PUT" />
                        @endif

                        <input type="hidden" id="tab-ii" name="tab" value="3" />
                        <table class="table" cellpadding="10px">
                            <thead>
                                <th>TT</th>
                                <th>Tiêu Chí</th>
                                <th>Nội dung tự đánh giá</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>I</th>
                                    <th>Ưu Điểm, kết quả đạt được</th>
                                    <th></th>
                                </tr>
                                <tr style="border-top: solid 1px black">
                                    <td>
                                    </td>
                                    <td>
                                        3. Công tác xây dựng, chỉnh đốn Đảng và hệ thống chính trị;
                                        trách nhiệm nêu gương; trách nhiệm giải trình; công tác đấu tranh phòng,
                                        chống tham nhũng, tiêu cực, lãng phí và ngăn chặn, đẩy lùi những biểu hiện
                                        suy thoải về tư tường chính trị, đạo đức, lối sống, "tự diễn biến",
                                        "tự chuyển hoá" trong nội bộ gắn với việc học tập và làm theo tư tưởng,
                                        đạo đức, phong cách Hồ Chí Minh; công tác kiểm tra, giám sát, kỷ luật đảng
                                        và giải quyết khiếu nại, tố cáo, kiến nghị, phản ánh của tổ chức, cá nhân.
                                    </td>
                                    <td>
                                        <textarea name="ud3noidung" class="ck-editor" cols="100" rows="20">
                                            @if (old('ud3noidung') != null)
                                            {{ old('ud3noidung', 'default') }}
                                            @else
                                            {{ $datadanhgiatapthe != null ? $datadanhgiatapthe->uu_diem_3_noi_dung : '' }}
                                            @endif
                                        </textarea>
                                    </td>
                                <tr>
                                <tr>
                                    <td></td>
                                    <td>Tự đánh giá về cấp độ thực hiện</td>
                                    <td class="danh-gia-cap-do">
                                        {{-- @foreach ($danhgia as $item => $capdo)
                                            <input type="radio" id="ud3danhgia{{ $capdo->cap_do_danh_gia_id }}"
                                                name="ud3danhgia" value="{{ $capdo->cap_do_danh_gia_id }}"
                                                @if ($datadanhgiatapthe != null) {{ $datadanhgiatapthe->uu_diem_3_danh_gia == $capdo->cap_do_danh_gia_id ? 'checked' : '' }} @endif />
                                            &nbsp;&nbsp;{{ $capdo->cap_do_danh_gia_ten }} &emsp;
                                        @endforeach --}}
                                        @if ($datadanhgiatapthe != null)
                                                <input type="hidden" id="ud3"
                                                    value="{{ $datadanhgiatapthe->uu_diem_3_danh_gia }}" />
                                            @endif
                                            <span><input type="radio" name="ud3danhgia" value="1" />Xuất Sắc</span>
                                            <span><input type="radio" name="ud3danhgia" value="2" />Tốt</span>
                                            <span><input type="radio" name="ud3danhgia" value="3" /> Trung bình</span>
                                            <span><input type="radio" name="ud3danhgia" value="4" /> Kém</span>
                                    </td>
                                </tr>
                                <tr style="border-top: solid 1px black">
                                    <td>
                                    </td>
                                    <td>
                                        4. Trách nhiệm của tập thể lãnh đạo, quản lý trong thực hiện
                                         nhiệm vụ chính trị của địa phương, tổ chức, cơ quan, đơn vị.
                                    </td>
                                    <td>
                                        <textarea name="ud4noidung" class="ck-editor" cols="100" rows="20">
                                            @if (old('ud4noidung') != null)
                                            {{ old('ud4noidung', 'default') }}
                                            @else
                                            {{ $datadanhgiatapthe != null ? $datadanhgiatapthe->uu_diem_4_noi_dung : '' }}
                                            @endif

                                        </textarea>
                                    </td>
                                <tr>
                                <tr>
                                    <td></td>
                                    <td>Tự đánh giá về cấp độ thực hiện</td>
                                    <td class="danh-gia-cap-do">
                                        {{-- @foreach ($danhgia as $item => $capdo)
                                            <input type="radio" id="ud4danhgia{{ $capdo->cap_do_danh_gia_id }}"
                                                name="ud4danhgia" value="{{ $capdo->cap_do_danh_gia_id }}"
                                                @if ($datadanhgiatapthe != null) {{ $datadanhgiatapthe->uu_diem_4_danh_gia == $capdo->cap_do_danh_gia_id ? 'checked' : '' }} @endif />
                                            &nbsp;&nbsp;{{ $capdo->cap_do_danh_gia_ten }} &emsp;
                                        @endforeach --}}
                                        @if ($datadanhgiatapthe != null)
                                                <input type="hidden" id="ud4"
                                                    value="{{ $datadanhgiatapthe->uu_diem_4_danh_gia }}" />
                                            @endif
                                            <span><input type="radio" name="ud4danhgia" value="1" />Xuất Sắc</span>
                                            <span><input type="radio" name="ud4danhgia" value="2" />Tốt</span>
                                            <span><input type="radio" name="ud4danhgia" value="3" /> Trung bình</span>
                                            <span><input type="radio" name="ud4danhgia" value="4" /> Kém</span>
                                    </td>
                                </tr>
                                {{-- <tr style="border-top: solid 1px black">
                                    <td>
                                    </td>
                                    <td>
                                        5. Kết quả lãnh đạo, chỉ đạo, thực hiện công tác kiểm tra,
                                        giám sát, kỷ luật đảng và thi đua, khen thưởng.
                                    </td>
                                    <td>
                                        <textarea name="ud5noidung" class="ck-editor" cols="100" rows="20">
                                            @if (old('ud5noidung') != null)
                                            {{ old('ud5noidung', 'default') }}
                                            @else
                                            {{ $datadanhgiatapthe != null ? $datadanhgiatapthe->uu_diem_5_noi_dung : '' }}
                                            @endif
                                        </textarea>
                                    </td>
                                <tr> --}}
                                {{-- <tr>
                                    <td></td>
                                    <td>Tự đánh giá về cấp độ thực hiện</td>
                                    <td class="danh-gia-cap-do"> --}}
                                        {{-- @foreach ($danhgia as $item => $capdo)
                                            <input type="radio" id="ud5danhgia{{ $capdo->cap_do_danh_gia_id }}"
                                                name="ud5danhgia" value="{{ $capdo->cap_do_danh_gia_id }}"
                                                @if ($datadanhgiatapthe != null) {{ $datadanhgiatapthe->uu_diem_5_danh_gia == $capdo->cap_do_danh_gia_id ? 'checked' : '' }} @endif />
                                            &nbsp;&nbsp;{{ $capdo->cap_do_danh_gia_ten }} &emsp;
                                        @endforeach --}}
                                        {{-- @if ($datadanhgiatapthe != null)
                                                <input type="hidden" id="ud5"
                                                    value="{{ $datadanhgiatapthe->uu_diem_5_danh_gia }}" />
                                            @endif
                                            <span><input type="radio" name="ud5danhgia" value="1" />Xuất Sắc</span>
                                            <span><input type="radio" name="ud5danhgia" value="2" />Tốt</span>
                                            <span><input type="radio" name="ud5danhgia" value="3" /> Trung bình</span>
                                            <span><input type="radio" name="ud5danhgia" value="4" /> Kém</span>
                                    </td>
                                </tr> --}}

                            </tbody>
                        </table>
                        <!-- Submit button -->
                        <div class="modal-footer">
                            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                <div class="card-toolbar">
                                    <div class="btn-group">
                                        @include('layout.base._button_save')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="ex2-tabs-4" role="tabpanel" aria-labelledby="ex2-tab-4">
                    <form class="form" method="post" id="formtapthetudanhgia4"
                        @if ($datadanhgiatapthe == null) action="{{ route('tapthetudanhgiaManage.storeTapTheTuDanhGia', ['user_id' => $user_id]) }}"
                    @else
                        action="{{ route('tapthetudanhgiaManage.updateTapTheTuDanhGia', ['user_id' => $user_id]) }}" @endif>
                        {{ csrf_field() }}
                        @if ($datadanhgiatapthe != null)
                            <input type="hidden" name="_method" value="PUT" />
                        @endif

                        <input type="hidden" id="tab-ii" name="tab" value="4" />
                        <table class="table" cellpadding="10px">
                            <thead>
                                <th>TT</th>
                                <th>Tiêu Chí</th>
                                <th>Nội dung tự đánh giá</th>
                            </thead>
                            <tbody>
                                <tr style="border-top: solid 1px black">
                                    <th>II</th>
                                    <th>Hạn chế, khuyết điểm và nguyên nhân</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        1. Hạn chế, khuyết điểm
                                    </td>
                                    <td>
                                        <textarea name="hanchekhuyetdiem" class="ck-editor" cols="100" rows="20">
                                            @if (old('hanchekhuyetdiem') != null)
                                            {{ old('hanchekhuyetdiem', 'default') }}
                                            @else
                                            {{ $datadanhgiatapthe != null ? $datadanhgiatapthe->han_che_khuyet_diem : '' }}
                                            @endif
                            </textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        2. Nguyên nhân của hạn chế, khuyết điểm.
                                    </td>
                                    <td>
                                        <textarea name="nguyennhanhanche" class="ck-editor" cols="100" rows="20">
                                            @if (old('nguyennhanhanche') != null)
                                            {{ old('nguyennhanhanche', 'default') }}
                                            @else
                                            {{ $datadanhgiatapthe != null ? $datadanhgiatapthe->nguyen_nhan_han_che : '' }}
                                            @endif
                            </textarea>
                                    </td>
                                </tr>
                                <tr style="border-top: solid 1px black">
                                    <th>III</th>
                                    <th>Kết quả khắc phục những hạn chế, khuyết điểm đã được  cấp có thẩm quyền
                                        kết luận hoặc được chỉ ra ở các kỳ kiểm điểm trước (và trong năm)</th>
                                    <td>
                                        <textarea name="ketquakhacphucnoidung" class="ck-editor" cols="100" rows="20">
                                            @if (old('ketquakhacphucnoidung') != null)
                                            {{ old('ketquakhacphucnoidung', 'default') }}
                                            @else
                                            {{ $datadanhgiatapthe != null ? $datadanhgiatapthe->ket_qua_khac_phuc_noi_dung : '' }}
                                            @endif
                                        </textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Tự đánh giá về cấp độ thực hiện</td>
                                    <td class="danh-gia-cap-do">
                                        {{-- @foreach ($danhgia as $item => $capdo)
                                            <input type="radio"
                                                id="ketquakhacphucdanhgia{{ $capdo->cap_do_danh_gia_id }}"
                                                name="ketquakhacphucdanhgia" value="{{ $capdo->cap_do_danh_gia_id }}"
                                                @if ($datadanhgiatapthe != null) {{ $datadanhgiatapthe->ket_qua_khac_phuc_danh_gia == $capdo->cap_do_danh_gia_id ? 'checked' : '' }} @endif />
                                            &nbsp;&nbsp;{{ $capdo->cap_do_danh_gia_ten }} &emsp;
                                        @endforeach --}}
                                        @if ($datadanhgiatapthe != null)
                                                <input type="hidden" id="kqkp"
                                                    value="{{ $datadanhgiatapthe->ket_qua_khac_phuc_danh_gia }}" />
                                            @endif
                                            <span><input type="radio" name="ketquakhacphucdanhgia" value="1" />Xuất Sắc</span>
                                            <span><input type="radio" name="ketquakhacphucdanhgia" value="2" />Tốt</span>
                                            <span><input type="radio" name="ketquakhacphucdanhgia" value="3" /> Trung bình</span>
                                            <span><input type="radio" name="ketquakhacphucdanhgia" value="4" /> Kém</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- Submit button -->
                        <div class="modal-footer">
                            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                <div class="card-toolbar">
                                    <div class="btn-group">
                                        @include('layout.base._button_save')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="ex2-tabs-5" role="tabpanel" aria-labelledby="ex2-tab-5">
                    <form class="form" method="post" id="formtapthetudanhgia5"
                        @if ($datadanhgiatapthe == null) action="{{ route('tapthetudanhgiaManage.storeTapTheTuDanhGia', ['user_id' => $user_id]) }}"
                    @else
                        action="{{ route('tapthetudanhgiaManage.updateTapTheTuDanhGia', ['user_id' => $user_id]) }}" @endif>
                        {{ csrf_field() }}
                        @if ($datadanhgiatapthe != null)
                            <input type="hidden" name="_method" value="PUT" />
                        @endif

                        <input type="hidden" id="tab-ii" name="tab" value="5" />
                        <table class="table" cellpadding="10px">
                            <thead>
                                <th>TT</th>
                                <th>Tiêu Chí</th>
                                <th>Nội dung tự đánh giá</th>
                            </thead>
                            <tbody>
                                <tr style="border-top: solid 1px black">
                                    <th>IV</th>
                                    <th>Giải trình những vấn đề được gợi ý kiểm điểm (nếu có)</th>
                                    <td>
                                        <textarea name="giaitrinhvande" class="ck-editor" cols="100" rows="20">
                                            @if (old('giaitrinhvande') != null)
                                            {{ old('giaitrinhvande', 'default') }}
                                            @else
                                            {{ $datadanhgiatapthe != null ? $datadanhgiatapthe->giai_trinh_van_de : '' }}
                                            @endif
                                        </textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th>V </th>
                                    <th>Trách nhiệm của tập thể, cá nhân.
                                    </th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        Về những hạn chế, khuyết điểm trong thực hiện nhiệm vụ chính trị;
                                        nguyên tắc tập trung dân chủ; các quy định, quy chế làm việc;
                                        công tác tổ chức, cán bộ; quản lý đảng viên; đổi mới phương thức lãnh đạo;
                                        các biện pháp đấu tranh phòng, chống tham nhũng, tiêu cực, lãng phí;
                                        kết quả xử lý sai phạm đối với tập thể, cá nhân...
                                    </td>
                                    <td>
                                        <textarea name="lamrotrachnhiem" class="ck-editor" cols="100" rows="20">
                                            @if (old('lamrotrachnhiem') != null)
                                            {{ old('lamrotrachnhiem', 'default') }}
                                            @else
                                            {{ $datadanhgiatapthe != null ? $datadanhgiatapthe->lam_ro_trach_nhiem : '' }}
                                            @endif
                                        </textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th>VI
                                    </th>
                                    <th>
                                        Phương hướng, biện pháp khắc phục hạn chế, khuyết điểm
                                    </th>
                                    <td>
                                        <textarea name="bienphapkhacphuc" class="ck-editor" cols="100" rows="20">
                                            @if (old('bienphapkhacphuc') != null)
                                            {{ old('bienphapkhacphuc', 'default') }}
                                            @else
                                            {{ $datadanhgiatapthe != null ? $datadanhgiatapthe->bien_phap_khac_phuc : '' }}
                                            @endif
                            </textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- Submit button -->
                        <div class="modal-footer">
                            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                <div class="card-toolbar">
                                    <div class="btn-group">
                                        @include('layout.base._button_save')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="ex2-tabs-6" role="tabpanel" aria-labelledby="ex2-tab-6">
                    <form class="form" method="post" id="formtapthetudanhgia6"
                        @if ($datadanhgiatapthe == null) action="{{ route('tapthetudanhgiaManage.storeTapTheTuDanhGia', ['user_id' => $user_id]) }}"
                    @else
                        action="{{ route('tapthetudanhgiaManage.updateTapTheTuDanhGia', ['user_id' => $user_id]) }}" @endif>
                        {{ csrf_field() }}
                        @if ($datadanhgiatapthe != null)
                            <input type="hidden" name="_method" value="PUT" />
                        @endif

                        <input type="hidden" id="tab-ii" name="tab" value="6" />
                        <table class="table" cellpadding="10px">
                            <thead>
                                <th>TT</th>
                                <th>Tiêu Chí</th>
                                <th>Nội dung tự đánh giá</th>
                            </thead>
                            <tbody>
                                <tr style="border-top: solid 1px black">
                                    <th>VII</th>
                                    <th>Tự nhận mức xếp loại chất lượng</th>
                                    <th>
                                        <input type="radio" id="tuxeploai1" name="tuxeploai" value="1"
                                            @if ($datadanhgiatapthe != null) {{ $datadanhgiatapthe->tu_xep_loai == 1 ? 'checked' : '' }} @endif>&nbsp;&nbsp;Hoàn
                                        Thành Xuất Sắc Nhiệm Vụ &emsp;
                                        <input type="radio" id="tuxeploai2" name="tuxeploai" value="2"
                                            @if ($datadanhgiatapthe != null) {{ $datadanhgiatapthe->tu_xep_loai == 2 ? 'checked' : '' }} @endif>&nbsp;&nbsp;Hoàn
                                        Thành Tốt Nhiệm Vụ &emsp;
                                        <input type="radio" id="tuxeploai3" name="tuxeploai" value="3"
                                            @if ($datadanhgiatapthe != null) {{ $datadanhgiatapthe->tu_xep_loai == 3 ? 'checked' : '' }} @endif>&nbsp;&nbsp;Hoàn
                                        Thành Nhiệm Vụ &emsp;
                                        <input type="radio" id="tuxeploai4" name="tuxeploai" value="4"
                                            @if ($datadanhgiatapthe != null) {{ $datadanhgiatapthe->tu_xep_loai == 4 ? 'checked' : '' }} @endif>&nbsp;&nbsp;Không
                                        Hoàn Thành Nhiệm Vụ &emsp;
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                        <!-- Submit button -->
                        <div class="modal-footer">
                            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                <div class="card-toolbar">
                                    <div class="btn-group">
                                        @include('layout.base._button_save')
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
    <script src="{{ asset('js/ckeditor5/build/ckeditor.js') }}"></script>
    <script>
        var allEditors = document.querySelectorAll('.ck-editor');
        for (var i = 0; i < allEditors.length; ++i) {
            ClassicEditor.create(allEditors[i])
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        }
        var tab = document.getElementById('tab-i').value;
        if (tab != '' && tab != null) document.getElementById("ex2-tab-" + tab).click();
        var listRadio = ['ud1', 'ud2', 'ud3', 'ud4', 'ud5', 'kqkp'];
        var listDG = ['ud1danhgia', 'ud2danhgia', 'ud3danhgia', 'ud4danhgia', 'ud5danhgia', 'ketquakhacphucdanhgia'];
        for (var i = 0; i < listRadio.length; i++) {
            var radio = document.getElementById(listRadio[i]).value;
            if (radio != '')
                document.getElementsByName(listDG[i])[radio - 1].checked = true;
        }

    </script>
@endsection
