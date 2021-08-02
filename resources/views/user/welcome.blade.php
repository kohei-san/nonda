<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        {{-- fontawsome --}}
        <script src="https://kit.fontawesome.com/f7d9360c1b.js" crossorigin="anonymous"></script>
    </head>

    <body class="antialiased">
        <section class="text-gray-600 body-font">
              <div class="text-center pt-10 mb-20 bg-theme">
                <h1 class="text-5xl font-medium text-white mb-4">Nonda?</h1>
                <p class="text-lg leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-white">家族のつながりと<br>健康をサポートするアプリ</p>
                <div class="flex mt-6 justify-center">
                  <div class="w-16 h-1 rounded-full inline-flex bg-theme"></div>
                </div>
              </div>

              <div class="container mx-auto">
                <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6">
                  <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
                    <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0">
                      <i class="fas fa-user-edit fa-2x"></i>
                    </div>
                    <div class="flex-grow">
                      <h2 class="text-gray-900 text-lg title-font font-medium mb-3">管理者</h2>
                      <p class="leading-relaxed text-base">初めてご利用される場合、まずは代表の方が管理者としてアカウントを作成してください。管理者のみ家族アカウント, ユーザーの登録が可能です。</p>
                      <a href="{{ route('admin.register') }}" class="mt-3 text-indigo-500 inline-flex items-center">新規登録はこちら
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                          <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                      </a>
                    </div>
                    <button type="button" onclick="location.href='{{ route('admin.login') }}'" class="flex mx-auto mt-3 text-white bg-theme border-0 py-2 px-8 focus:outline-none hover:bg-theme rounded text-lg">管理者ログイン</button>
                  </div>
  
                  <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
                    <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0">
                      <i class="fas fa-users fa-2x "></i>
                    </div>
                    <div class="flex-grow">
                      <h2 class="text-gray-900 text-lg title-font font-medium mb-3">家族アカウント</h2>
                      <p class="leading-relaxed text-base">ユーザーをサポートされる方々は家族アカウントとしてログインしてください。家族アカウントは管理者が作成可能です。</p>
                    </div>
                    <button type="button" onclick="location.href='{{ route('family.login') }}'" class="flex mx-auto mt-3 text-white bg-theme border-0 py-2 px-8 focus:outline-none hover:bg-theme rounded text-lg">家族ログイン</button>
                  </div>
  
                  <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
                    <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0">
                      <i class="fas fa-user fa-2x"></i>
                    </div>
                    <div class="flex-grow">
                      <h2 class="text-gray-900 text-lg title-font font-medium mb-3">ユーザー</h2>
                      <p class="leading-relaxed text-base">薬やサプリなどを服用される方は、こちらからログインしてください。ユーザーアカウントは管理者が作成可能です。</p>
                    </div>
                    <button type="button" onclick="location.href='{{ route('user.login') }}'" class="flex mx-auto mt-3 text-white bg-theme border-0 py-2 px-8 focus:outline-none hover:bg-theme rounded text-lg">ユーザーログイン</button>
                  </div>
                </div>

              </div>
          </section>
    </body>

</html>
