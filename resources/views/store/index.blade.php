@extends('layouts.app')

@section('content')
<h1 class="mt-4">{{__('Stores')}}</h1>
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
                  <div class="card-header"><i class="fas fa-table"></i> {{__('Stores')}} ({{$stores->total()}})
                    <a href="{{route('store.create')}}" class="btn btn-sm btn-primary float-right"> <i class="fas fa-plus"></i> {{__('Add new store')}}</a>
                </div>

                      <table class="table table-sm table-bordered mb-0">
                          <tr>

                              <th>{{__('Name')}}</th>
                              <th>{{__('Owner') }}</th>
                              <th>{{__('Username') }}</th>
                              <th colspan=2>{{__('Options')}}</th>
                          </tr>
                          @foreach($stores as $store)
                          <tr>
                              <td> <a href="{{route('store.show',$store->id)}}">{{$store->name_sr}} </a></td>
                              <td>{{$store->first_name}} {{$store->last_name}}</td>
                              <td>{{$store->owner->name}}</td>
                              <td><a href="{{route('store.edit',$store->id)}}" class="btn btn-sm btn-secondary btn-block">{{__('Edit')}}</a>
                            </td>
                              <td>
                                  <form method="POST" action="{{route('store.destroy', $store->id)}}">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn btn-sm btn-danger btn-block" type="submit" onClick="return confirm("Are you sure?")">{{__('Delete')}}</button>
                                  </form>
                              </td>
                          </tr>
                          @endforeach
                      </table>
                      <div class="card-footer">
                          {{$stores->links()}}
                      </div>
                  </div>

@endsection
