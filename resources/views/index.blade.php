@extends('layouts.default')

@section('tittle','お問い合わせ')

@section('content')
<form  id="form" class="contact_form" action="/confirm" method="POST">
    @csrf
    <table>
        <tr>
            <th>
                <label for="first_name">お名前<span class="red">※</span></label>
            </th>
            <td>
                <div class="flex">
                    <div>
                        <input id="first_name" class="inputbox" type="text" name="first_name" value="{{ old('first_name') }}">
                        @error('first_name') 
                        <div>{{$message}}</div>
                        @enderror
                        <div class="example">例)　山田</div>
                        <div id="first-name-error-message" class="red">入力してください</div>
                    </div>
                    <div>
                        <input id="last_name" class="inputbox" type="text" name="last_name" value="{{ old('last_name') }}">
                        @error('last_name') 
                        <div>{{$message}}</div>
                        @enderror
                        <div class="example">例)　太郎</div>
                        <div id="last-name-error-message" class="red">入力してください</div>
                    </div>
                </div>
            </td>
        </tr>

        <tr>
            <th>
                <label for="gender">性別<span class="red">※</span></label>
            </th>
            <td>
                <div class="radiobutton">
                    <input id="button-1" class="radio" type="radio" name="gender" value=1 {{ old('gender') == '1' ? 'checked' : 'checked' }}><label for="button-1">男性</label>
                    <input id="button-2" class="radio" type="radio" name="gender" value=2 {{ old('gender') == '2' ? 'checked' : '' }}><label for="button-2">女性</label>
                </div>
            </td>
        </tr>

        <tr>
            <th>
                <label for="email">メールアドレス<span class="red">※</span></label>
            </th>
            <td>
                <input id="email" class="inputbox" type="email" name="email" value="{{ old('email') }}">
                @error('email') 
                    <div>{{$message}}</div>
                @enderror
                <div class="example">例)　test@example.com</div>
                <div id="email-error-message" class="red">Emailの形式では無いようです。</div>
            </td>
        </tr>

        <tr>
            <th>
                <label for="postcode">郵便番号<span class="red">※</span></label>
            </th>
            <td>
                <div class="flex-gap">
                    <div>〒</div>
                    <div style="width: 100%;">
                        <input id="postcode" class="inputbox" type="text" name="zip" onKeyUp="AjaxZip3.zip2addr('zip', '', 'address', 'address');" oninput="value = onlyNumbers(value)" value="{{ old('zip') }}">
                        @error('zip') 
                        <div>{{$message}}</div>
                        @enderror
                        <div class="example">例)　123-4567</div>
                        <div id="postcode-error-message" class="red">「-(ハイフン)」込みの半角数字で入力してください。</div>
                    </div>
                </div>
            </td>
        </tr>

        <tr>
            <th>
                <label for="addess">住所<span class="red">※</span></label>
            </th>
            <td>
                <input id="address" class="inputbox" type="text" name="address" value="{{ old('address') }}">
                @error('address') 
                    <div>{{$message}}</div>
                @enderror
                <div class="example">例)　東京都渋谷区千駄ヶ谷1-2-3</div>
                <span id="address-error-message" class="red">入力してください。</span>
            </td>
        </tr>

        <tr>
            <th>
                <label for="building_name">建物名</label>
            </th>
            <td>
                <input id="building_name" class="inputbox" type="text" name="building_name" value="{{ old('building_name') }}">
                <div class="example">例)　千駄ヶ谷マンション101</div>
            </td>
        </tr>

        <tr>
            <th>
                <label for="opinion">ご意見</label><span class="red">※</span>
            </th>
            <td>
                <textarea id="opinion" class="inputbox" name="opinion">{{ old('opinion') }}</textarea>
                @error('opinion')
                    <div>{{$message}}</div>
                @enderror
                <div id="opinion-error-message" class="red">120文字以内で入力してください。</div>
            </td>
        </tr>
    </table>
    <div class="submit-button">
        <input id="btn" class='button' type="submit" name="submit" value="確認">
    </div>
</form>
<script src="{{ asset('/js/index.js') }}"></script>
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
@endsection