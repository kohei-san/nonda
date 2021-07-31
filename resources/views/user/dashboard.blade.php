<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            こんにちは
        </h2>
    </x-slot>
    
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-wrap flex-col">
            <img class="xl:w-1/2 lg:w-1/2 md:w-3/4 w-full block mx-auto mb-10 object-cover object-center rounded" alt="hero" src="{{ Storage::url('public/storage/'. $image->image) }}">
            <div class="flex flex-col text-center w-full">
                <h1 class="text-xl font-medium title-font mb-4 text-gray-900">{{ $image->title }}</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">{{ $image->message }}</p>
            </div>
        </div>
    </section>
    <x-user-button></x-user-button>
</x-app-layout>

