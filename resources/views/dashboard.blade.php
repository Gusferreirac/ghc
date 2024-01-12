@extends('layout')

@section('content')
<body>
    <div class="absolute m-8 flex items-center">
       @include('sidebar')
        <h1 class="font-bold text-xl">Olá <span class="text-blue-600">usuário</span>!</h1>
    </div>
    <div class="flex h-screen">
        @yield('type')
    </div>
</body>
@endsection
