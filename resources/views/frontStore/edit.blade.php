@extends('layouts.front')

@section('content')
<!-- Start Page Title Area -->
<div class="page-title-area item-bg-2">
    <div class="container">
        <div class="page-title-content">
            <h2>{{$store->name}}</h2>
            <ul>
                <li>
                    <a href="{{route('front.home')}}">
                        {{__('Home')}}
                        <i class="fa fa-chevron-right"></i>
                    </a>
                </li>
                <li>{{$store->name}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->
<div class="container mt-4">
      <div class="row">
          <div class="col-md-9">
              <div class="card">
                  <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form method="POST" action="{{route('frontStore.update')}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-3">
                                Owner: {{$store->owner->name}}<br>
                               <img src="{{asset('uploads/stores/thumbnails/'.$store->id.'.png')}}" alt="" class="img-fluid img-thumbnail">
                               <br>
                               <div class="form-group">
                                   <label for="image">{{__('Image')}}</label>
                                   <input type="file" class="form-control" name="image" id="image">
                               </div>
                            </div>
                             <div class="col-md-9">
                                <div class="form-group">
                                    <label for="name">{{__('Name')}}</label>
                                    <input class="form-control" type="text" id="name" name="name" value="{{old('name',$store->name)}}">
                                </div>
                                <div class="form-group">
                                    <label for="description">{{__('Description')}}</label>
                                    <input class="form-control" type="text" id="description" name="description"value="{{old('description',$store->description)}}">
                                </div>
                             </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="first_name">{{__('First name')}}</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"value="{{old('first_name',$store->first_name)}}">
                            </div>
                            <div class="col-md-6">
                                <label for="last_name">{{__('Last name')}}</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"value="{{old('last_name',$store->last_name)}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="phone">{{__('Phone')}}</label>
                                <input type="text" class="form-control" id="phone" name="phone"value="{{old('phone',$store->phone)}}">
                            </div>
                            <div class="col-md-6">
                                <label for="email">{{__('Email')}}</label>
                                <input type="text" class="form-control" id="email" name="email"value="{{old('email',$store->email)}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">{{__('Address')}}</label>
                            <textarea name="address" id="address" cols="30" rows="3" class="form-control">{{old('address',$store->address)}}</textarea>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="facebook_link">{{__('Facebook link')}}</label>
                                <input type="text" class="form-control" id="facebook_link" name="facebook_link"value="{{old('facebook_link',$store->facebook_link)}}">
                            </div>
                            <div class="col-md-6">
                                <label for="instagram_link">{{__('Instagram link')}}</label>
                                <input type="text" class="form-control" id="instagram_link" name="instagram_link"value="{{old('instagram_link',$store->instagram_link)}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="website">{{__('Website')}}</label>
                            <input class="form-control" type="text" id="website" name="website" value="{{old('website',$store->website)}}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">{{__('Save')}}</button>
                        </div>
                    </form>

                  </div>
              </div>
          </div>

          <div class="col-md-3">
            @include('_profile_right')
              <div class="card">
                  <div class="card-header">{{__('Documents')}}</div>
                  <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                      <form method="POST" action="{{route('storeFile')}}" enctype="multipart/form-data">
                        @csrf
                          <div class="form-group">
                              <input type="hidden" name="store_id" value="{{$store->id}}">
                               <input class="form-control mb-2" type="file" name="file" id="file">
                                <button type="submit" class="btn btn-primary btn-block">{{__('Add')}}</button>
                          </div>
                      </form>
                      @foreach($store->files as $file)
                      <a href="{{route('storeDownload',$file->id)}}">{{$file->filename.'.'.$file->ext}} ({{$file->size()}})</a><br>
                      @endforeach
                  </div>
              </div>
          </div>
      </div>
    </div>

@endsection


@section('script')
<script src="{{asset('vendor/tinymce/tinymce.min.js')}}"></script>
<script>
    $(document).ready(function() {
       tinymce.init({
           selector:'#description'
       });
      });
</script>
@endsection
