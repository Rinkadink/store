@extends('layouts.app')

@section('content')
<h1 class="mt-4">{{__('Articles')}} : {{__('create')}}</h1>
<ul class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('article.index')}}">{{__('Articles')}}</a></li>
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
                    <form method="POST" action="{{route('article.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="user_id">{{__('User')}}</label>
                            <select name="user_id" id="user_id" class="form-control">
                                @foreach($users as $user)
                                <option value="{{$user->id}}" @if(old('user_id',\Auth::user()->id)==$user->id)selected @endif >{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category">{{__('Category')}}</label>
                            <select name="category" id="" class="form-control">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" @if(old('category')==$category->id)selected @endif >{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
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
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="price">{{__('Price')}}</label>
                            <input class="form-control" type="number" step="any" id="price" name="price" value="{{old('price')}}">
                            </div>
                            <div class="col-md-6">
                                <label for="unit">{{__('Unit')}}</label>
                                <select name="unit" id="unit" class="form-control">
                                    <option value=""></option>
                                    @foreach(\App\Article::UNITS as $unit_key=>$unit)
                                        <option value="{{$unit_key}}" @if(old('unit')==$unit_key) selected @endif>{{$unit}}</option>
                                    @endforeach
                                </select>

                            </div>
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


