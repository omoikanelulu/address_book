@extends('layouts.address_app')

@section('content')
    <a href="{{ route('person.index') }}">一覧画面へ</a>

    <form action="{{ route('person.store') }}" method="post">
        @csrf
        <label for="last_name">姓</label>
        <input type="text" name="last_name" id="last_name">
        <label for="first_name">名</label>
        <input type="text" name="first_name" id="first_name">
        <label for="email_address">メールアドレス</label>
        <input type="email" name="email_address" id="email_address">
        <label for="phone_number">電話番号</label>
        <input type="tel" name="phone_number" id="phone_number">
        <label for="birth_date">生年月日</label>
        <input type="date" name="birth_date" id="birth_date">
        <input type="submit" value="登録する">
    </form>
@endsection
