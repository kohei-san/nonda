<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          画像一覧
      </h2>
  </x-slot>

  <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-wrap -m-4">
        @foreach($images as $image)
          <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
            <a href="{{ route('user.image.show', ['image'=> $image->id]) }}" class="block relative h-48 rounded overflow-hidden">
              <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="{{ Storage::url('public/storage/'.$image->image) }}">
            </a>
            <div class="mt-4">
              <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{ $image->created_at->diffForHumans() }}</h3>
              <h2 class="text-gray-900 title-font text-lg font-medium">{{ $image->title }}</h2>
              <p class="mt-1">{{ $image->message }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    {{-- {{ $images->links() }} --}}
  </section>
</x-app-layout>