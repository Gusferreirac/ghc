@extends('layout')

@section('content')
<body>
    <div class="absolute flex items-center m-8">
       @include('sidebar')
    </div>
    <div id="main" class="flex h-screen transition-all duration-500 ease-in-out">
        @yield('type')
    </div>
</body>
@endsection
