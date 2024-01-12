@extends('layout')

@section('content')
<body class="bg-gray-100">
    <div class="grid grid-cols-2 h-screen">
        <div class="bg-white items-center p-20 shadow-md">
            <h1 class="text-3xl mb-4 font-bold">Acesse sua conta</h1>
            <p class="mb-8 text-sm">Se você ainda não possui uma conta,
                <a href="{{route('register')}}" class="text-blue-500 font-bold">registre-se aqui!</a>
            </p>
            <form action="" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" name="email" id="email" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Senha</label>
                    <input type="password" name="password" id="password" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
                </div>
                <div class="grid grid-flow-col grid-cols-2 w-full mb-8">
                    <div>
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember" class="text-gray-700 text-sm font-bold">Lembrar-me</label>
                    </div>
                    <div class="ml-auto">
                        <a href=""><p class="text-gray-700 hover:underline opacity-60 text-sm font-bold">Esqueci minha senha</p></a>
                    </div>
                </div>
                <div class="mb-8">
                    <button type="submit" class="w-full bg-blue-700 text-white py-2 px-4 rounded hover:bg-blue-800">Entrar</button>
                </div>
            </form>
        </div>
        <div class="bg-blue-950">

        </div>
    </div>
</body>
@endsection
