<aside class="widget-area mb-4" id="secondary">

    <section class="widget widget_categories">
        <h3 class="widget-title">{{__('Options')}}</h3>

        <ul>
            <li>
                <a href="{{route('front.profile')}}">Profile: {{\Auth::user()->name}}</a>
            </li>
            <li>
                <a href="{{route('frontStore.edit')}}">Edit store info</a>
            </li>
            <li>
                <a href="{{route('frontArticle.index')}}">Articles</a>
            </li>
            <li>
                <a href="{{route('frontArticle.create')}}">Add new article</a>
            </li>
        </ul>

    </section>
</aside>
