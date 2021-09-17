@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-3">
                <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method($method)
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', isset($company) ? $company->name : '') }}">
                            @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', isset($company) ? $company->email : '') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="web">Web</label>
                        <input type="text" class="form-control" id="web" name="web" value="{{ old('web', isset($company) ? $company->web : '') }}">
                    </div>

                    <div class="form-group">
                        <label for="img">Example file input</label>
                        <input type="file" class="form-control-file" id="img" name="img">
                    </div>
                    @if(!empty($company))
                        <div class="container float-right">
                            <img class="img-fluid w-50 h-50 p-5 text-center" src="{{$company->img}}" alt="">
                        </div>
                    @endif

                    <button type="submit" class="btn btn-primary">{{trans('global.save')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
