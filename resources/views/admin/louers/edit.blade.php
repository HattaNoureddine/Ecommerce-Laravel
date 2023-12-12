<!doctype html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Phoenix</title>
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('dashassets/css/phoenix.min.css') }}" rel="stylesheet" id="style-default">
    <link href="{{ asset('dashassets/css/user.min.css') }}" rel="stylesheet" id="user-style-default">
    
    <style>
      body {
        opacity: 0;
      }
    </style>
  </head>

  <body>
    <main class="main" id="top">
      <div class="container-fluid px-0">

@include('inc.admin.sidebar')

@include('inc.admin.nav')
<div class="content">
    <div class="pb-5">
       <div class="row g-5"></div>
<form action="/louer/product/update" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label" for="exampleFormControlInput1">Name</label>
        <input type="hidden" name="id_product" value="{{ $louer->id }}">
         <input  value="{{ $louer->name }}" class="form-control" id="exampleFormControlInput1" type="text" name="name" placeholder="name......">
    </div>

    <div class="mb-3">
        <label class="form-label" for="exampleFormControlInput1">description</label>
         <input value="{{ $louer->description }}" class="form-control" id="exampleFormControlInput1" type="text" name="description" placeholder="description......">
    </div>

    <div class="mb-3">
        <label class="form-label" for="exampleFormControlInput1">price</label>
         <input value="{{ $louer->price }}" class="form-control" id="exampleFormControlInput1" type="text" name="price" placeholder="price......">
    </div>

    <div class="mb-3">
        <label class="form-label" for="exampleFormControlInput1">qte</label>
         <input value="{{ $louer->qte }}" class="form-control" id="exampleFormControlInput1" type="text" name="qte" placeholder="qte......">
    </div>

    <div class="mb-3">
        <label class="form-label" for="exampleFormControlInput1">photo</label>
         <input class="form-control" id="exampleFormControlInput1" type="file" name="photo" placeholder="qte......">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Modifier</button>
    </div>
</form>
    </div>
    </div>
</div>