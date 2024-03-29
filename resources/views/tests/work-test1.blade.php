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
            <li class="border-b md:border-none"><a href="/logout" class="block px-8 py-2 my-4 hover:bg-gray-500 rounded">ログアウト</a></li>
            
            </form>
            </a></li>
          </ul>
  </header>
</div>




<!-- component -->
<div class="container">
  @if(Auth::check())
  <p></p>
    @else
    <p>ログインしていません。(<a href="/login">ログイン</a>|
    <a href="/register">登録</a>)</p>
    @endif
    <div class="md:h-full md:py-36 w-screen flex justify-center items-center">

<div>
      <div class="">
        <p class="my-8 font-bold text-3xl text-gray-600">毎日をHappyに！</p>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
        <table class="">
          <!-- 勤務開始 -->
          <form action="/start" method="POST">
          @csrf
          @error('name')
          <p>
            出勤済みです
          </p>
          @enderror
            <tr>
              <th class="py-4 px-4">
                @if(empty($item))
                <input type="hidden" name="user_id" value="1">
                <input type="hidden" name="date" value= "date">
                  <button class="py-20 px-32 text-white text-2xl rounded-lg bg-red-500 font-bold	 shadow-lg block md:inline-block">勤務開始</button>
                @else(!empty($item))
                  <button disabled class="py-20 px-32 text-white text-2xl rounded-lg bg-red-200 font-bold	 shadow-lg block md:inline-block">勤務開始</button>
                @endif

              </th>
              </form>
              <!-- 勤務終了 -->
              
              <form action="/thanks" method="POST">
              @csrf
              <th class="py-4 px-4">
                @if(!empty($item))
                <input type="hidden" name="user_id" value="1">
                <button>
                  <input type="submit" value="勤務終了" class="py-20 px-32 text-white text-2xl rounded-lg bg-yellow-400 font-bold	 shadow-lg block md:inline-block"></button>
                  @else(empty($item))
                  <button disabled class="py-20 px-32 text-white text-2xl rounded-lg bg-yellow-200 font-bold	 shadow-lg block md:inline-block">勤務終了</button>
                @endif

              </th>
            </tr>
          </form>
          <!-- 休憩開始 -->
          <form action="/rest_start" method="POST">
          @csrf
          <tr>
            <th class="py-4 px-4">
              @if(empty($rest))
              <input type="hidden" name="user_id" value="1">
              <button>
                <input type="submit" value="休憩開始" class="py-20 px-32 text-white text-2xl rounded-lg bg-purple-600 font-bold	 shadow-lg block md:inline-block"></button>
                <!-- 2回目押した時の反応を作る-->
                @else(!empty($rest))
                <button disabled class="py-20 px-32 text-white text-2xl rounded-lg bg-purple-200 font-bold	 shadow-lg block md:inline-block">休憩開始</button>
                  @endif
              </th>
                </form>
            <!-- 休憩終了 -->
          <form action="/breaks_end" method="POST">
            @csrf
              <th class="py-4 px-4">
                @if(!empty($rest))
                <input type="hidden" name="user_id" value="1">
                <button>
                  <input type="submit" value="休憩終了" class="py-20 px-32 text-white text-2xl rounded-lg bg-green-400 font-bold	 shadow-lg block md:inline-block"></button>
                  @else(empty($rest))
                <button disabled class="py-20 px-32 text-white text-2xl rounded-lg bg-green-200 font-bold	 shadow-lg block md:inline-block">休憩終了</button>
                  @endif
                </th>
          </tr>
        </form>
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