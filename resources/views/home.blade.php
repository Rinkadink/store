@extends('layouts.app')

@section('content')
<h1 class="mt-4">{{__('Komandna tabla')}}</h1>
<br>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">{{__('Prodavnice')}}: {{$stores_count}}</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{route('store.index')}}">{{__('Vidi detalje')}}</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">{{__('Kategorije')}}: {{$categories_count}}</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{route('category.index')}}">{{__('Vidi detalje')}}</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">{{__('Proizvodi')}}: {{$articles_count}}</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{route('article.index')}}">{{__('Vidi detalje')}}</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">{{__('Korisnici')}}: {{$users_count}}</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{route('user.index')}}">{{__('Vidi detalje')}}</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-info">{{__('Top korisnici')}}</div>
            <table class="table table-sm table-striped mb-0">
                <tr>
                    <th>{{__('Br.')}}</th>
                    <th>{{__('Korisnik')}}</th>
                    <th>{{__('Proizvodi')}}</th>
                </tr>
                @php $i=1; @endphp
                @foreach($top_users as $top_user)
                <tr>
                    <td>{{$i}}.</td>
                    <td>
                        <a href="{{route('user.show',$top_user->id)}}">
                        {{$top_user->name}}
                    </a>
                    </td>
                    <td>{{$top_user->articles_count}}</td>
                </tr>
                @php $i++; @endphp
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
