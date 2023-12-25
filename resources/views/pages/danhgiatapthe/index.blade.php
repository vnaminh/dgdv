@extends('layout.default')
@section('content')
    <div class="card card-custom">
        @if (session('success'))
            <div class="alert alert-success">
                <p>{{ session('success') }}</p>
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
        <ul class="nav nav-tabs nav-fill mb-3" id="ex1" role="tablist">
            @foreach ($tieuchi as $item => $value)
                @if ($item >= $tieuchi->count() / 2)
                @break
            @endif
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ $item == 0 ? 'active' : '' }}" id="ex2-tab-{{ $item + 1 }}"
                    data-mdb-toggle="tab" href="#ex2-tabs-{{ $item + 1 }}" role="tab"
                    aria-controls="ex2-tabs-{{ $item + 1 }}"
                    aria-selected="true">{{ 'F'.(2*($item)+1) }}
                    @if ($tieuchi->count()>=(2*$item+2))
                    {{ ',F'.(2*($item)+2) }}
                    @endif

                    </a>
            </li>
        @endforeach

    </ul>

    <div class="card-body">
        <div>
            <div class="tab-content" id="ex2-content">
                @foreach ($tieuchi as $item => $value)
                @if ($item >= $tieuchi->count() / 2)
                @break
            @endif
                    <div class="tab-pane fade {{ $tab==$item+1||($tab==''&& $item+1==1)?'show':'' }} {{ $tab==$item+1||($tab==''&& $item+1==1)?'active':'' }}" id="ex2-tabs-{{ $item + 1 }}" role="tabpanel"
                        aria-labelledby="ex2-tab-{{ $item + 1 }}">
                        <form class="form" method="post" id="formdanhgiatapthe{{ $item + 1 }}"
                            @if ($datadanhgiatapthe->count() == 0) action="{{ route('danhgiataptheManage.storeDanhGiaTapThe', ['user_id' => session()->get('user_id')]) }}"
                                @else
                                    action="{{ route('danhgiataptheManage.updateDanhGiaTapThe', ['user_id' => session()->get('user_id')]) }}" @endif>
                                {{ csrf_field() }}
                            @if ($datadanhgiatapthe->count() != 0)
                                <input type="hidden" name="_method" value="PUT" />
                            @endif
                        <input type="hidden" id="tab-ii" name="tab" value="{{ $item + 1 }}" />
                        <table class="table" cellpadding="10px">
                            <thead>
                                <th>TT</th>
                                <th>Tiêu Chí</th>
                                <th>Nội dung tự đánh giá</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                       {{ 2*$item + 1 }}
                                       <br/>
                                    </td>
                                    <td>
                                        {{ $tieuchi[2 * $item]->tieu_chi_danh_gia_tap_the_noi_dung }}
                                    </td>
                                    <td>
                                        <textarea name="noidungtieuchi{{ $tieuchi[2*$item]->tieu_chi_danh_gia_tap_the_id }}" class="ck-editor" cols="100" rows="20" required>
                                            @if ($datadanhgiatapthe->count() != 0 && $datadanhgiatapthe->count()>2*$item )
                                                {{ $datadanhgiatapthe[2*$item]->danh_gia_tap_the_noi_dung }}
                                            @endif
                                        </textarea>
                                    </td>
                                <tr>
                                <tr>
                                    <td></td>
                                    <td>Đánh giá về cấp độ thực hiện</td>
                                    <td>
                                        @foreach ($datacapdodanhgia as $item1 => $capdo)
                                            <input type="radio" id="ud{{ $tieuchi[2*$item]->tieu_chi_danh_gia_tap_the_id }}danhgia{{ $capdo->cap_do_danh_gia_id }}" required
                                                name="danhgiatieuchi{{ $tieuchi[2*$item]->tieu_chi_danh_gia_tap_the_id }}" value="{{ $capdo->cap_do_danh_gia_id }}"
                                                @if ($datadanhgiatapthe->count() != 0 && $datadanhgiatapthe->count()>2*$item) {{ $datadanhgiatapthe[2*$item]->danh_gia_tap_the_danh_gia == $capdo->cap_do_danh_gia_id ? 'checked' : '' }} @endif />
                                            &nbsp;&nbsp;{{ $capdo->cap_do_danh_gia_ten }} &emsp;
                                        @endforeach
                                    </td>
                                </tr>

                                @if (2 * $item + 1 <= $tieuchi->count() - 1)
                                    <tr>
                                        <td>
                                           {{ 2*$item + 2 }}
                                        </td>
                                        <td>
                                            {{ $tieuchi[2 * $item + 1 ]->tieu_chi_danh_gia_tap_the_noi_dung }}
                                        </td>
                                        <td>
                                            <textarea name="noidungtieuchi{{ $tieuchi[2*$item+1]->tieu_chi_danh_gia_tap_the_id }}" class="ck-editor" cols="100" rows="20" required>
                                            @if ($datadanhgiatapthe->count() != 0 && $datadanhgiatapthe->count()>2*$item+1)
                                                {{ $datadanhgiatapthe[2*$item+1]->danh_gia_tap_the_noi_dung }}
                                            @endif
                                            </textarea>
                                        </td>
                                    <tr>
                                    <tr>
                                        <td></td>
                                        <td>Đánh giá về cấp độ thực hiện</td>
                                        <td>
                                            @foreach ($datacapdodanhgia as $item1 => $capdo)
                                                <input type="radio" required
                                                    id="ud{{ $tieuchi[2*$item+1]->tieu_chi_danh_gia_tap_the_id }}danhgia{{ $capdo->cap_do_danh_gia_id }}"
                                                    name="danhgiatieuchi{{ $tieuchi[2*$item+1]->tieu_chi_danh_gia_tap_the_id }}" value="{{ $capdo->cap_do_danh_gia_id }}"
                                                    @if ($datadanhgiatapthe->count() != 0 && $datadanhgiatapthe->count()>2*$item+1) {{ $datadanhgiatapthe[2*$item+1]->danh_gia_tap_the_danh_gia == $capdo->cap_do_danh_gia_id ? 'checked' : '' }} @endif />
                                                &nbsp;&nbsp;{{ $capdo->cap_do_danh_gia_ten }} &emsp;
                                            @endforeach
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                        <!-- Submit button -->
                        <div class="align-right">
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
@section('script')
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
    if(tab==""){
        document.getElementById("ex2-tabs-1").classList.add['show'];
    }
    document.getElementById("ex2-tab-" + tab).click();

</script>
@endsection
