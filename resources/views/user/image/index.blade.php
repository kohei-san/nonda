<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          画像一覧
      </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="md:p-6 bg-white border-b border-gray-200">

          <section class="text-gray-600 body-font">
            <div class="container md:px-5 mx-auto">

              <x-flash-message status="session('status')" />
              <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                <table class="table-auto w-full text-left whitespace-no-wrap">
                  <thead>
                    <tr>
                      <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">名前</th>
                      <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">メッセージ</th>
                      <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">画像</th>
                      <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">作成日</th>
                      <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($images as $image)
                      <tr>
                        <td class="md:px-4 py-3">{{ $image->title }}</td>
                        <td class="md:px-4 py-3">{{ $image->message }}</td>
                        <td class="md:px-4 py-3"><img src="{{ Storage::url('public/storage/'.$image->image) }}" alt="" class="w-5 h-5"></td>
                        <td class="md:px-4 py-3">{{ $image->created_at->diffForHumans() }}</td>
                        <td>
                          <button onclick="location.href='{{ route('user.image.show', ['image'=> $image->id]) }}'" class="text-white bg-gray-300 border-0 py-2 md:px-4 focus:outline-none hover:bg-indigo-600 rounded">詳細</button>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                {{-- {{ $images->links() }} --}}
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>

  <script>
    function deletePost(e) {
      'use strict';
      if (confirm('本当に削除してもいいですか？')) {
        document.getElementById('delete_' + e.dataset.id).submit();
      }
    }
  </script>
</x-app-layout>