<label>{{__('thang')}}:</label>
<select class="form-control datatable-input" data-col-index="6" id="cmb_month" name="cmb_month">
    @foreach(range(1,12) as $thang)
        {{ $thang_value = $thang }}
        @if($thang_value < 10)
            {{ $thang_value = '0'.$thang }}
        @endif
        @if(isset($thangSearch))
            @if($thang == $thangSearch)
                <option value="{{$thang_value}}" selected>{{$thang_value}}</option>
            @else
                <option value="{{$thang_value}}">{{$thang_value}}</option>
            @endif
        @else
            @if($thang == session()->get('thangHienTai'))
                <option value="{{$thang_value}}" selected>{{$thang_value}}</option>
            @else
                <option value="{{$thang_value}}">{{$thang_value}}</option>
            @endif
        @endif
    @endforeach
</select>
