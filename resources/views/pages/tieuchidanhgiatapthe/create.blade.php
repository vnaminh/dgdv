@extends('layout.default')
@section('content')
    <div class="card card-custom">
        <div class="card-body">
            <div>
                <div class="align-center">
                    <form class="form" action="{{ route('tieuchidanhgiataptheManage.storeTieuChiDanhGiaTapThe') }}" method="post" id="tieuchidanhgiataptheform">
                        {{ csrf_field() }}
                        <div class="form-outline mb-4">
                            <input type="text" id="tcdgtaptheten" name="tcdgtaptheten" class="form-control" />
                            <label class="form-label" for="ten">Nội dung tiêu chí</label>
                        </div>
                        <div class="form-outline mb-4" style="text-align: left">
                            <label>Trạng thái</label><br/>
                            <input type="radio" id="active" name="tcdgtaptheactive" value="1" checked>&nbsp;&nbsp;Active<br/>
                            <input type="radio" id="inactive" name="tcdgtaptheactive" value="-1">&nbsp;&nbsp;Inactive<br/>
                        </div>
                        <div class="form-outline mb-4" style="text-align: left">
                            <label>Trạng thái nội dung tiêu chi</label><br/>
                            <input type="radio" id="activenoidung" name="tcdgtaptheactivenoidung" value="1" checked>&nbsp;&nbsp;Active<br/>
                            <input type="radio" id="inactivenoidung" name="tcdgtaptheactivenoidung" value="-1">&nbsp;&nbsp;Inactive<br/>
                        </div>
                        <div class="form-outline mb-4" style="text-align: left">
                            <label>Trạng thái đánh giá tiêu chí</label><br/>
                            <input type="radio" id="activedanhgia" name="tcdgtaptheactivedanhgia" value="1" checked>&nbsp;&nbsp;Active<br/>
                            <input type="radio" id="inactivedanhgia" name="tcdgtaptheactivedanhgia" value="-1">&nbsp;&nbsp;Inactive<br/>
                        </div>
                        <!-- Submit button -->
                        <div class="align-center">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
