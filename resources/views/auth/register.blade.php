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

        //Show finish button
        if(stepNumber == 3){
            document.getElementById('forward').classList.add("hidden");
            document.getElementById('finish').classList.remove("hidden");
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

        document.getElementById('forward').classList.remove("hidden");
        document.getElementById('finish').classList.add("hidden");

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
                @include('auth.forms.company_form')
                {{-- Person Form --}}
                @include('auth.forms.person_form')
                {{-- User Form --}}
                @include('auth.forms.user_form')

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
                        <div id="finish" class="hidden mb-8">
                            <button type="submit" name="register" class="w-full px-4 py-2 text-white bg-blue-700 rounded hover:bg-blue-800">
                                Finalizar
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <div class="bg-blue-950">

        </div>
    </div>
</body>
@endsection
