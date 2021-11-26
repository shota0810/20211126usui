<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/manegement.css') }}">
    <title>COACHTECH</title>
</head>
<body>
<!-- 検索 -->
<div class="container">
    <h1 class="tittle">管理システム</h1>
    <div class="find">
        <div class="form">
            <form action="/find" method="GET">
                @csrf
                <div class="flex">
                    <div class="input-name">
                        <label for="name"><span class="input-tittle">お名前</span></label>
                        <input id="name" class="input" type="text" name="name" value="{{$name}}">
                    </div>
                    <div class="input-gender">
                        <span class="input-tittle half">性別</span>
                        <input id="button-1" class="radio" type="radio" name="gender" value="" checked><label for="button-1">全て</label>
                        <input id="button-2" class="radio" type="radio" name="gender" value=1><label for="button-2">男性</label>
                        <input id="button-3" class="radio" type="radio" name="gender" value=2><label for="button-3">女性</label>
                    </div>
                </div>
                <div class="input-date">
                    <label for="date"><span class="input-tittle">登録日</span></label>
                    <input id="date" class="input" type="date" name="date1" value="{{$date1}}">
                    　〜　
                    <input class="input" type="date" name="date2" value="{{$date2}}">
                </div>
                <div class="input-email">
                    <label for="email"><span class="input-tittle">メールアドレス</span></label>
                    <input id="email" class="input" type="text" name="email" value="{{$email}}">
                </div>
                <div class="center">
                    <input class="button" type="submit" value="検索">
                </div>
                <div class="center">
                    <a class="link" href="{{ url('/manegement') }}">リセット</a>
                </div>
            </form>
        </div>
    </div>
    <div class="content">
        <table>
        {{ $items->links() }}
            <tr>
                <th class="id">ID</th>
                <th class="name">お名前</th>
                <th class="gender">性別</th>
                <th class="email">メールアドレス</th>
                <th class="opinion">ご意見</th>
                <th class="delete"></th>
            </tr>
            @foreach ($items as $item)
            <tr>
                <td class="id">
                    {{$item->id}}
                </td>
                <td clas="name">
                    {{$item->fullname}}
                </td>
                @if($item->gender == 1)
                <td class="gender">男性</td>
                @else
                <td class="gender">女性</td>
                @endif
                <td class="email">
                    {{$item->email}}
                </td>
                <td class="opinion">
                    <div class="text">
                    {{Str::limit($item->opinion,50)}}
                    </div>
                    <div class="fukidashi">
                    {{$item->opinion}}
                    </div>
                <td class=delete>
                    <form class="delete" action="/delete" method="POST">
                    @csrf
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <button class="button-delete" type="submit">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
</body>