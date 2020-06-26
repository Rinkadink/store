@extends('layouts.front')

@section('content')
<!-- Start Page Title Area -->
<div class="page-title-area item-bg-2">
    <div class="container">
        <div class="page-title-content">
            <h2>{{__('Articles')}}</h2>
            <ul>
                <li>
                    <a href="{{route('front.home')}}">
                        {{__('Home')}}
                        <i class="fa fa-chevron-right"></i>
                    </a>
                </li>
                <li>{{__('Profile')}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->
  <div class="container mt-4">
      <div class="row">
          <div class="col-md-8">
              <div class="card">

                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-5">
                            <img src="{{asset('uploads/articles/thumbnails/'.$article->featured_image.'.jpg?'.time())}}" class="img-fluid w-100" alt="">
                          </div>
                          <div class="col-md-7">
                              <h4>{{$article->name}}</h4>
                              <p>{{ $article->price }}&euro; {{$article->unit}}</p>
                            {!!$article->description!!}
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
                              <form method="POST" action="{{route('frontArticle.newImage')}}" enctype="multipart/form-data">
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
                                    <a href="{{route('frontArticle.setFeaturedImage',['article'=>$article->id,'articleImage'=>$image->id])}}" class="btn btn-sm btn-info btn-block">{{__('Set featured image')}}</a>


                                        <form method="POST" action="{{route('frontArticle.deleteImage',$image->id)}}">
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
              @include('_profile_right')
          </div>
      </div>
  </div>
@endsection
