@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
             <div class="col-md-6">
                <form >
                    <div class="form-group ">
                        <label for="name">{{trans('cruds.employee.fields.name')}}</label>
                        <input type="text" class="form-control" id="name" name="name" >
                    </div>
                </form>
             </div>
            <div class="col-md-6 float-right">
                <div class="button float-right">
                    <a href="{{route('admin.employees.create')}}" class="btn btn-success">Crear {{trans('cruds.employee.title_singular')}}</a>
                </div>
            </div>
        </div>

        <div class="row">


            <div class="col-md-12">
                <div class="card">
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{trans('cruds.employee.fields.name')}}</th>
                        <th scope="col">{{trans('cruds.employee.fields.lastname')}}</th>
                        <th scope="col">{{trans('cruds.employee.fields.email')}}</th>
                        <th scope="col">{{trans('cruds.employee.fields.phone')}}</th>
                        <th scope="col">{{trans('cruds.employee.fields.company')}}</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <th scope="row">{{$employee->id}}</th>
                            <td>{{$employee->name ?? ''}}</td>
                            <td>{{$employee->lastname ?? ''}}</td>
                            <td>{{$employee->email ?? ''}}</td>
                            <td>{{$employee->phone ?? ''}}</td>
                            <td>{{$employee->company->name ?? ''}}</td>
                            <td>
                                <a class="btn btn-info btn-icon btn-sm m-1" href="{{ route('admin.employees.show', $employee->id) }}" >
                                    <span class="ul-btn__icon"><i class="far fa-eye text-white"></i></span>
                                </a>
                                <a class="btn btn-success btn-icon btn-sm m-1" href="{{ route('admin.employees.edit', $employee->id) }}" >
                                    <span class="ul-btn__icon"><i class="fas fa-pencil-alt"></i></span>
                                </a>

                                @include('partials.delete_button', ['model'=> $employee, 'destroy_method' => 'admin.employees.destroy'])
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <span>
                 {{$employees->links()}}
             </span>

            </div>
        </div>
    </div>
    <style>
        .w-5{
            display: none;
        }
    </style>
@endsection
