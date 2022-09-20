<!DOCTYPE html>
<html dir="rtl" lang="fa">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ارتباط با ما</title>
    <!-- Favicon-->
    <link rel="icon" href="/images/icons/contact-us.png" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <style>
        * {
            font-size: 18px;
        }

        .footer-a {
            text-decoration: none;
            color: red;
        }

        .footer-a:hover {
            color: blue;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">{{ env('APP_NAME') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        </div>
    </nav>
    <div class="panel panel-default" style="margin: 10px;">
        <div class="panel-heading">تماس با ما</div>
        <div class="panel-body">
            <form action="{{ route('post.contact.us') }}" method="POST">
                {{ csrf_field() }}
                <input type="text" name="name" placeholder="نام" value="{{ old('name') }}" class="form-control @if($errors->has('name')) is-invalid @endif">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span><br>
                @endif
                <br>
                <input type="email" name="email" placeholder="ایمیل" value="{{ old('email') }}" class="form-control @if($errors->has('email')) is-invalid @endif">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span><br>
                @endif
                <br>
                <textarea name="message" id="message" rows="15" placeholder="پیام" class="form-control">{{ old('message') }}</textarea>
                @if($errors->has('message'))
                    <span class="text-danger">{{ $errors->first('message') }}</span><br>
                @endif
                <br>
                <input type="submit" value="ثبت" class="btn btn-success">
            </form>
        </div>
    </div><br>
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">تمامی حقوق این سایت متعلق به <a href="{{ route('home') }}" class="footer-a">{{ env('APP_NAME') }}</a> است.</p></div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
      tinymce.init({
        selector: '#message',
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
</body>
</html>
