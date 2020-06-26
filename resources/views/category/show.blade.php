@extends('layouts.app')

@section('content')
<h1 class="mt-4">{{__('Categories')}} : {{$category->id}}</h1>
<ul class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('category.index')}}">{{__('Categories')}}</a></li>
    <li class="breadcrumb-item active">{{$category->name_sr}}</li>
</ul>
              <div class="card mt-4">

                  <div class="card-body">
                      <img src="{{asset('uploads/categories/'.$category->id.'.jpg')}}" alt="" class="img-fluid">
                      <h4>{{$category->name_sr}}</h4>
                      <p class="text-muted">{{__('Created at')}}:{{$category->created_at->format('Y.d.m H:i:s')}} {{__('by')}}: {{$category->author->name_sr}} | {{__('Updated at')}} {{$category->updated_at->format('Y.d.m H:i:s')}} {{__('by')}} {{$category->editor->name_sr}}</p>
                    <hr>
                      {{ $category->description_sr }}

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
                                <td><a href="{{route('article.show',$article->id)}}">{{ $article->name_sr }}</a> </td>
                                <td>{{$article->price}} &euro;</td>
                                <td>{{ $article->category->name_sr }}</td>
                                <td>{{$article->author->name_sr}}</td>
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
