<label>{{__('nam')}}:</label>
<select class="form-control datatable-input" data-col-index="6" id="cmb_year" name="cmb_year">
    @foreach(range(2000,(date('Y') + 5)) as $nam)
        @if(isset($namSearch))
            @if($nam == $namSearch)
                <option value="{{$nam}}" selected>{{$nam}}</option>
            @else
                <option value="{{$nam}}">{{$nam}}</option>
            @endif
        @else
            @if($nam == session()->get('namHienTai'))
                <option value="{{$nam}}" selected>{{$nam}}</option>
            @else
                <option value="{{$nam}}">{{$nam}}</option>
            @endif
        @endif
    @endforeach
</select>
