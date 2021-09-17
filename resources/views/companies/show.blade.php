@extends('layouts.app')

@section('content')

    <div class="container justify-content-center">
        <div class="row">
            <div class="col-md-12">
                <div class="card " style="width: 18rem;">
                    <img class="card-img-top" src="{{$company->img}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$company->name}}</h5>
                       <ul>
                           <li>{{trans('cruds.company.fields.email')}}: {{$company->email}}</li>
                           <li>{{trans('cruds.company.fields.web')}}: {{$company->web}}</li>
                       </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
