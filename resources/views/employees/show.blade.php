@extends('layouts.app')

@section('content')

    <div class="container justify-content-center">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$employee->name}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$employee->lastname}}</h6>
                        <ul>
                            <li>{{trans('cruds.employee.fields.email')}}: {{$employee->email}}</li>
                            <li>{{trans('cruds.employee.fields.phone')}}: {{$employee->phone}}</li>
                        </ul>
                        <p>{{trans('cruds.employee.fields.company')}}: <strong>{{$employee->company->name}}</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
