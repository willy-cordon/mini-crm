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
                                <label for="name">{{trans('cruds.employee.fields.name')}}</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', isset($employee) ? $employee->name : '') }}">
                                @if($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">{{trans('cruds.employee.fields.lastname')}}</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname', isset($employee) ? $employee->lastname : '') }}">
                                @if($errors->has('lastname'))
                                    <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">{{trans('cruds.employee.fields.email')}}</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', isset($employee) ? $employee->email : '') }}">
                                @if($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">{{trans('cruds.employee.fields.phone')}}</label>
                                <input type="number" class="form-control" id="phone" name="phone" value="{{ old('phone', isset($employee) ? $employee->phone : '') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group" >
                                <label for="company_id">{{ trans('cruds.employee.fields.company') }}</label>
                                <select class="form-control form-control-rounded" name="company_id" id="company_id">
                                    <option value=""> </option>
                                    @foreach($companies as  $company)
                                        <option value="{{$company->id}}" {{ (collect(old('company_id', isset($employee) ? $employee->company_id : ''))->contains($company->id)) ? 'selected':'' }}>{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">{{trans('global.save')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
