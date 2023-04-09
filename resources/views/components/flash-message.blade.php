@if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2500)" x-show="show" {{-- alpine.js e tal, timeouts para a flashmessage desaparecer, valor em ms --}}
        class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py-3"> 
        <p>
            {{session('message')}}
        </p>
    </div>
@endif