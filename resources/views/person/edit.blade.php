@extends('layouts.address_app')

@section('content')
    <a href="{{ route('person.index') }}">一覧画面へ</a>

    <form action="{{ route('person.update', $person->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="last_name">姓</label>
        <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $person->last_name) }}">
        <label for="first_name">名</label>
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $person->first_name) }}">
        <label for="email_address">メールアドレス</label>
        <input type="email" name="email_address" id="email_address" value="{{ old('email_address', $person->email_address) }}">
        <label for="phone_number">電話番号</label>
        <input type="tel" name="phone_number" id="phone_number" value="{{ old('phone_number', $person->phone_number) }}">
        <label for="birth_date">生年月日</label>
        <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date', $person->birth_date) }}">
        <input type="submit" value="更新する">
    </form>
@endsection
