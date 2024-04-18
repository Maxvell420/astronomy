<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
</head>
<body>
<script src="{{asset('bundle.js')}}"></script>
<div class="dashboardWrapper">
    <div class="dashboardContent">
        <header>
            <x-header/>
        </header>
        <main>
            <div class="content">
                {{$slot}}
            </div>
        </main>
    </div>
</div>
</body>
</html>
