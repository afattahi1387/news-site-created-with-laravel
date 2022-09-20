@extends('includes.html_structure')
@section('content')
    <br>
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Nested row for non-featured blog posts-->
                <!-- Blog post-->
                @if($news->count() > 0)
                    @foreach ($news as $on_news)
                        <div class="card mb-4">
                            <a href="{{ route('single.news', ['news' => $on_news->id]) }}"><img class="card-img-top" src="{{ asset('images/news_images/' . $on_news->image) }}" alt="تصویری به نمایش در نیامد." /></a>
                            <div class="card-body">
                                <div class="small text-muted">دسته بندی: {{ $on_news->category->category_name }}</div>
                                <h2 class="card-title h4">{{ $on_news->name }}</h2>
                                <p class="card-text">{!! $on_news->short_description !!}</p>
                                <a class="btn btn-primary" href="{{ route('single.news', ['news' => $on_news->id]) }}">مشاهده خبر →</a>
                            </div>
                        </div>
                        {{ $news->links() }}
                    @endforeach
                @else
                    <div class="alert alert-danger">خبری یافت نشد!</div>
                @endif
            </div>
            @include('includes.main_pages_sidebar')
        </div>
    </div>
@endsection
