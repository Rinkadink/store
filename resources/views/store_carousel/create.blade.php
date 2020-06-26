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
                    <form method="POST" action="{{route('store_carousel.store')}}"enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="store_id" value="{{ $store_id }}">
                        <div class="row">
                            <div class="col-md-3">
                               <div class="form-group">
                                   <label for="image">{{__('Image')}}</label>
                                   <input type="file" class="form-control" name="image" id="image">
                               </div>
                            </div>
                             <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="title">{{__('Title')}}</label>
                                        <input class="form-control" type="text" id="title" name="title" value="{{old('title')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="content">{{__('Content')}}</label>
                                        <input class="form-control" type="text" id="content" name="content"value="{{old('content')}}">
                                    </div>
                             </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">{{__('Save')}}</button>
                        </div>
                    </form>

                  </div>
              </div>

@endsection

