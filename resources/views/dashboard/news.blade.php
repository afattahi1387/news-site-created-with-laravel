@extends('includes.dashboard_html_structure')

@section('title', 'اخبار')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">اخبار</h1><br>
                @foreach ($flashed_messages as $message)
                    <div class="alert alert-{{ $message[0] }}" style="direction: rtl;">{{ $message[1] }}</div>
                @endforeach
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-newspaper"></i>
                        اخبار
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>نام خبر</th>
                                    <th>تصویر خبر</th>
                                    <th>دسته بندی</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $newsCounter = 0;
                                @endphp
                                @foreach ($news as $on_news)
                                    <tr>
                                        <td>@php echo ++$newsCounter; @endphp</td>
                                        <td>{{ $on_news->name }}</td>
                                        <td>
                                            <img src="/images/news_images/{{ $on_news->image }}" alt="تصویری به نمایش در نیامد." style="width: 200px; border-radius: 5px;">
                                        </td>
                                        <td>{{ $on_news->category->category_name }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('single.news', ['news' => $on_news->id]) }}" target="_blank" class="btn btn-primary" style="margin-right: 3px;">مشاهده</a>
                                                <a href="{{ route('edit.news', ['news' => $on_news->id]) }}" class="btn btn-warning" style="color: white; margin-right: 3px;">ویرایش</a>
                                                <form action="{{ route('move.to.trash', ['news' => $on_news->id]) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="delete">
                                                    <button class="btn btn-danger" style="margin-right: 3px;" onclick="if(confirm('آیا از انتقال این خبر به سطل زباله مطمئن هستید؟')){return true;}else{return false;}">انتقال به سطل زباله</button>
                                                </form>
                                                <form action="" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="delete">
                                                    <button class="btn btn-danger">حذف کامل</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
