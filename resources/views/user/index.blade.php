@extends('layouts.app')

@section('content')
<h1 class="mt-4">{{__('Users')}}</h1>
<ul class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item active">{{__('Stores')}}</li>
</ul>

<div class="flash-message ">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }} mt-4">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->
              <div class="card mt-4">
                  <div class="card-header"><i class="fas fa-table"></i> {{__('Users')}} ({{$users->total()}})
                    <a href="{{route('user.create')}}" class="btn btn-sm btn-primary float-right"> <i class="fas fa-plus"></i> {{__('Add new user')}}</a>
                </div>

                      <table class="table table-sm table-bordered mb-0">
                          <tr>

                              <th>{{__('ID')}}</th>
                              <th>{{__('Name') }}</th>
                              <th>{{__('Email') }}</th>
                              <th>{{__('Created at') }}</th>
                              <th colspan=4>{{__('Options')}}</th>
                          </tr>
                          @foreach($users as $user)
                          <tr>
                              <td>#{{$user->id}}</td>
                              <td> <a href="{{route('user.show',$user->id)}}">{{$user->name}} </a></td>
                              <td>{{$user->email}}</td>
                             <td>{{$user->created_at->format('d.m.Y H:i:s')}}</td>
                             <td>
                                 @if($user->is_admin)
                                 <a href="{{route('user.setAdmin',$user->id)}}" class="btn btn-sm btn-dark">{{__('Admin')}}</a>
                                 @else
                                 <a href="{{route('user.setAdmin',$user->id)}}" class="btn btn-sm btn-outline-dark">{{__('Admin')}}</a>
                                 @endif
                             </td>
                             <td>
                                 <a href="{{route('user.changePassword',$user->id)}}" class="btn btn-sm btn-warning btn-block">
                                     {{__('Change password')}}
                                 </a>
                             </td>
                              <td><a href="{{route('user.edit',$user->id)}}" class="btn btn-sm btn-secondary btn-block">{{__('Edit')}}</a>
                            </td>
                              <td>
                                  <form method="POST" action="{{route('user.destroy', $user->id)}}">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn btn-sm btn-danger btn-block" type="submit" onClick="return confirm("Are you sure?")">{{__('Delete')}}</button>
                                  </form>
                              </td>
                          </tr>
                          @endforeach
                      </table>
                      <div class="card-footer">
                          {{$users->links()}}
                      </div>
                  </div>

@endsection
