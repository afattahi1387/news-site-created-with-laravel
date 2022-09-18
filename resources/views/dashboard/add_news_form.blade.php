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
                            <input type="text" name="name" placeholder="نام خبر" class="form-control"><br>
                            <select name="category_id" class="form-control">
                                <option value="">دسته بندی مورد نظر خود را انتخاب کنید</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select><br>
                            <textarea name="short_description" id="short_description" rows="15" placeholder="معرفی خبر" class="form-control"></textarea><br>
                            <textarea name="long_description" id="long_description" rows="15" placeholder="متن خبر" class="form-control"></textarea><br>
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
