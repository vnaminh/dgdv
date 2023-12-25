@extends('layout.default')
@section('content')
    <input type="hidden" id="tab-i" value="{{ $tab }}" />
    {{-- {{ dd($tab) }} --}}
    {{-- {{ dd($tab) }} --}}
    <div class="card card-custom">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->toArray() != null)
                <div class="alert alert-danger">
                    Có nội dung không hợp lệ, kiểm tra và thử lại!
                </div>
            @endif
            <div>
                <!-- Tabs navs -->
                <ul class="nav nav-pills nav-fill mb-3" id="ex1" role="tablist">
                    @foreach ($tieuchi as $item => $value)
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab-{{ $item + 1 }}"
                                data-toggle="tab" href="#tabs-{{ $item + 1 }}" role="tab"
                                aria-controls="tabs-{{ $item + 1 }}" aria-selected="true">{{ $item + 1 }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                {{-- <input type="hidden" id="tab-i" name="tab" value="{{ $tab }}" /> --}}
                <div id="rightcol" class="tab-content border-top" id="tab-content">
                    @foreach ($tieuchi as $item => $value)
                    <div class="tab-pane fade" id="tabs-{{ $item + 1 }}" role="tabpanel" aria-labelledby="ex1-tab-{{ $item+1 }}">
                        <form class="form" method="post" id="danhgiatukiemform{{ $item+1 }}"
                            @if ($datadanhgiatukiem->count() == 0) action="{{ route('danhgiatukiemManage.storeDanhGiaTuKiem', ['user_id' => session()->get('user_id')]) }}"
                            @else action="{{ route('danhgiatukiemManage.updateDanhGiaTuKiem', ['tai_khoan_id' => session()->get('user_id')]) }}"
                            @endif>
                            {{ csrf_field() }}
                            @if ($datadanhgiatukiem->count() != 0)
                                <input type="hidden" name="_method" value="PUT" />
                            @endif
                            <input type="hidden" name="tab" value="{{ $item + 1 }}" />
                            <table cellpadding="10px" class="m-auto" width="100%">
                                <thead class="align-center">
                                    <th width="20%">Tiêu Chí</th>
                                    <th width="80%">Nội dung tự đánh giá</th>
                                </thead>
                                <tbody>
                                        @if ($value->tieu_chi_danh_gia_tu_kiem_noi_dung_active == -1)
                                            <tr class="border-top">
                                                <td colspan="2">
                                                    <b>{{ $item + 1 }}.{{ $value->tieu_chi_danh_gia_tu_kiem_noi_dung }}</b>
                                                </td>
                                            </tr>
                                        @else
                                            <tr class="border-top">
                                                <td><b>{{ $item + 1 }}.{{ $value->tieu_chi_danh_gia_tu_kiem_noi_dung }}</b>
                                                </td>
                                                <td>
                                                    @if ($errors->has('noidung' . $value->tieu_chi_danh_gia_tu_kiem_id))
                                                        <div class="error">
                                                            *{{ $errors->first('noidung' . $value->tieu_chi_danh_gia_tu_kiem_id) }}
                                                        </div>
                                                    @endif
                                                    <textarea name="noidung{{ $value->tieu_chi_danh_gia_tu_kiem_id }}" class="ck-editor" cols="100" rows="20">
                                                @if ($errors->has('noidung' . $value->tieu_chi_danh_gia_tu_kiem_id))
                                                    {{ old('noidung' . $value->tieu_chi_danh_gia_tu_kiem_id, 'default') }}
                                                @elseif ($datadanhgiatukiem->count() != 0)
                                                    {{ $datadanhgiatukiem[$item]->danh_gia_tu_kiem_noi_dung }}
                                                @endif
                                            </textarea>
                                                </td>
                                            <tr>
                                        @endif
                                        @if ($value->tieu_chi_danh_gia_tu_kiem_danh_gia_active == 1)
                                            <tr>
                                                <td><b>Đánh giá về cấp độ thực hiện</b></td>
                                                <td class="danh-gia-cap-do">
                                                    @foreach ($datacapdodanhgia as $e => $capdo)
                                                        <span>
                                                            <input type="radio"
                                                                name="danhgia{{ $value->tieu_chi_danh_gia_tu_kiem_id }}"
                                                                @if ($datadanhgiatukiem->count() != 0) {{ $datadanhgiatukiem[$item]->danh_gia_tu_kiem_danh_gia == $capdo->cap_do_danh_gia_id ? 'checked' : '' }} @endif
                                                                value="{{ $capdo->cap_do_danh_gia_id }}">&nbsp;{{ $capdo->cap_do_danh_gia_ten }}&emsp;
                                                        </span>
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endif
                                </tbody>
                            </table>
                            <!-- Submit button -->
                            <div class="align-center">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>
                        </form>
                    </div>
                    @endforeach
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
        $tab = document.getElementById('tab-i').value;
        if ($tab == null || $tab=="")
            document.getElementById('tab-1').click();
        else
            document.getElementById('tab-'+$tab).click();
    </script>
@endsection
