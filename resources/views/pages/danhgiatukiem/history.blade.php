@extends('layout.default')
@section('styles')
    <style>
        .container {
            max-width: 100%;
        }

        p {
            margin-bottom: 0px !important;
            padding: 10px 20px 10px 20px;
        }

        table {
            border-collapse: separate;
            border-spacing: 15px 0px!important;
        }

        .history {
            vertical-align: top;
        }

        .border {
            border: 1px solid #e0e0e0 !important;
        }
    </style>
@endsection
@section('content')
    <div class="card card-custom">
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
            <div>
                <div class="align-center nhat-ky"><b>Nhật ký cập nhật nội dung</b></div>
                @if ($logs->count() != 0)
                    <div style="display: none">{{ $i = 1 }}</div>
                    @foreach ($logs as $item => $log)
                        <div class="row border-top" style="padding: 10px 0 20px 0">
                            <div class="col-1">
                                {{ $i++ }}
                            </div>
                            <div class="col-11">
                                @if ($log->loai_thay_doi == 2)
                                    <span class="userten">{{ $log->user_ho_ten }}</span> đã thay đổi xếp loại tại
                                    <span class="vitrithaydoi">{{ $log->vi_tri_thay_doi }}</span> từ
                                    <span class="dulieucu">{{ $log->du_lieu_cu }}</span> thành
                                    <span class="dulieumoi">{{ $log->du_lieu_moi }}</span> vào <span
                                        class="thoigian">{{ $log->thoi_gian_thay_doi }}</span>
                                @else
                                    <span class="userten">{{ $log->user_ho_ten }}</span> đã thay đổi nội dung tại
                                    <span class="vitrithaydoi">{{ $log->vi_tri_thay_doi }}</span>, thời gian thay đổi <span class="thoigian">{{ $log->thoi_gian_thay_doi }}</span><br />
                                    <table cellpadding="10px" width="100%">
                                        <tr>
                                            <td width="50%">Từ</td>
                                            <td width="50%">Thành</td>
                                        </tr>
                                        <tr>
                                            <td class="border history">
                                                {!! $log->du_lieu_cu !!}
                                            </td>
                                            <td class="border history">
                                                {!! $log->du_lieu_moi !!}
                                            </td>
                                        </tr>
                                    </table>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="border-top"><i>Chưa có cập nhật nào</i></div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        // editor
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
    </script>
@endsection
