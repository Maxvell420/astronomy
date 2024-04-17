<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{asset('style.css')}}">
</head>
<body>
<script src="{{asset('bundle.js')}}"></script>
<div class="wrapper">
    <header>
        <x-header/>
    </header>
    <main>
        <div class="content">
            {{$slot}}
        </div>
    </main>
</div>
</body>
</html>
