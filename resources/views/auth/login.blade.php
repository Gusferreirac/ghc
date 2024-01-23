@extends('layout')

@section('content')
<body class="bg-gray-100">
    <div class="grid h-screen grid-cols-2">
        <div class="items-center p-20 bg-white shadow-md">
            <h1 class="mb-4 text-3xl font-bold">Acesse sua conta</h1>
            <p class="mb-8 text-sm">Se você ainda não possui uma conta,
                <a href="{{route('register')}}" class="font-bold text-blue-500">registre-se aqui!</a>
            </p>
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-bold text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block mb-2 text-sm font-bold text-gray-700">Senha</label>
                    <input type="password" name="password" id="password" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
                </div>
                <div class="grid w-full grid-flow-col grid-cols-2 mb-8">
                    <div>
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember" class="text-sm font-bold text-gray-700">Lembrar-me</label>
                    </div>
                    <div class="ml-auto">
                        <a href=""><p class="text-sm font-bold text-gray-700 hover:underline opacity-60">Esqueci minha senha</p></a>
                    </div>
                </div>
                <div class="mb-8">
                    <button type="submit" class="w-full px-4 py-2 text-white bg-blue-700 rounded hover:bg-blue-800">Entrar</button>
                </div>
            </form>
        </div>
        <div class="bg-blue-950">

        </div>
    </div>
</body>
@endsection
