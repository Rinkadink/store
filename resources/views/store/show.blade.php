@extends('layouts.app')

@section('content')
<h1 class="mt-4">{{__('Stores')}} : #{{$store->id}}</h1>
<ul class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('store.index')}}">{{__('Stores')}}</a></li>
    <li class="breadcrumb-item active">{{$store->name}}</li>
</ul>
 <div class="card mt-4">
<div class="card-body">
       <div class="row">
           <div class="col-md-6">
            <img src="{{asset('uploads/stores/thumbnails/'.$store->id.'.png')}}" alt="" class="img-fluid img-thumbnail">
           </div>
           <div class="col-md-6">
            <h4>{{$store->name}}</h4>
            <a href="{{route('store_carousel.index',['store_id'=>$store->id])}}">Carousel</a>
            <div class="text-muted" style="font-size:12px";>
                {{__('Created at')}}:{{$store->created_at->format('Y.d.m H:i:s')}} | {{__('Updated at')}} {{$store->updated_at->format('Y.d.m H:i:s')}}
            </div>
            <hr>
            <div>
                {!!$store->description!!}
            </div>
           </div>

       </div>
       <div class="row mt-4">
           <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info text-white">
                    {{__('Store')}} {{__('info')}}
                </div>
                <table class="table table-striped mb-0">
                    <tr>
                        <th>{{__('Name')}}</th>
                        <td>{{$store->first_name}} {{$store->last_name}}</td>
                    </tr>
                    <tr>
                        <th>{{__('Email')}}</th>
                        <td>{{$store->email}}</td>
                    </tr>
                    <tr>
                        <th>{{__('Phone')}}</th>
                        <td>{{$store->phone}}</td>
                    </tr>
                    <tr>
                        <th>{{__('Address')}}</th>
                        <td>{{$store->address}}</td>
                    </tr>
                </table>
            </div>
           </div>
           <div class="col-md-6">
               <div class="card">
                   <div class="card-header  bg-info text-white">{{__('Social links')}}</div>
                <table class="table table-striped mb-0">
                    <tr>
                        <th>{{__('Website')}}</th>
                        <td>
                            <a href="{{$store->website}}">{{$store->website}}</a>
                        </td>
                    </tr>
                    <tr>
                        <th>{{__('Facebook')}}</th>
                        <td>{{$store->facebook_link}}</td>
                    </tr>
                    <tr>
                        <th>{{__('Instagram')}}</th>
                        <td>{{$store->instagram_link}}</td>
                    </tr>
                </table>
               </div>

           </div>
       </div>


</div>
 </div>
 @endsection
