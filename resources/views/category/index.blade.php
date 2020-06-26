@extends('layouts.app')

@section('content')
<h1 class="mt-4">{{__('Categories')}}</h1>
<ul class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item active">{{__('Categories')}}</li>
</ul>


              <div class="card mt-4">
                  <div class="card-header"><i class="fas fa-table"></i> {{__('Categories')}} ({{$categories->count()}})
                    <a href="{{route('category.create')}}" class="btn btn-sm btn-primary float-right"> <i class="fas fa-plus"></i> {{__('Add new category')}}</a>
                </div>

                      <table class="table table-sm table-bordered mb-0">
                          <tr>

                              <th>{{__('Name')}}</th>
                              <th>{{__('Description')}}</th>
                              <th>{{__('Author') }}</th>
                              <th colspan=2>{{__('Options')}}</th>
                          </tr>
                          @foreach($categories as $category)
                          <tr>
                              <td> <a href="{{route('category.show',$category->id)}}">{{$category->name_sr}} </a></td>
                              <td>{{$category->description_sr}}</td>
                              <td>{{$category->author->name}}</td>
                              <td><a href="{{route('category.edit',$category->id)}}" class="btn btn-sm btn-secondary btn-block">{{__('Edit')}}</a>
                            </td>
                              <td>
                                  <form method="POST" action="{{route('category.destroy', $category->id)}}">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn btn-sm btn-danger btn-block" type="submit" onClick="return confirm("Are you sure?")">{{__('Delete')}}</button>
                                  </form>
                              </td>
                          </tr>
                          @endforeach
                      </table>

                  </div>

@endsection
