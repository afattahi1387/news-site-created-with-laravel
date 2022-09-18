@extends('includes.dashboard_html_structure')

@section('icon', 'add.jpg')

@section('title', 'افزودن خبر')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">افزودن خبر</h1><br>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-plus"></i>
                        افزودن خبر
                    </div>
                    <div class="card-body" style="direction: rtl;">
                        <form action="{{ route('create.news') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="text" name="name" placeholder="نام خبر" value="{{ old('name') }}" class="form-control">
                            @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span><br>
                            @endif
                            <br>
                            <select name="category_id" class="form-control">
                                <option value="">دسته بندی مورد نظر خود را انتخاب کنید</option>
                                @foreach($categories as $category)
                                    @if(!empty(old('category_id')) && old('category_id') == $category->id)
                                        <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if($errors->has('category_id'))
                                <span class="text-danger">{{ $errors->first('category_id') }}</span><br>
                            @endif
                            <br>
                            <textarea name="short_description" id="short_description" rows="15" placeholder="معرفی خبر" class="form-control">{{ old('short_description') }}</textarea>
                            @if($errors->has('short_description'))
                                <span class="text-danger">{{ $errors->first('short_description') }}</span><br>
                            @endif
                            <br>
                            <textarea name="long_description" id="long_description" rows="15" placeholder="متن خبر" class="form-control">{{ old('long_description') }}</textarea>
                            @if($errors->has('long_description'))
                                <span class="text-danger">{{ $errors->first('long_description') }}</span><br>
                            @endif
                            <br>
                            <input type="submit" value="افزودن" class="btn btn-success">
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
