@extends('layouts.address_app')

@section('content')
    <a class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded" href="{{ route('person.index') }}">一覧画面へ</a>

    <form action="{{ route('person.update', $person->id) }}" method="post">
        @csrf
        @method('PUT')
        <label class="form-label" for="last_name">姓</label>
        <input class="form-input" type="text" name="last_name" id="last_name" value="{{ old('last_name', $person->last_name) }}">
        <label class="form-label" for="first_name">名</label>
        <input class="form-input" type="text" name="first_name" id="first_name" value="{{ old('first_name', $person->first_name) }}">
        <label class="form-label" for="email_address">メールアドレス</label>
        <input class="form-input" type="email" name="email_address" id="email_address" value="{{ old('email_address', $person->email_address) }}">
        <label class="form-label" for="phone_number">電話番号</label>
        <input class="form-input" type="tel" name="phone_number" id="phone_number" value="{{ old('phone_number', $person->phone_number) }}">
        <label class="form-label" for="birth_date">生年月日</label>
        <input class="form-input" type="date" name="birth_date" id="birth_date" value="{{ old('birth_date', $person->birth_date) }}">
        <input class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded" type="submit" value="更新する">
    </form>
@endsection
