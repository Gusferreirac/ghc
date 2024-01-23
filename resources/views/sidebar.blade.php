<script>
    function toggleSidebar() {
        document.getElementById("sidebar").style.width = "30vh";
        document.getElementById("openMenu").style.width = "0";
        document.getElementById("welcome").style.marginLeft = "30vh";
        document.getElementById("main").style.marginLeft = "30vh";
    }

    function closeNav() {
        document.getElementById("sidebar").style.width = "0";
        document.getElementById("welcome").style.marginLeft = "0";
        document.getElementById("main").style.marginLeft = "0";
        document.getElementById("openMenu").style.width = "24px";
    }
</script>

<div id="sidebar" class="absolute top-0 left-0 z-10 w-0 h-[calc(100vh-64px)] mb-8 overflow-hidden transition-all duration-500 ease-in-out bg-blue-800">
    <button onclick="closeNav()">
        <x-vaadin-chevron-left class="absolute w-6 text-white right-4 top-4"/>
    </button>
    <div class="grid grid-rows-3 gap-2 m-4 text-white">
        <a class="flex hover:font-bold hover:underline" href="#">
            <x-vaadin-user class="w-4 mr-2"/>
            Perfil
        </a>
        <a class="flex hover:font-bold hover:underline" href="#">
            <x-vaadin-cog class="w-4 mr-2"/>
            Configurações
        </a>
        <a class="flex hover:font-bold hover:underline" href="#">
            <x-vaadin-question-circle class="w-4 mr-2"/>
            Suporte
        </a>
        <form action="{{route('logout')}}" method="POST">
            @csrf
            <button class="flex hover:font-bold hover:underline" href="{{route('logout')}}">
                <x-vaadin-sign-out class="w-4 mr-2"/>
                Sair
            </button>
        </form>
    </div>
</div>

<button onclick="toggleSidebar()">
    <x-vaadin-menu id="openMenu" class="w-6 mr-8"/>
</button>

<h1 id="welcome" class="text-xl font-bold transition-all duration-500 ease-in-out">Olá <span class="text-blue-600">{{auth()->user()->name}}</span>!</h1>
