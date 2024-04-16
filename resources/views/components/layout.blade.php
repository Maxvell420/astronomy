<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{asset('style.css')}}">
</head>
<body>
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
