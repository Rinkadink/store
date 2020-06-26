@extends('layouts.app')

@section('content')
<h1 class="mt-4">{{__('Users')}}</h1>
<ul class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('user.index')}}">{{__('Users')}}</a></li>
    <li class="breadcrumb-item active">{{__('User')}}: #{{$user->id}}</li>
</ul>

              <div class="card mt-4">
                  <table class="table table-striped">
                      <tr>
                          <th>{{__('Name')}}</th>
                          <td>{{$user->name}}</td>
                      </tr>
                      <tr>
                        <th>{{__('Email')}}</th>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <th>{{__('Created at')}}</th>
                        <td>{{$user->created_at->format('d.m.Y H:i:s')}}</td>
                    </tr>
                    <tr>
                        <th>{{__('Updated at')}}</th>
                        <td>{{$user->updated_at->format('d.m.Y H:i:s')}}</td>
                    </tr>
                    <tr>
                        <th>{{__('Articles')}}</th>
                        <td>{{$user->articles->count()}}</td>
                    </tr>
                  </table>
              </div>
@endsection
