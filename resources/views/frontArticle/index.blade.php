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

<!-- Start Blog Details Area -->
<section class="blog-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="blog-details-desc">
                    <div class="comments-area m-0">
                        <h3 class="comments-title">Profile info</h3>

                        <table class="table table-sm  table-bordered mb-0">
                            <tr>
                                <th>{{__('Image')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Price')}}</th>
                                <th>{{__('Created at')}}</th>
                                <th colspan=2>{{__('Options')}}</th>
                            </tr>
                            @forelse($articles as $article)
                                <tr>
                                    <td><img src="{{asset('uploads/articles/thumbnails/'.$article->featured_image.'.jpg?'.time())}}" class="img-thumbnail" width="50" alt=""></td>
                                    <td><a href="{{route('frontArticle.show',$article->id)}}">{{ $article->name }}</a> </td>
                                    <td>{{$article->price}} &euro;</td>
                                    <td>{{$article->created_at->format('m.d.Y')}}</td>
                                    <td><a href="{{route('frontArticle.edit',$article->id)}}" class="btn btn-sm btn-secondary btn-block">{{__('Edit')}}</a></td>
                                    <td>
                                        <form method="POST" action="{{route('frontArticle.destroy',$article->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onClick="return confirm('Are you sure???');" class="btn btn-sm btn-danger btn-block">{{__('Delete')}}</button>

                                        </form>
                                    </td>
                                </tr>
                            @empty

                            <tr>
                                <td colspan="7">{{__('Table is empty')}}</td>
                            </tr>

                            @endforelse
                        </table>
                        {{$articles->links()}}
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
             @include('_profile_right')
            </div>
        </div>
    </div>
</section>
<!-- End Blog Details Area -->
@endsection
