@extends('layout.default')
@section('content')
    <div class="card card-custom">
        <div class="card-body">
            <div>
                <div class="align-center">
                    <form class="form" action="{{ route('tieuchidanhgiataptheManage.updateTieuChiDanhGiaTapThe', ['tieu_chi_danh_gia_tap_the_id' => $info->tieu_chi_danh_gia_tap_the_id]) }}"
                        method="post" id="tcdgtaptheformedit">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT" />
                        <div class="form-outline mb-4">
                            <input type="text" id="tcdgtaptheten" name="tcdgtaptheten" value="{{ $info->tieu_chi_danh_gia_tap_the_noi_dung }}"
                                class="form-control" />
                            <label class="form-label" for="tcdgtaptheten">Nội dung tiêu chí</label>
                        </div>
                        <div class="form-outline mb-4" style="text-align: left">
                            <label>Trạng thái</label><br/>
                            <input type="hidden" id="check" name="check" value="{{ $info->tieu_chi_danh_gia_tap_the_active }}">
                            <input type="radio" id="active" name="tcdgtaptheactive" value="1" >&nbsp;&nbsp;Active<br/>
                            <input type="radio" id="inactive" name="tcdgtaptheactive" value="-1">&nbsp;&nbsp;Inactive<br/>
                        </div>
                        <div class="form-outline mb-4" style="text-align: left">
                            <label>Trạng thái nội dung tiêu chí</label><br/>
                            <input type="hidden" id="checknoidung" name="checknoidung" value="{{ $info->tieu_chi_danh_gia_tap_the_noi_dung_active }}">
                            <input type="radio" id="activenoidung" name="tcdgtaptheactivenoidung" value="1" >&nbsp;&nbsp;Active<br/>
                            <input type="radio" id="inactivenoidung" name="tcdgtaptheactivenoidung" value="-1">&nbsp;&nbsp;Inactive<br/>
                        </div>
                        <div class="form-outline mb-4" style="text-align: left">
                            <label>Trạng thái</label><br/>
                            <input type="hidden" id="checkdanhgia" name="checkdanhgia" value="{{ $info->tieu_chi_danh_gia_tap_the_danh_gia_active }}">
                            <input type="radio" id="activedanhgia" name="tcdgtaptheactivedanhgia" value="1" >&nbsp;&nbsp;Active<br/>
                            <input type="radio" id="inactivedanhgia" name="tcdgtaptheactivedanhgia" value="-1">&nbsp;&nbsp;Inactive<br/>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("script")
    {{-- check radio --}}
    <script>
        let check = document.getElementById("check").value==1?"active":"inactive";
        let checknoidung = document.getElementById("checknoidung").value==1?"activenoidung":"inactivenoidung";
        let checkdanhgia = document.getElementById("checkdanhgia").value==1?"activedanhgia":"inactivedanhgia";

        document.getElementById(check).setAttribute("checked", "true");
        document.getElementById(checknoidung).setAttribute("checked", "true");
        document.getElementById(checkdanhgia).setAttribute("checked", "true");
    </script>
@endsection
