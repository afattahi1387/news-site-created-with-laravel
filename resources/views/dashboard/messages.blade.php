@extends('includes.dashboard_html_structure')

@section('title', 'پیام های دریافت شده')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">پیام های دریافت شده</h1><br>
                @foreach ($flashed_messages as $message)
                    <div class="alert alert-{{ $message[0] }}" style="direction: rtl;">{{ $message[1] }}</div>
                @endforeach
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-message"></i>
                        پیام های دریافت شده
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>نام کاربر</th>
                                    <th>ایمیل کاربر</th>
                                    <th>پیام ارسال شده</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $messagesCounter = 0;
                                @endphp
                                @foreach ($messages as $message)
                                    <tr>
                                        <td>@php echo ++$messagesCounter; @endphp</td>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>{!! $message->message !!}</td>
                                        <td>
                                            <a href="#" class="btn btn-success">مشاهده شد</a>
                                            <a href="#" class="btn btn-primary">پاسخ دادن</a>
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
