
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Dark Bootstrap Admin </title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="all,follow">
<meta name="csrf-token" content="{{ csrf_token() }}">
@vite('resources/css/app.css')
<!-- Bootstrap CSS-->
<link rel="stylesheet" href="{{asset('/admin/vendor/bootstrap/css/bootstrap.min.css')}}">
<!-- Font Awesome CSS-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="{{asset('/admin/vendor/font-awesome/css/font-awesome.min.css')}}">
<!-- Custom Font Icons CSS-->
<link rel="stylesheet" href="{{asset('/admin/css/font.css')}}">
<!-- Google fonts - Muli-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
<!-- theme stylesheet-->
<link rel="stylesheet" href="{{asset('/admin/css/style.default.css')}}" id="theme-stylesheet" >
<!-- Custom stylesheet - for your changes-->
<link rel="stylesheet" href="{{asset('/admin/css/custom.css')}}">
<!-- Favicon-->
<link rel="shortcut icon" href="{{asset('/admin/img/favicon.ico')}}">
<!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

