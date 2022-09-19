@extends('includes.dashboard_html_structure')

@section('icon', 'trash.png')

@section('title', 'سطل زباله')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">سطل زباله</h1><br>
                @foreach ($flashed_messages as $message)
                    <div class="alert alert-{{ $message[0] }}" style="direction: rtl;">{{ $message[1] }}</div>
                @endforeach
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-trash"></i>
                        سطل زباله
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>نام خبر</th>
                                    <th>تصویر خبر</th>
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
                                            <img src="/images/trash_images/{{ $on_news->image }}" alt="تصویری به نمایش در نیامد." style="width: 300px; border-radius: 5px;">
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('recovery', ['news' => $on_news->id]) }}" class="btn btn-success" style="margin-right: 3px;">بازیابی</a>
                                                <form action="{{ route('delete.news', ['news' => $on_news->id]) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="delete">
                                                    <button class="btn btn-danger" onclick="if(confirm('آیا از حذف کامل این خبر مطمئن هستید؟')){return true;}else{return false;}">حذف</button>
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
