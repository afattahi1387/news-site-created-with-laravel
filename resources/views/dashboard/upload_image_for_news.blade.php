@extends('includes.dashboard_html_structure')

@section('icon', 'upload.png')

@section('title')
آپلود تصویر برای خبر: {{ $news->name }}
@endsection

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">آپلود تصویر</h1><br>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-upload"></i>
                        آپلود تصویر برای خبر: {{ $news->name }}
                    </div>
                    <div class="card-body" style="direction: rtl;">
                        <form action="{{ route('insert.image.for.news', ['news' => $news->id]) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="image" class="form-label">لطفا تصویر خود را با استفاده از کادر زیر آپلود کنید:</label>
                                <input type="file" name="image" id="image" class="form-control"><br>
                                <input type="submit" value="تایید" class="btn btn-success">
                            </div>
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
