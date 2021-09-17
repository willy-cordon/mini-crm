@extends('layouts.app')

@section('content')
 <div class="container">
     <div class="row">
         <div class="col-md-6">
             <form >
                 <div class="form-group ">
                     <label for="name">{{trans('cruds.company.fields.name')}}</label>
                     <input type="text" class="form-control" id="name" name="name" >
                 </div>
             </form>
         </div>
         <div class="col-md-6 float-right">
             <div class="button float-right">
                 <a href="{{route('admin.companies.create')}}" class="btn btn-success">Crear {{trans('cruds.company.title_singular')}}</a>
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
                     <th scope="col">{{trans('cruds.company.fields.name')}}</th>
                     <th scope="col">{{trans('cruds.company.fields.email')}}</th>
                     <th scope="col">{{trans('cruds.company.fields.web')}}</th>
                     <th scope="col"></th>
                 </tr>
                 </thead>
                 <tbody>
                 @foreach($companies as $company)
                 <tr>
                     <th scope="row">{{$company->id}}</th>
                     <td>{{$company->name}}</td>
                     <td>{{$company->email}}</td>
                     <td>{{$company->web}}</td>
                     <td>
                         <a class="btn btn-info btn-icon btn-sm m-1" href="{{ route('admin.companies.show', $company->id) }}" >
                             <span class="ul-btn__icon"><i class="far fa-eye text-white"></i></span>
                         </a>
                         <a class="btn btn-success btn-icon btn-sm m-1" href="{{ route('admin.companies.edit', $company->id) }}" >
                             <span class="ul-btn__icon"><i class="fas fa-pencil-alt"></i></span>
                         </a>

                         @include('partials.delete_button', ['model'=> $company, 'destroy_method' => 'admin.companies.destroy'])
                     </td>
                 </tr>
                 @endforeach

                 </tbody>
             </table>
             <span>
                 {{$companies->links()}}
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
