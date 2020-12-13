<div class="columns">
    <div class="column">
        <aside class="menu">
            @foreach($orderedBlogPosts as $year => $blogPosts)
                <p class="menu-label title is-5">{{$year}}</p>
                <ul class="menu-list pl-1">
                    @foreach($blogPosts as $month => $monthPost)
                        <li>
                            {{$month}}
                            <ul>
                                @foreach($monthPost as $post)
                                    <li><a class="is-title-red {{$post->id == $currentBlog ? 'is-active' : ''}}"
                                           href="{{action('HomeController@blogPost', $post)}}">{{$post->title}}</a></li>
                                @endforeach
                            </ul>
                            @endforeach
                        </li>
                </ul>
            @endforeach
        </aside>
    </div>
    <div class="column">
        <div class="vs"></div>
    </div>
    <div class="column is-four-fifths">
        @if($blogPost)
            <div class="has-text-centered">

                <h1 class="title">{{$blogPost->title}}</h1>
            </div>
            @if($blogPost->photos)
                <div class="is-flex has-content-justified-center pt-1">
                    <figure class="image blog-image">
                        <img src="{{action('PhotoController@blogPhoto', $blogPost->photos->first())}}">
                    </figure>
                </div>
            @endif
            <br>
            <div>
                {!! $blogPost->text !!}
            </div>
        @endif
    </div>
</div>
