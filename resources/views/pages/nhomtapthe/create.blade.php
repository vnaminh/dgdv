@extends('layout.default')
@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            @include('layout.base._pagename')
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('nhomtaptheManage.storeNhomTapThe') }}" class="form" name="nhomtaptheform"
                  id="nhomtaptheform">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-8">
                        <div class="my-5">
                            <div class="form-group row">
                                <label class="col-3">
                                    Tên
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-6">
                                    <input class="form-control" type="text" value="{{ old('ten') }}"
                                           name="ten" id="ten"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-toolbar">
                            <a href="{{ route('nhomtaptheManage.indexNhomTapThe') }}"
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
