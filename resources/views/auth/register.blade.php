@extends('layout')

@section('content')

<script>
    var stepNumber = 1;

    function nextForm() {
        var step = 'step' + stepNumber;
        var nextStep = 'step' + (stepNumber + 1);
        var type = 'type' + stepNumber;
        var nextType = 'type' + (stepNumber + 1);
        stepNumber++;

        //Change form
        document.getElementById(step).style.display = "none";
        document.getElementById(nextStep).style.display = "block";

        //Change form indicator
        document.getElementById(type).classList.remove("text-blue-600");
        document.getElementById(type).classList.add("text-gray-500");
        document.getElementById(nextType).classList.remove("text-gray-500");
        document.getElementById(nextType).classList.add("text-blue-600");
        document.getElementById(type).getElementsByClassName( 'border-blue-600' )[0].classList.add("border-gray-500");
        document.getElementById(type).getElementsByClassName( 'border-gray-500' )[0].classList.remove("border-blue-600");
        document.getElementById(nextType).getElementsByClassName( 'border-gray-500' )[0].classList.add("border-blue-600");
        document.getElementById(nextType).getElementsByClassName( 'border-blue-600' )[0].classList.remove("border-gray-500");

        //Show back button
        document.getElementById('back').classList.remove("hidden");

        //Show back button
        if(stepNumber == 3){
            document.getElementById('forward').classList.add("hidden");
            document.getElementById('finish').classList.remove("hidden");
            document.getElementById('finish').classList.add("block");
        }
    }

    function lastForm() {
        var step = 'step' + stepNumber;
        var nextStep = 'step' + (stepNumber - 1);
        var type = 'type' + stepNumber;
        var nextType = 'type' + (stepNumber - 1);
        stepNumber--;

        //Change form
        document.getElementById(step).style.display = "none";
        document.getElementById(nextStep).style.display = "block";

        //Change form indicator
        document.getElementById(type).classList.remove("text-blue-600");
        document.getElementById(type).classList.add("text-gray-500");
        document.getElementById(nextType).classList.remove("text-gray-500");
        document.getElementById(nextType).classList.add("text-blue-600");
        document.getElementById(type).getElementsByClassName( 'border-blue-600' )[0].classList.add("border-gray-500");
        document.getElementById(type).getElementsByClassName( 'border-gray-500' )[0].classList.remove("border-blue-600");
        document.getElementById(nextType).getElementsByClassName( 'border-gray-500' )[0].classList.add("border-blue-600");
        document.getElementById(nextType).getElementsByClassName( 'border-blue-600' )[0].classList.remove("border-gray-500");

        //Show back button
        if(stepNumber == 1){
            document.getElementById('back').classList.add("hidden");
        }
    }

    $(document).ready(function(){
        $('#cellphone').inputmask('(99)-99999-9999');
        $('#cnpj').inputmask('99.999.999/9999-99');
    });

</script>

<body class="bg-gray-100">
    <div class="grid h-screen grid-cols-2">
        <div class="items-center p-16 bg-white shadow-md overscroll-contain">
            <h1 class="mb-4 text-3xl font-bold">Crie sua conta</h1>
            <p class="mb-8 text-sm">Se você já possui uma conta,
                <a href="{{route('login')}}" class="font-bold text-blue-500">acesse aqui!</a>
            </p>
            <ol class="items-center w-full mb-4 space-y-4 sm:flex sm:space-x-8 sm:space-y-0 rtl:space-x-reverse">
                <li id="type1" class="flex items-center text-blue-600 dark:text-blue-500 space-x-2.5 rtl:space-x-reverse">
                    <span class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
                        1
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Empresa</h3>
                        <p class="text-sm">Cadastre ou selecione uma empresa existente.</p>
                    </span>
                </li>
                <li id="type2" class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5 rtl:space-x-reverse">
                    <span class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                        2
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Pessoa</h3>
                        <p class="text-sm">Cadastre suas informações pessoais</p>
                    </span>
                </li>
                <li id="type3" class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5 rtl:space-x-reverse">
                    <span class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                        3
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Usuário</h3>
                        <p class="text-sm">Crie um usuário e uma senha para acessar o sistema</p>
                    </span>
                </li>
            </ol>

            @if($errors->any())
                {{ implode('', $errors->all(':message')) }}
            @endif

            <form class="block" action="{{route('register')}}" method="POST">
                @csrf
                {{-- Company Form --}}
                <fieldset name="company">
                    <div id="step1">
                        <div class="mb-4">
                            <label for="company_name" class="block mb-2 text-sm font-bold text-gray-700">Nome da Empresa</label>
                            <input type="text" name="company_name" id="company_name" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="cnpj" class="block mb-2 text-sm font-bold text-gray-700">CNPJ</label>
                            <input type="text" name="cnpj" id="cnpj" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
                        </div>
                    </div>
                </fieldset>

                {{-- Person Form --}}
                <fieldset name="person">
                    <div id="step2" class="hidden">
                        <div class="mb-4">
                            <label for="name" class="block mb-2 text-sm font-bold text-gray-700">Nome</label>
                            <input type="text" name="name" id="name" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="cellphone" pattern="[0-9]{9}" class="block mb-2 text-sm font-bold text-gray-700">Telefone</label>
                            <input type="tel" name="cellphone" id="cellphone" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="role" class="block mb-2 text-sm font-bold text-gray-700">Cargo</label>
                            <input type="text" name="role" id="role" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block mb-2 text-sm font-bold text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
                        </div>
                    </div>
                </fieldset>

                {{-- User Form --}}
                <fieldset name="user">
                    <div id="step3" class="hidden">
                        <div class="mb-4">
                            <label for="username" class="block mb-2 text-sm font-bold text-gray-700">Nome de Usuário</label>
                            <input type="text" name="username" id="username" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block mb-2 text-sm font-bold text-gray-700">Senha</label>
                            <input type="password" name="password" id="password" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="password_confirmation" class="block mb-2 text-sm font-bold text-gray-700">Confirmar Senha</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
                        </div>
                    </div>
                </fieldset>

                <div id="finish" class="hidden w-1/3 mb-8">
                    <button type="submit" name="register" class="w-full px-4 py-2 text-white bg-blue-700 rounded hover:bg-blue-800">
                        Finalizar
                    </button>
                </div>
            </form>

            <div class="grid grid-cols-3">
                <div class="mb-8">
                    <button id="back" onclick="lastForm()"  class="hidden w-full px-4 py-2 text-white bg-blue-700 rounded hover:bg-blue-800">
                        <span class="mr-2 text-xl font-bold"><</span>
                        Anterior</button>
                </div>

                <div></div>
                <div>
                    <div class="mb-8" id="forward">
                        <button  onclick="nextForm()"  class="w-full px-4 py-2 text-white bg-blue-700 rounded hover:bg-blue-800">
                            Próximo
                            <span class="ml-2 text-xl font-bold">></span></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-blue-950">

        </div>
    </div>
</body>
@endsection
