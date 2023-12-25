@extends('layout.default')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/icon_in_tabs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dragbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icon_in_tabs.css') }}">
    <style>
        .hethan {
            color: red;
            font-style: italic;
            padding: 0px 0 30px 0;
            font-size: 16px;
        }

        .disable {
            pointer-events: none;
        }

        .danh-gia-cap-do {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            align-content: center;
        }

        table {
            width: 100%;
        }

        .th-left {
            width: 25%;
        }

        .th-right {
            width: 75%;
        }
    </style>
@endsection
@section('content')
    {{-- {{ dd($datatukiemdiem) }} --}}
    {{-- {{ old }} --}}
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Tự kiểm điểm</h3>
            </div>
            <div>
                <a class="btn btn-success mb-1" target="_blank"
                    href="{{ route('formPDF.form2', ['user_id' => $user_id]) }}">
                    Xuất File PDF
                </a>
                <a href="{{ route('tukiemdiemManage.indexTuKiemDiem') }}" @include('layout.base._button_back')
                </a>
            </div>
        </div>
        <hr>
        <div class="card-body overflow">
            @if (session()->has('success'))
                <div class="alert alert-success pt-6 pb-6">
                    <div>{{ session()->get('success') }}</div>
                </div>
            @endif
            @if ($errors->toArray() != null)
                <div class="alert alert-danger pt-6 pb-6">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            @if ($quahan)
                <div class="hethan">Thời hạn đánh giá đã hết.</div>
            @endif
            <input type="hidden" id="tab-i" name="tab" value="{{ $tab }}" />
            <!-- Tabs navs -->
            <ul class="nav nav-pills nav-fill mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="tab-1" data-toggle="tab" href="#tabs-1" role="tab"
                        aria-controls="tabs-1" aria-selected="true">
                        Tự kiểm điểm - trang 1 &ensp;<i class="fa {{ $ttdg[1] }}"></i>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="tab-2" data-toggle="tab" href="#tabs-2" role="tab"
                        aria-controls="tabs-2" aria-selected="false">
                        Tự kiểm điểm - trang 2 &ensp;<i class="fa {{ $ttdg[2] }}"></i>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="tab-3" data-toggle="tab" href="#tabs-3" role="tab"
                        aria-controls="tabs-3" aria-selected="false">
                        Tự kiểm điểm - trang 3 &ensp;<i class="fa {{ $ttdg[3] }}"></i>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="tab-4" data-toggle="tab" href="#tabs-4" role="tab"
                        aria-controls="tabs-4" aria-selected="false">
                        Tự kiểm điểm - trang 4 &ensp;<i class="fa {{ $ttdg[4] }}"></i>
                    </a>
                </li>
                <li class="nav-item" {{ session()->get('quyen') < 1 ? 'hidden' : '' }} role="presentation">
                    <a class="nav-link" id="tab-5" data-toggle="tab" href="#tabs-5" role="tab"
                        aria-controls="tabs-5" aria-selected="false">
                        Lãnh đạo đơn vị đánh giá &ensp;<i class="fa {{ $ttdg[5] }}"></i>
                    </a>
                </li>
                <li class="nav-item" {{ session()->get('quyen') < 2 ? 'hidden' : '' }} role="presentation">
                    <a class="nav-link" id="tab-6" data-toggle="tab" href="#tabs-6" role="tab"
                        aria-controls="tabs-5" aria-selected="false">
                        Chi bộ đánh giá &ensp;<i class="fa {{ $ttdg[6] }}"></i>
                    </a>
                </li>
                <li class="nav-item" {{ session()->get('quyen') < 3 ? 'hidden' : '' }} role="presentation">
                    <a class="nav-link" id="tab-7" data-toggle="tab" href="#tabs-7" role="tab"
                        aria-controls="tabs-7" aria-selected="false">
                        Chi uỷ đánh giá &ensp;<i class="fa {{ $ttdg[7] }}"></i>
                    </a>
                </li>
            </ul>
            <!-- Tabs navs -->
            <div class="" id="page" onmouseup="EndDrag()" onmousemove="OnDrag(event)">
                <div id="leftcol" class="border-right border-top overflow tab-content border-top {{ $quahan==1?"disable":"" }}" id="tab-content">
                    {{-- Tu kiem diem - trang 1 --}}
                    <div class="tab-pane fade show active" id="tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                        <form class="form" method="post" id="frmtukiemdiem1"
                            @if ($datatukiemdiem == null) action="{{ route('tukiemdiemManage.storeTuKiemDiem', ['user_id' => $user_id]) }}"
                                @else
                                action="{{ route('tukiemdiemManage.updateTuKiemDiem', ['user_id' => $user_id]) }}" @endif>
                            {{ csrf_field() }}
                            {{-- {{  dd($datatukiemdiem->count()); }} --}}
                            @if ($datatukiemdiem != null)
                                {{ method_field('put') }}
                            @endif
                            <input type="hidden" id="tab" name="tab" value="1" />
                            <table cellpadding="10px" class="m-auto">
                                <thead class="align-center">
                                    <th class="th-left">Tiêu Chí</th>
                                    <th class="th-right">Nội dung tự đánh giá</th>
                                </thead>
                                <tbody>
                                    <tr class="border-top">
                                        <td colspan="2">
                                            <strong>I. Ưu điểm, kết quả đạt được</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b
                                                title="- Về tư tưởng chính trị
- Về phẩm chất đạo đức, lối sống
- Về ý thức tổ chức kỷ luật
- Về tác phong, lề lối làm việc
- Việc đấu tranh phòng, chống các biểu hiện suy thoái về tư tưởng chính trị, đạo đức, lối sống, “tự diễn biến”, “tự chuyển hóa” của cá nhân (Đối chiếu với các biểu hiện, cá nhân tự nhận diện theo Phụ lục đính kèm)">
                                                1. Về phẩm chất chính trị; phẩm chất đạo đức, lối sống; ý thức tổ chức
                                                kỷ
                                                luật; tác phong, lề lối làm việc?
                                        </b>
                                        </td>
                                        <td>
                                            @if ($errors->has('noidung1_1'))
                                                <div class="text-danger">*{{ $errors->first('noidung1_1') }}</div>
                                            @endif

                                            <textarea name="noidung1_1" class="ck-editor" cols="100" rows="20">
                                                @if (old('noidung1_1') != null)
{{ old('noidung1_1', 'default') }}
@else
{{ $datatukiemdiem != null ? $datatukiemdiem->uu_diem_1_noi_dung : '' }}
@endif
                                            </textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Đánh giá về cấp độ thực hiện</td>
                                        <td class="danh-gia-cap-do">
                                            @if (old('danhgia1_1'))
                                                <input type="hidden" id="ud1" value="{{ old('danhgia1_1') }}" />
                                            @endif
                                            @if ($datatukiemdiem != null)
                                                <input type="hidden" id="ud1"
                                                    value="{{ $datatukiemdiem->uu_diem_1_danh_gia }}" />
                                            @endif
                                            <span>
                                                <input type="radio" name="danhgia1_1" value="1" /> Xuất sắc
                                            </span>
                                            <span>
                                                <input type="radio" name="danhgia1_1" value="2" /> Tốt
                                            </span>
                                            <span>
                                                <input type="radio" name="danhgia1_1" value="3" /> Trung bình
                                            </span>
                                            <span>
                                                <input type="radio" name="danhgia1_1" value="4" /> Kém
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="border-top">
                                        <td>
                                            <b
                                                title="-  Việc thực hiện chức trách, quyền hạn theo quy định (đảng, chính quyền, đoàn thể).
- Kết quả thực hiện các chỉ tiêu, nhiệm vụ được giao trong năm.
- Trách nhiệm cá nhân liên quan đến kết quả, hạn chế, khuyết điểm ở lĩnh vực, địa phương, tổ chức, cơ quan, đơn vị do mình phụ trách.">
                                                2. Việc thực hiện nhiệm vụ, quyền hạn và kết quả thực hiện các chỉ tiêu, nhiệm vụ được giao trong năm.
                                            </b>
                                        </td>
                                        <td>
                                            @if ($errors->has('noidung1_2'))
                                                <div class="text-danger">*{{ $errors->first('noidung1_2') }}</div>
                                            @endif
                                            <textarea name="noidung1_2" class="ck-editor" cols="100" rows="20">
                                                @if (old('noidung1_2') != null)
                                                {{ old('noidung1_2', 'default') }}
                                                @else
                                                {{ $datatukiemdiem != null ? $datatukiemdiem->uu_diem_2_noi_dung : '' }}
                                                @endif
                                            </textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Đánh giá về cấp độ thực hiện</td>
                                        <td class="danh-gia-cap-do">
                                            @if (old('danhgia1_2'))
                                                <input type="hidden" id="ud2" value="{{ old('danhgia1_2') }}" />
                                            @endif
                                            @if ($datatukiemdiem != null)
                                                <input type="hidden" id="ud2"
                                                    value="{{ $datatukiemdiem->uu_diem_2_danh_gia }}" />
                                            @endif
                                            <span>
                                                <input type="radio" name="danhgia1_2" value="1" /> Xuất sắc
                                            </span>
                                            <span>
                                                <input type="radio" name="danhgia1_2" value="2" /> Tốt
                                            </span>
                                            <span>
                                                <input type="radio" name="danhgia1_2" value="3" /> Trung bình
                                            </span>
                                            <span>
                                                <input type="radio" name="danhgia1_2" value="4" /> Kém
                                            </span>
                                        </td>
                                    </tr>
                                    @if ($quyen_level==0)
                                        <tr class="border-top">
                                            <td>
                                                <b
                                                    title="Khi kiểm điểm cần đi sâu làm rõ về khối lượng, chất lượng, tiến độ, hiệu quả thực hiện nhiệm vụ được giao; tinh thần đổi mới, sáng tạo, tự chịu trách nhiệm; ý thức, thái độ phục vụ nhân dân.">
                                                    3. Việc thực hiện cam kết tu dưỡng, rèn luyện, phấn đấu hằng năm?
                                                </b>
                                            </td>
                                            <td>
                                                @if ($errors->has('noidung1_6'))
                                                    <div class="text-danger">*{{ $errors->first('noidung1_6') }}</div>
                                                @endif
                                                <textarea name="noidung1_6" class="ck-editor" cols="100" rows="20">
                                                    @if (old('noidung1_6') != null)
                                                    {{ old('noidung1_6', 'default') }}
                                                    @else
                                                    {{ $datatukiemdiem != null ? $datatukiemdiem->uu_diem_6_noi_dung : '' }}
                                                    @endif
                                                </textarea>
                                            </td>
                                        </tr>
                                    @else
                                        <tr class="border-top">
                                            <td>
                                                <b
                                                    title="">
                                                    3. Kết quả công tác lãnh đạo, chỉ đạo, quản lý, điều hành; thực hiện chức trách, nhiệm vụ; mức độ hoàn thành nhiệm vụ của các tổ chức, cơ quan, đơn vị thuộc quyền quản lý; khả năng quy tụ, xây dựng đoàn kết nội bộ.
                                                </b>
                                            </td>
                                            <td>
                                                @if ($errors->has('noidung1_3'))
                                                    <div class="text-danger">*{{ $errors->first('noidung1_3') }}</div>
                                                @endif
                                                <textarea name="noidung1_3" class="ck-editor" cols="100" rows="20">
                                                    @if (old('noidung1_3') != null)
                                                    {{ old('noidung1_3', 'default') }}
                                                    @else
                                                    {{ $datatukiemdiem != null ? $datatukiemdiem->uu_diem_3_noi_dung : '' }}
                                                    @endif
                                                </textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Đánh giá về cấp độ thực hiện</td>
                                            <td class="danh-gia-cap-do">
                                                @if (old('danhgia1_2'))
                                                    <input type="hidden" id="ud3" value="{{ old('danhgia1_3') }}" />
                                                @endif
                                                @if ($datatukiemdiem != null)
                                                    <input type="hidden" id="ud3"
                                                        value="{{ $datatukiemdiem->uu_diem_3_danh_gia }}" />
                                                @endif
                                                <span>
                                                    <input type="radio" name="danhgia1_3" value="1" /> Xuất sắc
                                                </span>
                                                <span>
                                                    <input type="radio" name="danhgia1_3" value="2" /> Tốt
                                                </span>
                                                <span>
                                                    <input type="radio" name="danhgia1_3" value="3" /> Trung bình
                                                </span>
                                                <span>
                                                    <input type="radio" name="danhgia1_3" value="4" /> Kém
                                                </span>
                                            </td>
                                        </tr>
                                        {{-- uu diem 4 --}}
                                        <tr class="border-top">
                                            <td>
                                                <b
                                                    title="">
                                                    4. Trách nhiệm trong công việc; tinh thần năng động, đổi mới, sáng tạo, dám nghĩ, dám làm, dám chịu trách nhiệm; xử lý những vấn đề khó, phức tạp, nhạy cảm trong thực hiện nhiệm vụ.
                                                </b>
                                            </td>
                                            <td>
                                                @if ($errors->has('noidung1_4'))
                                                    <div class="text-danger">*{{ $errors->first('noidung1_4') }}</div>
                                                @endif
                                                <textarea name="noidung1_4" class="ck-editor" cols="100" rows="20">
                                                    @if (old('noidung1_4') != null)
                                                    {{ old('noidung1_4', 'default') }}
                                                    @else
                                                    {{ $datatukiemdiem != null ? $datatukiemdiem->uu_diem_4_noi_dung : '' }}
                                                    @endif
                                                </textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Đánh giá về cấp độ thực hiện</td>
                                            <td class="danh-gia-cap-do">
                                                @if (old('danhgia1_4'))
                                                    <input type="hidden" id="ud4" value="{{ old('danhgia1_4') }}" />
                                                @endif
                                                @if ($datatukiemdiem != null)
                                                    <input type="hidden" id="ud4"
                                                        value="{{ $datatukiemdiem->uu_diem_4_danh_gia }}" />
                                                @endif
                                                <span>
                                                    <input type="radio" name="danhgia1_4" value="1" /> Xuất sắc
                                                </span>
                                                <span>
                                                    <input type="radio" name="danhgia1_4" value="2" /> Tốt
                                                </span>
                                                <span>
                                                    <input type="radio" name="danhgia1_4" value="3" /> Trung bình
                                                </span>
                                                <span>
                                                    <input type="radio" name="danhgia1_4" value="4" /> Kém
                                                </span>
                                            </td>
                                        </tr>
                                        {{-- uu diem 5 --}}
                                        <tr class="border-top">
                                            <td>
                                                <b
                                                    title="">
                                                    5. Trách nhiệm nêu gương của bản thân và gia đình; việc đấu tranh phòng, chống tham nhũng, tiêu cực, lãng phí; sự tín nhiệm của cán bộ, đảng viên.
                                                </b>
                                            </td>
                                            <td>
                                                @if ($errors->has('noidung1_5'))
                                                    <div class="text-danger">*{{ $errors->first('noidung1_5') }}</div>
                                                @endif
                                                <textarea name="noidung1_5" class="ck-editor" cols="100" rows="20">
                                                    @if (old('noidung1_5') != null)
                                                    {{ old('noidung1_5', 'default') }}
                                                    @else
                                                    {{ $datatukiemdiem != null ? $datatukiemdiem->uu_diem_5_noi_dung : '' }}
                                                    @endif
                                                </textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Đánh giá về cấp độ thực hiện</td>
                                            <td class="danh-gia-cap-do">
                                                @if (old('danhgia1_5'))
                                                    <input type="hidden" id="ud5" value="{{ old('danhgia1_5') }}" />
                                                @endif
                                                @if ($datatukiemdiem != null)
                                                    <input type="hidden" id="ud5"
                                                        value="{{ $datatukiemdiem->uu_diem_5_danh_gia }}" />
                                                @endif
                                                <span>
                                                    <input type="radio" name="danhgia1_5" value="1" /> Xuất sắc
                                                </span>
                                                <span>
                                                    <input type="radio" name="danhgia1_5" value="2" /> Tốt
                                                </span>
                                                <span>
                                                    <input type="radio" name="danhgia1_5" value="3" /> Trung bình
                                                </span>
                                                <span>
                                                    <input type="radio" name="danhgia1_5" value="4" /> Kém
                                                </span>
                                            </td>
                                        </tr>
                                        {{-- uu diem 6 --}}
                                        <tr class="border-top">
                                            <td>
                                                <b
                                                    title="Khi kiểm điểm cần đi sâu làm rõ về khối lượng, chất lượng, tiến độ, hiệu quả thực hiện nhiệm vụ được giao; tinh thần đổi mới, sáng tạo, tự chịu trách nhiệm; ý thức, thái độ phục vụ nhân dân.">
                                                    6. Việc thực hiện cam kết tu dưỡng, rèn luyện, phấn đấu hằng năm?
                                                </b>
                                            </td>
                                            <td>
                                                @if ($errors->has('noidung1_6'))
                                                    <div class="text-danger">*{{ $errors->first('noidung1_6') }}</div>
                                                @endif
                                                <textarea name="noidung1_6" class="ck-editor" cols="100" rows="20">
                                                    @if (old('noidung1_6') != null)
                                                    {{ old('noidung1_6', 'default') }}
                                                    @else
                                                    {{ $datatukiemdiem != null ? $datatukiemdiem->uu_diem_6_noi_dung : '' }}
                                                    @endif
                                                </textarea>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
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
                    {{-- tu kiem diem - trang 2 --}}
                    <div class="tab-pane fade" id="tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                        <form class="form" method="post" id="frmtukiemdiem2"
                            @if ($datatukiemdiem == null) action="{{ route('tukiemdiemManage.storeTuKiemDiem', ['user_id' => $user_id]) }}"
                            @else
                                action="{{ route('tukiemdiemManage.updateTuKiemDiem', ['user_id' => $user_id]) }}" @endif>
                            {{ csrf_field() }}
                            @if ($datatukiemdiem != null)
                                <input type="hidden" name="_method" value="PUT" />
                            @endif
                            <input type="hidden" id="tab" name="tab" value="2" />
                            <table cellpadding="10px" class="m-auto" >
                                <thead class="align-center">
                                    <th class="th-left">Tiêu Chí</th>
                                    <th class="th-right">Nội dung tự đánh giá</th>
                                </thead>
                                <tbody>
                                    <tr class="border-top">
                                        <td colspan="2">
                                            <strong>II. Hạn chế, khuyết điểm và nguyên nhân</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>1. Hạn chế, khuyết điểm (theo 3 nội dung nêu trên)</b>
                                        </td>
                                        <td>
                                            @if ($errors->has('noidung2_1'))
                                                <div class="text-danger">*{{ $errors->first('noidung2_1') }}</div>
                                            @endif
                                            <textarea name="noidung2_1" class="ck-editor" cols="100" rows="20">
                                                @if (old('noidung2_1') != null)
{{ old('noidung2_1', 'default') }}
@else
{{ $datatukiemdiem != null ? $datatukiemdiem->han_che_1_noi_dung : '' }}
@endif
                                            </textarea>
                                        </td>
                                    </tr>
                                    <tr class="border-top">
                                        <td>
                                            <b>2. Nguyên nhân của hạn chế, khuyết điểm.</b>
                                        </td>
                                        <td>
                                            @if ($errors->has('noidung2_2'))
                                                <div class="text-danger">*{{ $errors->first('noidung2_2') }}</div>
                                            @endif
                                            <textarea name="noidung2_2" class="ck-editor" cols="100" rows="20">
                                                @if (old('noidung2_2') != null)
{{ old('noidung2_2', 'default') }}
@else
{{ $datatukiemdiem != null ? $datatukiemdiem->han_che_2_noi_dung : '' }}
@endif
                                            </textarea>
                                        </td>
                                    </tr>
                                    <tr class="border-top p-2">
                                        <td>
                                            <strong
                                                title="Kiểm điểm rõ từng hạn chế, khuyết điểm (đã được khắc phục; đang khắc phục, mức độ khắc phục; chưa được khắc phục); những khó khăn, vướng mắc (nếu có); trách nhiệm của cá nhân.">
                                                III. Kết quả khắc phục những hạn chế, khuyết điểm đã được cấp có thẩm
                                                quyền
                                                kết luận hoặc được chỉ ra ở các kỳ kiểm điểm trước</strong>
                                        </td>
                                        <td>
                                            @if ($errors->has('noidung3'))
                                                <div class="text-danger">*{{ $errors->first('noidung3') }}</div>
                                            @endif
                                            <textarea name="noidung3" class="ck-editor" cols="100" rows="20">
                                                @if (old('noidung3') != null)
{{ old('noidung3', 'default') }}
@else
{{ $datatukiemdiem != null ? $datatukiemdiem->ket_qua_khac_phuc_noi_dung : '' }}
@endif
                                            </textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Đánh giá về cấp độ thực hiện</td>
                                        <td class="danh-gia-cap-do">
                                            @if (old('danhgia3'))
                                                <input type="hidden" id="kqkp" value="{{ old('danhgia3') }}" />
                                            @endif
                                            @if ($datatukiemdiem != null)
                                                <input type="hidden" id="kqkp"
                                                    value="{{ $datatukiemdiem->ket_qua_khac_phuc_danh_gia }}" />
                                            @endif
                                            <span><input type="radio" name="danhgia3" value="1" />Xuất
                                                sắc</span>
                                            <span><input type="radio" name="danhgia3" value="2" />Tốt</span>
                                            <span><input type="radio" name="danhgia3" value="3" />Trung
                                                bình</span>
                                            <span><input type="radio" name="danhgia3" value="4" />Kém</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
                    {{-- tu kiem diem trang 3 --}}
                    <div class="tab-pane fade" id="tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                        <form class="form" method="post" id="frmtukiemdiem3"
                            @if ($datatukiemdiem == null) action="{{ route('tukiemdiemManage.storeTuKiemDiem', ['user_id' => $user_id]) }}"
                            @else
                                action="{{ route('tukiemdiemManage.updateTuKiemDiem', ['user_id' => $user_id]) }}" @endif>
                            {{ csrf_field() }}
                            @if ($datatukiemdiem != null)
                                <input type="hidden" name="_method" value="PUT" />
                            @endif
                            <input type="hidden" id="tab" name="tab" value="3" />
                            <table cellpadding="10px" class="m-auto">
                                <thead class="align-center">
                                    <th class="th-left">Tiêu Chí</th>
                                    <th class="th-right">Nội dung tự đánh giá</th>
                                </thead>
                                <tbody>
                                    <tr class="border-top">
                                        <td>
                                            <strong
                                                title="Giải trình từng vấn đề được gợi ý kiểm điểm, nêu nguyên nhân, xác định trách nhiệm của cá nhân đối với từng vấn đề được gợi ý kiểm điểm.">
                                                IV. Giải trình những vấn đề được gợi ý kiểm điểm (nếu có)
                                            </strong>
                                        </td>
                                        <td>
                                            @if ($errors->has('noidung4'))
                                                <div class="text-danger">*{{ $errors->first('noidung4') }}</div>
                                            @endif
                                            <textarea name="noidung4" class="ck-editor" cols="100" rows="20">
                                                @if (old('noidung4') != null)
{{ old('noidung4', 'default') }}
@else
{{ $datatukiemdiem != null ? $datatukiemdiem->giai_trinh : '' }}
@endif
                                            </textarea>
                                        </td>
                                    </tr>
                                    <tr class="border-top">
                                        <td>
                                            <strong>V. Làm rõ trách nhiệm của cá nhân đối với những hạn chế, khuyết điểm
                                                của
                                                tập thể (nếu có)</strong>
                                        </td>
                                        <td>
                                            @if ($errors->has('noidung5'))
                                                <div class="text-danger">*{{ $errors->first('noidung5') }}</div>
                                            @endif
                                            <textarea name="noidung5" class="ck-editor" cols="100" rows="20">
                                                @if (old('noidung5') != null)
{{ old('noidung5', 'default') }}
@else
{{ $datatukiemdiem != null ? $datatukiemdiem->lam_ro_trach_nhiem : '' }}
@endif
                                            </textarea>
                                        </td>
                                    </tr>
                                    <tr class="border-top">
                                        <td>
                                            <strong>VI. Phương hướng, biện pháp khắc phục hạn chế, khuyết điểm</strong>
                                        </td>
                                        <td>
                                            @if ($errors->has('noidung6'))
                                                <div class="text-danger">*{{ $errors->first('noidung6') }}</div>
                                            @endif
                                            <textarea name="noidung6" class="ck-editor" cols="100" rows="20">
                                                    @if (old('noidung6') != null)
{{ old('noidung6', 'default') }}
@else
{{ $datatukiemdiem != null ? $datatukiemdiem->bien_phap_khac_phuc : '' }}
@endif
                                            </textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
                    {{-- tu kiem diem trang 4 --}}
                    <div class="tab-pane fade" id="tabs-4" role="tabpanel" aria-labelledby="ex1-tab-4">
                        <form class="form" method="post" id="frmtukiemdiem4"
                            @if ($datatukiemdiem == null) action="{{ route('tukiemdiemManage.storeTuKiemDiem', ['user_id' => $user_id]) }}"
                            @else
                                action="{{ route('tukiemdiemManage.updateTuKiemDiem', ['user_id' => $user_id]) }}" @endif>
                            {{ csrf_field() }}
                            @if ($datatukiemdiem != null)
                                <input type="hidden" name="_method" value="PUT" />
                            @endif
                            <input type="hidden" id="tab" name="tab" value="4" />
                            <table cellpadding="10px" class="m-auto">
                                <thead class="align-center">
                                    <th class="th-left">Tiêu Chí</th>
                                    <th class="th-right">Nội dung tự đánh giá</th>
                                </thead>
                                <tbody>
                                    <tr class="border-top">
                                        <td colspan="2">
                                            <strong>VII. Tự nhận mức xếp loại chất lượng</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Xếp loại cán bộ, công chức, viên chức</td>
                                        <td class="danh-gia-cap-do">
                                            <div>
                                                @if (old('danhgia7_1'))
                                                    <input type="hidden" id="xlcb" value="{{ old('danhgia7_1') }}" />
                                                @endif
                                                @if ($datatukiemdiem != null)
                                                    <input type="hidden" id="xlcb"
                                                        value="{{ $datatukiemdiem->tu_nhan_muc_xl_can_bo }}" />
                                                @endif
                                                <div><input type="radio" name="danhgia7_1" value="1" />
                                                    Hoàn thành xuất sắc nhiệm vụ
                                                </div>
                                                <div><input type="radio" name="danhgia7_1" value="2" />
                                                    Hoàn thành tốt nhiệm vụ
                                                </div>
                                                <div><input type="radio" name="danhgia7_1" value="3" />
                                                    Hoàn thành nhiệm vụ
                                                </div>
                                                <div><input type="radio" name="danhgia7_1" value="4" />
                                                    Không hoàn thành nhiệm vụ
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Xếp loại đảng viên</td>
                                        <td class="danh-gia-cap-do">
                                            <div>
                                                @if (old('danhgia7_2'))
                                                    <input type="hidden" id="xldv" value="{{ old('danhgia7_2') }}" />
                                                @endif
                                                @if ($datatukiemdiem != null)
                                                    <input type="hidden" id="xldv"
                                                        value="{{ $datatukiemdiem->tu_nhan_muc_xl_dang_vien }}" />
                                                @endif
                                                <div>
                                                    <input type="radio" name="danhgia7_2" value="1" />
                                                    Hoàn thành xuất sắc nhiệm vụ
                                                </div>
                                                <div><input type="radio" name="danhgia7_2" value="2" />
                                                    Hoàn thành tốt nhiệm vụ
                                                </div>
                                                <div><input type="radio" name="danhgia7_2" value="3" />
                                                    Hoàn thành nhiệm vụ
                                                </div>
                                                <div><input type="radio" name="danhgia7_2" value="4" />
                                                    Không hoàn thành nhiệm vụ
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
                    {{-- Lãnh đạo đơn vị đánh giá --}}
                    <div class="tab-pane fade" id="tabs-5" role="tabpanel" aria-labelledby="ex1-tab-5">
                        <form class="form" method="post" id="frmtukiemdiem5"
                            @if ($datatukiemdiem == null) action="{{ route('tukiemdiemManage.storeTuKiemDiem', ['user_id' => $user_id]) }}"
                            @else
                                action="{{ route('tukiemdiemManage.updateTuKiemDiem', ['user_id' => $user_id]) }}" @endif>
                            {{ csrf_field() }}
                            @if ($datatukiemdiem != null)
                                <input type="hidden" name="_method" value="PUT" />
                            @endif
                            <input type="hidden" id="tab" name="tab" value="5" />
                            <table cellpadding="10px" class="m-auto">
                                <thead class="align-center">
                                    <th class="th-left">Tiêu Chí</th>
                                    <th class="th-right">Nội dung tự đánh giá</th>
                                </thead>
                                <tbody>
                                    <tr class="border-top">
                                        <td colspan="2">
                                            <strong>VIII. Đánh giá, xếp loại chất lượng công chức, viên chức</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nhận xét đánh giá của người quản lý, sử dụng công chức viên chức</td>
                                        <td>
                                            @if ($errors->has('noidung8'))
                                                <div class="text-danger">*{{ $errors->first('noidung8') }}</div>
                                            @endif
                                            <textarea name="noidung8" class="ck-editor" cols="100" rows="20">
                                                @if (old('noidung8') != null)
{{ old('noidung8', 'default') }}
@else
{{ $datatukiemdiem != null ? $datatukiemdiem->lanh_dao_don_vi_noi_dung : '' }}
@endif
                                            </textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lãnh đạo đơn vị xếp loại</td>
                                        <td class="danh-gia-cap-do">
                                            @if (old('danhgia8'))
                                                <input type="hidden" id="lddvxl" value="{{ old('danhgia8') }}" />
                                            @endif
                                            @if ($datatukiemdiem != null)
                                                <input type="hidden" id="lddvxl"
                                                    value="{{ $datatukiemdiem->lanh_dao_don_vi_danh_gia }}" />
                                            @endif
                                            <span><input type="radio" name="danhgia8" value="1" /> Xuất
                                                sắc</span>
                                            <span><input type="radio" name="danhgia8" value="2" /> Tốt</span>
                                            <span><input type="radio" name="danhgia8" value="3" /> Trung
                                                bình</span>
                                            <span><input type="radio" name="danhgia8" value="4" /> Kém</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
                    {{-- Chi bo danh gia --}}
                    <div class="tab-pane fade" id="tabs-6" role="tabpanel" aria-labelledby="ex1-tab-6">
                        <form class="form" method="post" id="frmtukiemdiem6"
                            @if ($datatukiemdiem == null) action="{{ route('tukiemdiemManage.storeTuKiemDiem', ['user_id' => $user_id]) }}"
                            @else
                                action="{{ route('tukiemdiemManage.updateTuKiemDiem', ['user_id' => $user_id]) }}" @endif>
                            {{ csrf_field() }}
                            @if ($datatukiemdiem != null)
                                <input type="hidden" name="_method" value="PUT" />
                            @endif
                            <input type="hidden" id="tab" name="tab" value="6" />
                            <table cellpadding="10px" class="m-auto">
                                <thead class="align-center">
                                    <th class="th-left">Tiêu Chí</th>
                                    <th class="th-right">Nội dung đánh giá</th>
                                </thead>
                                <tbody>
                                    <tr class="border-top">
                                        <td colspan="2">
                                            <strong>IX. Đánh giá, xếp loại chất lượng đảng viên</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nhận xét, đánh giá của chi ủy, chi bộ đề xuất mức xếp loại</td>
                                        <td>
                                            @if ($errors->has('noidung9'))
                                                <div class="text-danger">*{{ $errors->first('noidung9') }}</div>
                                            @endif
                                            <textarea name="noidung9" class="ck-editor" cols="100" rows="20">
                                                @if (old('noidung9') != null)
{{ old('noidung9', 'default') }}
@else
{{ $datatukiemdiem != null ? $datatukiemdiem->chi_bo_noi_dung : '' }}
@endif
                                            </textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Chi bộ đề xuất xếp loại</td>
                                        <td class="danh-gia-cap-do">
                                            @if (old('danhgia9'))
                                                <input type="hidden" id="cbxl" value="{{ old('danhgia9') }}" />
                                            @endif
                                            @if ($datatukiemdiem != null)
                                                <input type="hidden" id="cbxl"
                                                    value="{{ $datatukiemdiem->chi_bo_danh_gia }}" />
                                            @endif
                                            <span><input type="radio" name="danhgia9" value="1" /> Hoàn thành
                                                xuất sắc</span>
                                            <span><input type="radio" name="danhgia9" value="2" /> Hoàn thành
                                                tốt</span>
                                            <span><input type="radio" name="danhgia9" value="3" /> Hoàn
                                                thành</span>
                                            <span><input type="radio" name="danhgia9" value="4" /> Không hoàn
                                                thành</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
                    {{-- Chi uy loai chat luong --}}
                    <div class="tab-pane fade" id="tabs-7" role="tabpanel" aria-labelledby="ex1-tab-7">
                        <form class="form" method="post" id="frmtukiemdiem7"
                            @if ($datatukiemdiem == null) action="{{ route('tukiemdiemManage.storeTuKiemDiem', ['user_id' => $user_id]) }}"
                            @else
                                action="{{ route('tukiemdiemManage.updateTuKiemDiem', ['user_id' => $user_id]) }}" @endif>
                            {{ csrf_field() }}
                            @if ($datatukiemdiem != null)
                                <input type="hidden" name="_method" value="PUT" />
                            @endif
                            <input type="hidden" id="tab" name="tab" value="7" />
                            <table cellpadding="10px" class="m-auto">
                                <thead class="align-center">
                                    <th class="th-left">Tiêu Chí</th>
                                    <th class="th-right">Nội dung đánh giá</th>
                                </thead>
                                <tbody>
                                    <tr class="border-top">
                                        <td colspan="2">
                                            <strong>X. Chi uỷ cơ sở xếp loại chất lượng</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Đảng uỷ, chi uỷ cơ sở xếp loại chất lượng</td>
                                        <td class="danh-gia-cap-do">
                                            <div>
                                                @if (old('danhgia10'))
                                                    <input type="hidden" id="cuxl" value="{{ old('danhgia10') }}" />
                                                @endif
                                                @if ($datatukiemdiem != null)
                                                    <input type="hidden" id="cuxl"
                                                        value="{{ $datatukiemdiem->chi_uy_danh_gia }}" />
                                                @endif
                                                <div><input type="radio" name="danhgia10" value="1" />
                                                    Hoàn thành xuất sắc
                                                </div>
                                                <div><input type="radio" name="danhgia10" value="2" />
                                                    Hoàn thành tốt
                                                </div>
                                                <div><input type="radio" name="danhgia10" value="3" />
                                                    Hoàn thành
                                                </div>
                                                <div><input type="radio" name="danhgia10" value="4" />
                                                    Không hoàn thành
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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

                <!-- Dragbar -->
                <div id="dragbar" onmousedown="StartDrag()"></div>

                <!-- Tabs content -->
                <div id="rightcol" class="overflow-auto">
                    <div class="text-center nhat-ky pt-3">
                        <b>Nhật ký cập nhật nội dung</b>&ensp;
                        <a href=" {{ route('tukiemdiemManage.historyTuKiemDiem', ['user_id' => $user_id]) }} "
                            target="_blank" title="Nhấn vào để xem toàn bộ nhật ký">
                            <b>Xem tất cả</b>
                        </a>
                    </div>
                    @if ($logs->count() != 0)
                        @foreach ($logs as $item => $log)
                            <div class="border-top">
                                <details>
                                    <summary title="Nhấn vào để xem chi tiết">
                                        @if ($log->loai_thay_doi == 2)
                                            <span class="userten">{{ $log->user_ho_ten }}</span> đã thay đổi xếp loại
                                            tại
                                            <span class="vitrithaydoi">{{ $log->vi_tri_thay_doi }}</span> từ <span
                                                class="dulieucu">{{ $log->du_lieu_cu }}</span> thành
                                            <span class="dulieumoi">{{ $log->du_lieu_moi }}</span> vào <span
                                                class="thoigian">{{ $log->thoi_gian_thay_doi }}</span>
                                        @else
                                            <span class="userten">{{ $log->user_ho_ten }}</span> đã thay đổi nội dung tại
                                            <span class="vitrithaydoi">{{ $log->vi_tri_thay_doi }}</span> vào <span
                                                class="thoigian">{{ $log->thoi_gian_thay_doi }}</span>
                                        @endif
                                    </summary>
                                    <div class="border" style="padding: 10px">
                                        @if ($log->loai_thay_doi == 2)
                                            <span class="userten">{{ $log->user_ho_ten }}</span> đã thay đổi xếp loại
                                            tại
                                            <span class="vitrithaydoi">{{ $log->vi_tri_thay_doi }}</span> từ <span
                                                class="dulieucu">{{ $log->du_lieu_cu }}</span> thành
                                            <span class="dulieumoi">{{ $log->du_lieu_moi }}</span><br /> thời gian
                                            thay đổi <span class="thoigian">{{ $log->thoi_gian_thay_doi }}</span>
                                        @else
                                            <span class="userten">{{ $log->user_ho_ten }}</span> đã thay đổi nội dung
                                            tại
                                            <span class="vitrithaydoi">{{ $log->vi_tri_thay_doi }}</span><br /> từ
                                            <span class="">{!! $log->du_lieu_cu !!}</span> thành
                                            <span class="">{!! $log->du_lieu_moi !!}</span> thời gian
                                            thay đổi <span class="thoigian">{{ $log->thoi_gian_thay_doi }}</span>
                                        @endif
                                    </div>
                                    <br />
                                </details>
                            </div>
                        @endforeach
                    @else
                        <div class="border-top"><i>Chưa có cập nhật nào</i></div>
                    @endif
                </div>
                <!-- Tabs content -->
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/dragbar.js') }}"></script>
    <script src="{{ asset('js/ckeditor5/build/ckeditor.js') }}"></script>
    <script>
        // editor
        var allEditors = document.querySelectorAll('.ck-editor');
        for (var i = 0; i < allEditors.length; ++i) {
            ClassicEditor.defaultConfig.toolbar.viewportTopOffset = 118; // co dinh top
            // ClassicEditor.defaultConfig.toolbar.viewportBottomOffset = 118; // co dinh bottom
            ClassicEditor.create(allEditors[i])
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        }

        // tabs
        var tab = document.getElementById('tab-i').value;
        if (tab != '' && tab != null) document.getElementById("tab-" + tab).click();

        //radio checked
        //xlcb: Xếp loại cán bộ
        //xldv: Xếp loại đảng viên
        //kqkp: Kết quả khác phục hạn chế
        //lddvxl: Lãnh đạo đơn vị xếp loại
        //cbxl: Chi bộ đề xuất xếp loại
        //cuxl: Chi uỷ xếp loại
        @php
            if ($quyen_level==0) echo "var listRadio = ['ud1', 'ud2', 'kqkp', 'xlcb', 'xldv', 'lddvxl', 'cbxl', 'cuxl'];"
                                     ."var listDG = ['danhgia1_1', 'danhgia1_2', 'danhgia3', 'danhgia7_1', 'danhgia7_2', 'danhgia8', 'danhgia9', 'danhgia10'];";

            else echo "var listRadio = ['ud1', 'ud2', 'ud3', 'ud4', 'ud5', 'kqkp', 'xlcb', 'xldv', 'lddvxl', 'cbxl', 'cuxl'];"
                     ."var listDG = ['danhgia1_1', 'danhgia1_2', 'danhgia1_3', 'danhgia1_4', 'danhgia1_5', 'danhgia3', 'danhgia7_1', 'danhgia7_2', 'danhgia8', 'danhgia9', 'danhgia10'];"
        @endphp

        for (var i = 0; i < listRadio.length; i++) {
            var radio = document.getElementById(listRadio[i]).value;
            if (radio != '')
                document.getElementsByName(listDG[i])[radio - 1].checked = true;
        }
    </script>
@endsection
