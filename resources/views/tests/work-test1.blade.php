<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <title>打刻ページ</title>
</head>
<body>
  <div class=" bg-gray-800 bg-opacity-90 shadow-2xl ">
  <header class="container mx-auto text-white">
      <div class="flex justify-between items-center p-3 md:float-left">
      <h1 class="text-4xl font-semibold  ">Atte</h1>
        <div>
        <button @click="isOpen = !isOpen">
          <svg class="md:hidden h-6 w-6 fill-current" viewBox="0 0 24 24">
            <path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/>
            </svg>
          </button>
        </div>
        </div>
        <div :class="isOpen ? 'block' : 'hidden'" >
          <ul class="md:flex md:justify-end  text-white">
            <li class="border-b md:border-none"><a href="/" class="block px-8 py-2 my-4 hover:bg-gray-500 rounded">ホーム</a></li>
            <li class="border-b md:border-none"><a href="/attendance" class="block px-8 py-2 my-4 hover:bg-gray-500 rounded">日付一覧 </a></li>
            <li class="border-b border-opacity-0 md:border-none"><a href="/login" class="block px-8 py-2 my-4 hover:bg-gray-500 rounded">ログアウト</a></li>
          </ul>
      </div>
  </header>
</div>

<div>
  <!-- component -->
  <div class="container w-screen bg-white rounded-lg shadow-lg">
    <div class="md:h-full md:py-36 w-screen flex justify-center items-center">
      <div class="">
        <p>さんお疲れ様です！</p>
        <table class="">
          <tr>
            <th class="py-4 px-4"><button class="py-20 px-32 text-white text-2xl rounded-lg bg-red-500 font-bold	 shadow-lg block md:inline-block">勤務開始</button></th>
            <th class="py-4 px-4"><button class="py-20 px-32 text-white text-2xl rounded-lg bg-yellow-400 font-bold	 shadow-lg block md:inline-block">勤務終了</button></th>
          </tr>
          <tr>
            <th class="py-4 px-4"><button class="py-20 px-32 text-white text-2xl rounded-lg bg-purple-600 font-bold	 shadow-lg block md:inline-block">休憩開始</button></th>
            <th class="py-4 px-4"><button class="py-20 px-32 text-white text-2xl rounded-lg bg-green-400 font-bold	 shadow-lg block md:inline-block">休憩終了</button></th>
          </tr>
          </table>
      </div>
    </div>
  </div>
</div>

<script>
  const app = new Vue({
    el : '#app',
    data:{
      isOpen: false,
    }
  })
</script>
</body>
</html>