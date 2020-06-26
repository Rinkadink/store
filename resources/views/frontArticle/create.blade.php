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
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form method="POST" action="{{route('frontArticle.store')}}">
                @csrf
                <div class="form-group">
                    <label for="category">{{__('Category')}}</label>
                    <select name="category" id="" class="form-control">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" @if(old('category')==$category->id)selected @endif >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">{{__('Name')}}</label>
                    <input class="form-control" type="text" id="name" name="name" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="description">{{__('Description')}}</label>
                    <textarea id="description" name="description"  cols="20" rows="10" class="form-control">{{old('description')}}</textarea>
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
        <div class="col-md-4">
            @include('_profile_right')
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


