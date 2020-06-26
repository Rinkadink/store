@extends('layouts.app')

@section('content')
<h1 class="mt-4">{{__('Categories')}} : {{__('update')}}</h1>
<ul class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('category.index')}}">{{__('Categories')}}</a></li>
    <li class="breadcrumb-item active">{{__('update')}}</li>
</ul>
<div class="row mt-4">
    <div class="col-md-8">

        <div class="card ">
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
              <form method="POST" action="{{route('category.update',$category->id)}}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
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
                              <input class="form-control" type="text" id="name_sr" name="name_sr" value="{{old('name_sr',$category->name_sr)}}">
                          </div>
                          <div class="form-group">
                              <label for="description_sr">{{__('Description')}}</label>
                              <input class="form-control tinyMCE" type="text" id="description_sr" name="description_sr"value="{{old('description_sr',$category->description_sr)}}">
                          </div>
                          </div>
                          <div class="tab-pane container fade" id="english">
                          <div class="form-group">
                              <label for="name_en">{{__('Name')}}</label>
                              <input class="form-control" type="text" id="name_en" name="name_en" value="{{old('name_en',$category->name_en)}}">
                          </div>
                          <div class="form-group">
                              <label for="description_en">{{__('Description')}}</label>
                              <input class="form-control tinyMCE" type="text" id="description_en" name="description_en"value="{{old('description_en',$category->description_en)}}">
                          </div>
                          </div>
                          <div class="tab-pane container fade" id="albanian">
                        <div class="form-group">
                              <label for="name_al">{{__('Name')}}</label>
                              <input class="form-control" type="text" id="name_al" name="name_al" value="{{old('name_al',$category->name_al)}}">
                          </div>
                          <div class="form-group">
                              <label for="description_al">{{__('Description')}}</label>
                              <input class="form-control tinyMCE" type="text" id="description_al" name="description_al" value="{{old('description_al',$category->description_al)}}">
                          </div>
                          </div>
                        </div>
                  <div class="form-group">
                    <label for="image">{{__('Image')}}</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
                  <div class="form-group">
                      <button class="btn btn-primary btn-block" type="submit">{{__('Save')}}</button>
                  </div>
              </form>

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <img src="{{asset('uploads/categories/thumbnails/'.$category->id.'.jpg')}}" alt="" class="img-fluid">
        </div>
    </div>
</div>

@endsection
