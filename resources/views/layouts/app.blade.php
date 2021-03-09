<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel-Post</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li><a href="/" class="p-3">Home</a></li>
            <li><a href="{{route('dashboard')}}" class="p-3">Dashboard</a></li>
            <li><a href="{{route('posts')}}" class="p-3">Post</a></li>
        </ul>
        <ul class="flex items-center">
            @if (auth()->user())
                {{-- bisa pake @auth @endauth--}}
                <li><a href="" class="p-3">{{auth()->user()->name}}</a></li>
                <form action="{{route('logout')}}" method="post" class="p-3 inline">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @else    
                {{-- bisa pake @guest @endguest --}}
                <li><a href="{{route('login')}}" class="p-3">Login</a></li>
                <li><a href="{{route('register')}}" class="p-3">Register</a></li>
            @endif
        </ul>
    </nav>
    @yield('content')
</body>
</html>