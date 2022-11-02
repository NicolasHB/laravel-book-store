<div class="bg-slate-900 ">
    <div class="flex justify-between px-20 py-7">
        <div class=" ">
            <p class="text-white"><span class="text-orange-600 text-2xl">B</span>ook<span class="text-orange-600 text-2xl">S</span>tore</p>
        </div>
        <div class="space-x-5 text-white flex ">
            <a href="{{ Route('home') }}">Home</a>
            @guest
            <a href="{{ Route('login') }}">Connexion</a>
            <a href="{{ Route('register') }}">Inscription</a>
            @endguest
            @auth
            <div class="flex gap-3">
                {{-- <x-btn-logout /> --}}
                {{-- <a href="{{ Route('logout') }}">Déconnexion</a> --}}
                <a href="{{ Route('dashboard') }}">Dashboard</a>
            </div>
            @endauth
        </div>
    </div>
</div>