@extends('layouts.layouts')



@if(Auth::check())
<p>ログイン中のユーザー:{{$user->name.'メール'.$user->email.''}}
</p>
@else
<p>ログインしていません。(<a href="/login">ログイン</a>|
<a href="/register">登録</a>)</p>
@endif
