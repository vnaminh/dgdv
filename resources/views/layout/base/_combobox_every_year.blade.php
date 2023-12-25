<label>{{__('nam')}}:</label>
<select class="form-control datatable-input" data-col-index="6" id="cmb_years" name="cmb_years">
    <option value="0" selected>Tất cả</option>
    @foreach(range(2000,(date('Y') + 5)) as $nam)
        @if(isset($namSearch))
            @if($nam == $namSearch)
                <option value="{{$nam}}" selected>{{$nam}}</option>
            @else
                <option value="{{$nam}}">{{$nam}}</option>
            @endif
        @else
            <option value="{{$nam}}">{{$nam}}</option>
        @endif
    @endforeach
</select>
