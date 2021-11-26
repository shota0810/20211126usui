@extends('layouts.default')

<link rel="stylesheet" href="{{ asset('/css/index.css') }}">

@section('tittle','内容確認')

@section('content')
<form class="contact_form" action="/process" method="POST">
    @csrf
    <table>
        <tr>
            <th>お名前</th>
            <td>
                <div>{{ $inputs['first_name'] }}{{ $inputs['last_name'] }}</div>
                <input type="hidden" name="first_name" value="{{ $inputs['first_name'] }}">
                <input type="hidden" name="last_name" value="{{ $inputs['last_name'] }}">
                <input type="hidden" name="fullname" value="{{ $inputs['first_name'] }}　{{$inputs['last_name'] }}">
            </td>
        </tr>
        <tr>
            <th>性別</th>
            <td>
                @if($inputs['gender']==1)
                    <div>男性</div>
                @else
                    <div>女性</div>
                @endif
                <input type="hidden" name="gender" value="{{ $inputs['gender'] }}">
            </td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td>
                <div>{{ $inputs['email'] }}</div>
                <input type="hidden" name="email" value="{{ $inputs['email'] }}">
            </td>
        </tr>
        <tr>
            <th>郵便番号</th>
            <td>
                <div>{{ $inputs['zip'] }}</div>
                <input type="hidden" name="postcode" value="{{ $inputs['zip'] }}">
            </td>
        </tr>
        <tr>
            <th>住所</th>
            <td>
                <div>{{ $inputs['address'] }}</div>
                <input type="hidden" name="address" value="{{ $inputs['address'] }}">
            </td>
        </tr>
        <tr>
            <th>建物名</th>
            <td>
                <div>{{ $inputs['building_name'] }}</div>
                <input type="hidden" name="building_name" value="{{ $inputs['building_name'] }}">
            </td>
        </tr>
        <tr>
            <th>ご意見</th>
            <td>
            <div>{{ $inputs['opinion'] }}</div>
                <input type="hidden" name="opinion" value="{{ $inputs['opinion'] }}">
            </td>
        </tr>
    </table>
    <div class="submit-button">
        <button class="button" name="action" type="submit" value="submit">送信</button>
    </div>
    <div class="submit-button">
        <button class="link" name="action" type="submit" value="return">修正する</button>
    </div>
</form>
@endsection