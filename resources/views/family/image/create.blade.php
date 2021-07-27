<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          画像投稿
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                <section class="text-gray-600 body-font relative">
                  <div class="container px-5mx-auto">
                    <div class="flex flex-col text-center w-full">
                      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">画像投稿</h1>
                    </div>
                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                      <form action="{{ route('family.image.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <div class="-m-2">
                          <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                              <label for="title" class="leading-7 text-sm text-gray-600">タイトル ※必須</label>
                              <input type="text" id="title" name="title" value="{{ old('title') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>
                          <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                              <label for="message" class="leading-7 text-sm text-gray-600">メッセージ</label>
                              <textarea id="message" name="message" value="{{ old('message') }}"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </textarea>
                            </div>
                          </div>
                          <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                              <label for="image1" class="leading-7 text-sm text-gray-600">画像 *必須</label>
                              <input type="file" accept="image/png, image/jpeg, image/jpg" id="image" name="image" required class="w-full py-1 px-3 leading-8">
                            </div>
                          </div>
                          <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                              <label for="image_title" class="leading-7 text-sm text-gray-600">画像タイトル</label>
                              <input type="text" id="image_title" name="image_title" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>

                          <div class="p-2 w-full mt-4 flex justify-around">
                            <button type="button" onclick="location.href='{{ route('admin.family.index') }}'" class="text-white bg-gray-300 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                            <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">投稿する</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </section>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
