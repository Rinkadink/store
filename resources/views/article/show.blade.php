@extends('layouts.app')

@section('content')
<h1 class="mt-4">{{__('Articles')}} : {{$article->id}}</h1>
<ul class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('article.index')}}">{{__('Articles')}}</a></li>
    <li class="breadcrumb-item active">{{$article->name_sr}}</li>
</ul>
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-8">
              <div class="card">

                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-5">
                            <img src="{{asset('uploads/articles/thumbnails/'.$article->featured_image.'.jpg?'.time())}}" class="img-fluid w-100" alt="">
                          </div>
                          <div class="col-md-7">
                              <h4>{{$article->name_sr}}</h4>
                              <p>{{ $article->price }}&euro; {{$article->unit}}</p>
                            {!!$article->description_sr!!}
                          </div>
                      </div>
                      <hr>
                      <div class="row mt-4">
                          <div class="col-md-12">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                         @if ($message = Session::get('warning'))

                            <div class="alert alert-warning alert-block">

                                <button type="button" class="close" data-dismiss="alert">×</button>

                                <strong>{{ $message }}</strong>

                            </div>

                            @endif
                              <form method="POST" action="{{route('article_image.store')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="article_id" value="{{$article->id}}">
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <input type="file" class="form-control" name="image" id="image">
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary btn-block">{{__('Add new image')}}</button>
                                    </div>
                                </div>
                              </form>
                              <hr>
                              <div class="row">
                                @foreach($article->images as $image)
                                <div class="col-md-3">
                                    <img src="{{asset('uploads/articles/thumbnails/'.$image->id.'.jpg')}}" alt="" class="img-fluid">
                                    <a href="{{route('article.setFeaturedImage',['article'=>$article->id,'articleImage'=>$image->id])}}" class="btn btn-sm btn-info btn-block">{{__('Set featured image')}}</a>


                                        <form method="POST" action="{{route('article_image.destroy',$image->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger btn-block mt-4" onClick="return confirm('Are you sure?')">{{__('Delete')}}</button>
                                    </form>
                                </div>
                                @endforeach
                              </div>

                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card">

                  <div class="card-body">
                      <a href="{{route('article.edit',$article->id)}}" class="btn btn-sm btn-secondary btn-block">{{__('Edit')}}</a>
                      <form method="POST" action="{{route('article.destroy',$article->id)}}">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-sm btn-danger btn-block mt-4" onClick="return confirm('Are you sure?')">{{__('Delete')}}</button>
                      </form>
                      <hr>


                      <table class="table table-sm table-striped">
                          <tr>
                              <th>{{__('Author')}}</th>
                              <td>{{$article->author->name_sr}}</td>
                          </tr>
                          <tr>
                            <th>{{__('Created at')}}</th>
                            <td>{{$article->created_at->format('d.m.Y H:i:s')}}</td>
                        </tr>
                        <tr>
                            <th>{{__('Editor')}}</th>
                            <td>{{$article->author->name_sr}}</td>
                        </tr>
                        <tr>
                          <th>{{__('Updated at')}}</th>
                          <td>{{$article->updated_at->format('d.m.Y H:i:s')}}</td>
                      </tr>
                      </table>
                  </div>
              </div>
              <br>
              <div class="card">
                  <div class="card-header text-white bg-info">
                   {{__('Store')}}:  {{$article->author->store->name_sr}}
                  </div>
                  <div class="card-body">
                      <p>{!!$article->author->store->description_sr!!}</p>
                    <table class="table table-sm table-striped">
                        <tr>
                            <th>{{__('Phone')}}</th>
                            <td>{{$article->author->store->phone}}</td>
                        </tr>
                        <tr>
                            <th>{{__('Email')}}</th>
                            <td>{{$article->author->store->email}}</td>
                        </tr>
                    </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
