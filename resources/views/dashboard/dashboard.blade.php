@extends('includes.dashboard_html_structure')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">داشبورد</h1><br>
                @foreach ($flashed_messages as $message)
                    <div class="alert alert-{{ $message[0] }}" style="direction: rtl;">{{ $message[1] }}</div>
                @endforeach
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fa fa-edit"></i>
                                ویرایش دسته بندی
                            </div>
                            <div class="card-body"></div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fa fa-plus"></i>
                                افزودن دسته بندی
                            </div>
                            <div class="card-body"></div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        دسته بندی ها
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>نام دسته بندی</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $categoriesCounter = 0;
                                @endphp
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>@php echo ++$categoriesCounter; @endphp</td>
                                        <td>{{ $category->category_name }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-warning" style="color: white; margin-right: 3px;">ویرایش</a>
                                                @if($category->allow_for_delete())
                                                    <form action="{{ route('delete.category', ['category' => $category->id]) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="delete">
                                                        <button class="btn btn-danger" onclick="if(confirm('آیا از حذف این دسته بندی مطمئن هستید؟')){return true;}else{return false;}">حذف</button>
                                                    </form>
                                                @endif
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
