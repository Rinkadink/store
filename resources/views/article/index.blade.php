@extends('layouts.app')

@section('content')
<h1 class="mt-4">{{__('Articles')}}</h1>
<ul class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item active">{{__('Articles')}}</li>
</ul>
              <div class="card mt-4 ">
                  <div class="card-header"> <i class="fas fa-table"></i> {{__('Articles')}} ({{$articles->total()}})
                    <a href="{{route('article.create')}}" class="btn btn-sm btn-primary float-right"> <i class="fas fa-plus"></i> {{__('Add new article')}}</a>
                </div>


                    <table class="table table-sm  table-bordered mb-0">
                        <tr>
                            <th>{{__('Image')}}</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Price')}}</th>
                            <th>{{__('Category')}}</th>
                            <th>{{__('Author')}}</th>
                            <th>{{__('Created at')}}</th>
                            <th colspan=2>{{__('Options')}}</th>
                        </tr>
                        @forelse($articles as $article)
                            <tr>
                                <td><img src="{{asset('uploads/articles/thumbnails/'.$article->featured_image.'.jpg?'.time())}}" class="img-thumbnail" width="50" alt=""></td>
                                <td><a href="{{route('article.show',$article->id)}}">{{ $article->name }}</a> </td>
                                <td>{{$article->price}} &euro;</td>
                                <td>{{ $article->category->name }}</td>
                                <td>{{$article->author->name}}</td>
                                <td>{{$article->created_at->format('m.d.Y H:i:s')}}</td>
                                <td><a href="{{route('article.edit',$article->id)}}" class="btn btn-sm btn-secondary btn-block">{{__('Edit')}}</a></td>
                                <td>
                                    <form method="POST" action="{{route('article.destroy',$article->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onClick="return confirm('Are you sure???');" class="btn btn-sm btn-danger btn-block">{{__('Delete')}}</button>

                                    </form>
                                </td>
                            </tr>
                        @empty

                        <tr>
                            <td colspan="7">{{__('Table is empty')}}</td>
                        </tr>

                        @endforelse
                    </table>
                    <div class="card-footer">
                        {{$articles->links()}}
                    </div>



              </div>

@endsection
