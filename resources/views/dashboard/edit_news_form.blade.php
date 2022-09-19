@extends('includes.dashboard_html_structure')

@section('icon', 'edit.png')

@section('title')
ویرایش خبر: {{ $news->name }}
@endsection

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">ویرایش خبر</h1><br>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-edit"></i>
                        ویرایش خبر: {{ $news->name }}
                    </div>
                    <div class="card-body" style="direction: rtl;">
                        <form action="{{ route('update.news', ['news' => $news->id]) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <input type="text" name="name" placeholder="نام خبر" value="@if(empty(old('name'))){{ $news->name }}@else{{ old('name') }}@endif" class="form-control">
                            @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span><br>
                            @endif
                            <br>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    @if(!empty(old('category_id')))
                                        <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                                    @else
                                        @if($category->id == $news->category_id)
                                            <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endif
                                    @endif
                                @endforeach
                            </select><br>
                            <textarea name="short_description" id="short_description" rows="15" placeholder="معرفی خبر" class="form-control">@if(empty(old('short_description'))){{ $news->short_description }}@else{{ old('short_description') }}@endif</textarea>
                            @if($errors->has('short_description'))
                                <span class="text-danger">{{ $errors->first('short_description') }}</span><br>
                            @endif
                            <br>
                            <textarea name="long_description" id="long_description" rows="15" placeholder="متن خبر" class="form-control">@if(empty(old('long_description'))){{ $news->long_description }}@else{{ old('long_description') }}@endif</textarea>
                            @if($errors->has('long_description'))
                                <span class="text-danger">{{ $errors->first('long_description') }}</span><br>
                            @endif
                            <br><br>
                            <label for="old_image">تصویر قبلی این خبر:</label><br><br>
                            <img src="/images/news_images/{{ $news->image }}" id="old_image" alt="تصویری به نمایش در نیامد." style="width: 100%; height: 300px; border: none; border-radius: 5px;"><br><br>
                            <div class="mb-3">
                                <label for="new_image" class="form-label">در صورت تمایل، تصویر جدیدی برای این خبر آپلود کنید:</label>
                                <input type="file" name="new_image" id="new_image" class="form-control">
                            </div>
                            <br>
                            <input type="submit" value="ویرایش" class="btn btn-warning" style="color: white;">
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
      tinymce.init({
        selector: '#short_description',
        directionality: 'rtl',
        plugins: [
          'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
          'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
          'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
        ],
        toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
          'alignleft aligncenter alignright alignjustify | ' +
          'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
      });
    </script>

    <script>
        tinymce.init({
          selector: '#long_description',
          directionality: 'rtl',
          plugins: [
            'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
            'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
            'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
          ],
          toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
            'alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
        });
      </script>
@endsection
