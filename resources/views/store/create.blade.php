@extends('layouts.app')

@section('content')
<h1 class="mt-4">{{__('Stores')}} : {{'create'}}</h1>
<ul class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('store.index')}}">{{__('Stores')}}</a></li>
    <li class="breadcrumb-item active">{{__('create')}}</li>
</ul>
              <div class="card mt-4">

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
                    <form method="POST" action="{{route('store.store')}}"enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="user">{{__('User')}}</label>
                                    <select name="user" id="user" class="form-control">
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}" @if($user->id==old('user',\Auth::user()->id)) selected @endif>{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                               <img src="{{asset('uploads/stores/thumbnails/0.jpg')}}" alt="" class="img-fluid img-thumbnail">
                               <br>
                               <div class="form-group">
                                   <label for="image">{{__('Image')}}</label>
                                   <input type="file" class="form-control" name="image" id="image">
                               </div>
                            </div>
                             <div class="col-md-9">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs">
                                  <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#serbian">Serbian</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#english">English</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#albanian">Albanian</a>
                                  </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                  <div class="tab-pane container active" id="serbian">
                                  <div class="form-group">
                                      <label for="name_sr">{{__('Name')}}</label>
                                      <input class="form-control" type="text" id="name_sr" name="name_sr" value="{{old('name_sr')}}">
                                  </div>
                                  <div class="form-group">
                                      <label for="description_sr">{{__('Description')}}</label>
                                      <input class="form-control tinyMCE" type="text" id="description_sr" name="description_sr"value="{{old('description_sr')}}">
                                  </div>
                                  </div>
                                  <div class="tab-pane container fade" id="english">
                                  <div class="form-group">
                                      <label for="name_en">{{__('Name')}}</label>
                                      <input class="form-control" type="text" id="name_en" name="name_en" value="{{old('name_en',)}}">
                                  </div>
                                  <div class="form-group">
                                      <label for="description_en">{{__('Description')}}</label>
                                      <input class="form-control tinyMCE" type="text" id="description_en" name="description_en"value="{{old('description_en')}}">
                                  </div>
                                  </div>
                                  <div class="tab-pane container fade" id="albanian">
                                                                    <div class="form-group">
                                      <label for="name_al">{{__('Name')}}</label>
                                      <input class="form-control" type="text" id="name_al" name="name_al" value="{{old('name_al',)}}">
                                  </div>
                                  <div class="form-group">
                                      <label for="description_al">{{__('Description')}}</label>
                                      <input class="form-control tinyMCE" type="text" id="description_al" name="description_al" value="{{old('description_al')}}">
                                  </div>
                                  </div>
                                </div>
                             </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="first_name">{{__('First name')}}</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"value="{{old('first_name')}}">
                            </div>
                            <div class="col-md-6">
                                <label for="last_name">{{__('Last name')}}</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"value="{{old('last_name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="phone">{{__('Phone')}}</label>
                                <input type="text" class="form-control" id="phone" name="phone"value="{{old('phone')}}">
                            </div>
                            <div class="col-md-6">
                                <label for="email">{{__('Email')}}</label>
                                <input type="text" class="form-control" id="email" name="email"value="{{old('email')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">{{__('Address')}}</label>
                            <textarea name="address" id="address" cols="30" rows="3" class="form-control">{{old('address')}}</textarea>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="facebook_link">{{__('Facebook link')}}</label>
                                <input type="text" class="form-control" id="facebook_link" name="facebook_link"value="{{old('facebook_link')}}">
                            </div>
                            <div class="col-md-6">
                                <label for="instagram_link">{{__('Instagram link')}}</label>
                                <input type="text" class="form-control" id="instagram_link" name="instagram_link"value="{{old('instagram_link')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="website">{{__('Website')}}</label>
                            <input class="form-control" type="text" id="website" name="website" value="{{old('website')}}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">{{__('Save')}}</button>
                        </div>
                    </form>

                  </div>
              </div>

@endsection


@section('script')
<script src="{{asset('vendor/tinymce/tinymce.min.js')}}"></script>
<script>
    $(document).ready(function() {
       tinymce.init({
           selector:'.tinyMCE'
       });
      });
</script>
@endsection
