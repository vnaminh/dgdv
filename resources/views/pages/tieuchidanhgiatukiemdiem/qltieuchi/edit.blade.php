@extends('layout.default')
@section('content')
    <div class="card card-custom">
        <div class="card-body">
            <div>
                <div class="align-center">
                    <form class="form" action="{{ route('tieuchidanhgiatukiemManage.updateTieuChiDanhGiaTuKiem', ['tieu_chi_danh_gia_tu_kiem_id' => $info->tieu_chi_danh_gia_tu_kiem_id]) }}"
                        method="post" id="tcdgtukiemformedit">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT" />
                        <div class="form-outline mb-4">
                            <input type="text" id="tcdgtukiemnoidung" name="tcdgtukiemnoidung" value="{{ $info->tieu_chi_danh_gia_tu_kiem_noi_dung }}"
                                class="form-control" />
                            <label class="form-label" for="tcdgtukiemten">Nội dung tiêu chí</label>
                        </div>
                        <div class="form-outline mb-4" style="text-align: left">
                            <label>Trạng thái</label><br/>
                            <input type="hidden" id="check" name="check" value="{{ $info->tieu_chi_danh_gia_tu_kiem_active }}">
                            <input type="radio" id="active" name="tcdgtukiemactive" value="1" >&nbsp;&nbsp;Active<br/>
                            <input type="radio" id="inactive" name="tcdgtukiemactive" value="-1">&nbsp;&nbsp;Inactive<br/>
                        </div>
                        <div class="form-outline mb-4" style="text-align: left">
                            <label>Trạng thái nội dung tiêu chí</label><br/>
                            <input type="hidden" id="checknoidung" name="checknoidung" value="{{ $info->tieu_chi_danh_gia_tu_kiem_noi_dung_active }}">
                            <input type="radio" id="activenoidung" name="tcdgtukiemnoidungactive" value="1" >&nbsp;&nbsp;Active<br/>
                            <input type="radio" id="inactivenoidung" name="tcdgtukiemnoidungactive" value="-1">&nbsp;&nbsp;Inactive<br/>
                        </div>
                        <div class="form-outline mb-4" style="text-align: left">
                            <label>Trạng thái</label><br/>
                            <input type="hidden" id="checkdanhgia" name="checkdanhgia" value="{{ $info->tieu_chi_danh_gia_tu_kiem_danh_gia_active }}">
                            <input type="radio" id="activedanhgia" name="tcdgtukiemdanhgiaactive" value="1" >&nbsp;&nbsp;Active<br/>
                            <input type="radio" id="inactivedanhgia" name="tcdgtukiemdanhgiaactive" value="-1">&nbsp;&nbsp;Inactive<br/>
                        </div>
                        <div class="form-outline mb-4" style="text-align: left">
                            <label>Nhóm có quyền truy cập</label>
                            <select class="form-select" name="quyen">
                                <option value="{{ $info->tieu_chi_danh_gia_tu_kiem_quyen }}" selected>
                                    {{ $info->nhom_quyen_ten }}
                                </option>
                                @foreach ($quyen as $item)
                                    <option value="{{ $item->nhom_quyen_level }}">{{ $item->nhom_quyen_ten }}</option>
                                @endforeach
                            </select>
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
