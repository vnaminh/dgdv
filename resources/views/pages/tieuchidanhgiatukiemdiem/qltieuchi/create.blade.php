@extends('layout.default')
@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Thêm mới tiêu chí tự kiểm điểm</h3>
            </div>
        </div>
        <div class="card-body">
            <form class="form" action="{{ route('tieuchidanhgiatukiemManage.storeTieuChiDanhGiaTuKiem') }}" method="post" id="tieuchidanhgiatukiemform">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-8">
                        <div class="my-5">
                            <div class="form-group row">
                                <label class="col-4">
                                    Nội dung tiêu chí
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-6">
                                    <textarea class="form-control" value="{{ old('tcdgtukiemten') }}"
                                        id="tcdgtukiemten" name="tcdgtukiemten">
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4">
                                    Trạng thái
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-6">
                                    <input type="radio" id="active" name="tcdgtukiemactive" value="1" checked>&nbsp;&nbsp;Sử dụng<br/>
                                    <input type="radio" id="inactive" name="tcdgtukiemactive" value="-1">&nbsp;&nbsp;Không sử dụng
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4">
                                    Tiêu chí có nội dung không?
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-6">
                                    <input type="radio" id="activenoidung" name="tcdgtukiemnoidungactive" value="1" checked>&nbsp;&nbsp;Có<br/>
                                    <input type="radio" id="inactivenoidung" name="tcdgtukiemnoidungactive" value="-1">&nbsp;&nbsp;Không có<br/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4">
                                    Tiêu chí có đánh giá cấp độ không?
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-6">
                                    <input type="radio" id="activedanhgia" name="tcdgtukiemdanhgiaactive" value="1" checked>&nbsp;&nbsp;Có<br/>
                                    <input type="radio" id="inactivedanhgia" name="tcdgtukiemdanhgiaactive" value="-1">&nbsp;&nbsp;Không có<br/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4">
                                    Chọn nhóm quyền có thể truy cập
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-6">
                                <select class="form-control" name="quyen">
                                    <option value="" disabled selected>Chọn nhóm quyền</option>
                                    @foreach ($quyen as $item)
                                        <option value="{{ $item->nhom_quyen_id }}">{{ $item->nhom_quyen_ten }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-toolbar">
                            <a href="{{ route('tieuchidanhgiatukiemManage.indexTieuChiDanhGiaTuKiem') }}"
                                @include('layout.base._button_back')
                            </a>
                            <div class="btn-group">
                                @include('layout.base._button_save')
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
