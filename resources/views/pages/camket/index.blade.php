@extends('layout.default')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/icon_in_tabs.css') }}">
@endsection
@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">CAM KẾT</h3>
            </div>
            <div>
                <a class="btn btn-success mb-1" target="_blank"
                    href="{{ route('formPDF.formcamket', ['user_id' => $user_id]) }}">
                    Xuất File PDF
                </a>
                <a href="{{ route('camketManage.dsCamKet') }}" @include('layout.base._button_back')
                </a>
            </div>
        </div>
        <hr>
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
            <ul class="nav nav-pills nav-fill mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="ex2-tab-1" data-toggle="tab" href="#ex2-tabs-1" role="tab"
                        aria-controls="ex2-tabs-1" aria-selected="true">Cam kết - Trang 1 &ensp;<i
                            class="fa {{ $ttdg[1] }}"></i>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="ex2-tab-2" data-toggle="tab" href="#ex2-tabs-2" role="tab"
                        aria-controls="ex2-tabs-2" aria-selected="false">Cam kết - Trang 2 &ensp;<i
                            class="fa {{ $ttdg[2] }}"></i>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="ex2-tab-3" data-toggle="tab" href="#ex2-tabs-3" role="tab"
                        aria-controls="ex2-tabs-3" aria-selected="false">Cam kết - Trang 3 &ensp;<i
                            class="fa {{ $ttdg[3] }}"></i>
                    </a>
                </li>
            </ul>
            <!-- Tabs navs -->

            <!-- Tabs content -->

            <div class="tab-content" id="ex2-content">
                <div class="tab-pane fade show active" id="ex2-tabs-1" role="tabpanel" aria-labelledby="ex2-tab-1">
                    <form class="form" method="post" id="formcamket1"
                        @if ($datacamket == null) action="{{ route('camketManage.storeCamKet', ['user_id' => $user_id]) }}"
                    @else
                        action="{{ route('camketManage.updateCamKet', ['user_id' => $user_id]) }}" @endif>
                        {{ csrf_field() }}
                        @if ($datacamket != null)
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
                                <tr>
                                    <td>1
                                    </td>
                                    <td>
                                        Về tư tưởng chính trị
                                    </td>
                                    <td>
                                        <textarea name="tieuchi1" class="ck-editor" cols="100" rows="20">

@if (old('tieuchi1') != null)
{{ old('tieuchi1', 'default') }}
@else
{{ $datacamket != null ? $datacamket->tieu_chi_1 : '' }}
@endif
                                        </textarea>
                                    </td>
                                <tr>
                                <tr>
                                    <td>2
                                    </td>
                                    <td>
                                        Về phẩm chất đạo đức, lối sống
                                    </td>
                                    <td>
                                        <textarea name="tieuchi2" class="ck-editor" cols="100" rows="20">
                                            @if (old('tieuchi2') != null)
{{ old('tieuchi2', 'default') }}
@else
{{ $datacamket != null ? $datacamket->tieu_chi_2 : '' }}
@endif
                                        </textarea>
                                    </td>
                                <tr>

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
                    <form class="form" method="post" id="formcamket2"
                        @if ($datacamket == null) action="{{ route('camketManage.storeCamKet', ['user_id' => $user_id]) }}"
                    @else
                        action="{{ route('camketManage.updateCamKet', ['user_id' => $user_id]) }}" @endif>
                        {{ csrf_field() }}
                        @if ($datacamket != null)
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
                                <tr>
                                    <td>
                                        3
                                    </td>
                                    <td>
                                        Về ý thức tổ chức kỷ luật
                                    </td>
                                    <td>
                                        <textarea name="tieuchi3" class="ck-editor" cols="100" rows="20">
                                            @if (old('tieuchi3') != null)
{{ old('tieuchi3', 'default') }}
@else
{{ $datacamket != null ? $datacamket->tieu_chi_3 : '' }}
@endif
                                        </textarea>
                                    </td>
                                <tr>
                                <tr>
                                    <td>
                                        4
                                    </td>
                                    <td>
                                        Tác phong, lề lối làm việc
                                    </td>
                                    <td>
                                        <textarea name="tieuchi4" class="ck-editor" cols="100" rows="20">
                                            @if (old('tieuchi4') != null)
{{ old('tieuchi4', 'default') }}
@else
{{ $datacamket != null ? $datacamket->tieu_chi_4 : '' }}
@endif
                                        </textarea>
                                    </td>
                                <tr>

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
                    <form class="form" method="post" id="formcamket3"
                        @if ($datacamket == null) action="{{ route('camketManage.storeCamKet', ['user_id' => $user_id]) }}"
                    @else
                        action="{{ route('camketManage.updateCamKet', ['user_id' => $user_id]) }}" @endif>
                        {{ csrf_field() }}
                        @if ($datacamket != null)
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

                                <tr style="border-top: solid 1px black">
                                    <td>
                                        5
                                    </td>
                                    <td>
                                        Về thực hiện chức trách, nhiệm vụ được giao
                                    </td>
                                    <td>
                                        <textarea name="tieuchi5" class="ck-editor" cols="100" rows="20">
                                            @if (old('tieuchi5') != null)
                                                {{ old('tieuchi5', 'default') }}
                                            @else
                                                {{ $datacamket != null ? $datacamket->tieu_chi_5 : '' }}
                                            @endif
                                        </textarea>
                                    </td>
                                <tr>

                                <tr style="border-top: solid 1px black">
                                    <td>
                                        6
                                    </td>
                                    <td>
                                        Về khắc phục những hạn chế, khuyết điểm thời gian qua và qua kiểm điểm, đánh giá
                                        chất lượng cán bộ, đảng viên cuối năm… (nếu có).
                                    </td>
                                    <td>
                                        <textarea name="tieuchi6" class="ck-editor" cols="100" rows="20">
                                            @if (old('tieuchi6') != null)
                                                {{ old('tieuchi6', 'default') }}
                                            @else
                                                {{ $datacamket != null ? $datacamket->tieu_chi_6 : '' }}
                                            @endif
                                        </textarea>
                                    </td>
                                <tr>

                                <tr style="border-top: solid 1px black">
                                    <td>
                                        7
                                    </td>
                                    <td>
                                        Về kế hoạch hành động thực hiện Nghị quyết Đại hội XIII của Đảng (dành cho Chi ủy)
                                    </td>
                                    <td>
                                        <textarea name="tieuchi7" class="ck-editor" cols="100" rows="20">
                                            @if (old('tieuchi7') != null)
                                                {{ old('tieuchi7', 'default') }}
                                            @else
                                                {{ $datacamket != null ? $datacamket->tieu_chi_7 : '' }}
                                            @endif
                                        </textarea>
                                    </td>
                                <tr>
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
    <script src="{{ asset('js/dragbar.js') }}"></script>
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
        if (tab!=null && tab!="")
        document.getElementById("ex2-tab-" + tab).click();
    </script>
@endsection
