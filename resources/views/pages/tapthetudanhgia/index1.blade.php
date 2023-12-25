@extends('layout.default')
@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Danh sách tập thể</h3>
            </div>
        </div>
        <div class="card-body">
            <div>
                @if (session('error'))
                <div class="alert alert-danger">
                    <p>{{ session('error') }}</p>
                </div>
                @endif
                <div>
                    <table class="table text-center table-sm table-bordered table-hover table-checkable" id="dstapthetudanhgia">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>ID nhóm</th>
                                <th>Tên nhóm</th>
                                <th>Chức năng</th>
                                <th>File</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datadanhgiatapthe as $item => $dv)
                                <tr>
                                    <td>{{ $item+1 }}</td>
                                    <td>{{ $datadanhgiatapthe[$item]->nhom_tap_the_id }}</td>
                                    <td>{{ $datadanhgiatapthe[$item]->nhom_tap_the_ten }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-default" href="{{ route('tapthetudanhgiaManage.indexTapTheTuDanhGia', ['user_id'=>$datadanhgiatapthe[$item]->nhom_tap_the_id]) }}">
                                            <i class="la la-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-success mb-1" target="_blank"
                                        href="{{ route('formPDF.form1', ['user_id' => $datadanhgiatapthe[$item]->nhom_tap_the_id]) }}">Xuất
                                        File PDF</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/pages/crud/datatables/tapthetudanhgia.js') }}" type="text/javascript"></script>
@endsection
