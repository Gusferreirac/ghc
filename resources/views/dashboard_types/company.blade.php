@extends('dashboard')

@section('type')

<div class="m-auto text-center">
    <p class="font-bold text-xl">Você ainda não está vinculado a nenhuma empresa. <br> Deseja cadastrar uma nova empresa ou se vincular a uma existente?</p>
    <div class="grid grid-cols-2 gap-4">
        <button class="transition mt-4 bg-blue-800 text-white text-sm py-2 px-12 rounded-full hover:delay-50 hover:outline hover:outline-2 hover:outline-blue-800 hover:bg-transparent hover:text-blue-800">
            Cadastrar nova empresa
        </button>
        <button class="transition mt-4 bg-blue-800 text-white text-sm py-2 px-12 rounded-full hover:delay-50 hover:outline hover:outline-2 hover:outline-blue-800 hover:bg-transparent hover:text-blue-800">
            Vincular-se a uma empresa existente
        </button>
    </div>
</div>

@endsection
