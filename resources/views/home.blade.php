<x-guest-layout>

    <div class="flex justify-between items-center w-full top-0 right-0 z-40 px-6 py-4 lg:px-20 bg-white dark:bg-gray-900">
        <h1 class="text-2xl text-gray-700 font-semibold">Catatan Keuangan</h1>

        @if (Route::has('login'))
        <div class="">
            @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
            @endauth
        </div>
        @endif
    </div>
    <div class="border"></div>
    <div class="grid md:grid-cols-2 gap-4 px-6 py-4 lg:px-20">
        <div class="pt-4">
            <h2 class="text-4xl lg:text-6xl font-bold text-slate-800">Membantumu mengatur segala urusan pencatatan keuangan</h2>
            <p class="mt-4 text-2xl italic text-slate-600 font-mono">"Ketahuilan apa yang kamu miliki dan ketahui mengapa kamu memilikinya"</p>
            <div class="mt-4 lg:mt-6">
                @auth
                <a href="{{ url('/dashboard') }}" class="px-6 py-2 rounded bg-indigo-500 hover:bg-indigo-700 text-white">Dashboard</a>
                @endauth
                @guest
                <a href="{{ route('dashboard.index') }}" class="px-6 py-2 rounded bg-indigo-500 hover:bg-indigo-700 text-white text-sm uppercase">Login sekarang</a>
                @endguest
            </div>
        </div>
        <div class="">
            <img src="{{ asset('img/features-3.png') }}" alt="" srcset="" class="lg:float-right">
        </div>
    </div>

</x-guest-layout>