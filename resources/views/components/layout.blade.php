<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{asset('css/layout/layout.css')}}">
    <title>
        {{$title??'my cool title'}}
    </title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />
    @if(isset($styles))
        <link rel="stylesheet" href="{{asset($styles)}}">
    @endif
</head>
<body>
<script src="{{asset('bundle.js')}}"></script>
<script>backgroundHandler()</script>
<div class="wrapper">
    <header>
        <x-header/>
    </header>
    <main>
        {{$slot}}
    </main>
</div>
</body>
</html>
