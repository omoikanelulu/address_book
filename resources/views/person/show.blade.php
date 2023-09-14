@extends('layouts.address_app')

@section('content')
    <a href="{{ route('person.index') }}">一覧画面へ</a>

    <ol>
        <label for="id">ID:</label>
        <li>{{ $person->id }}</li>
        <label for="last_name">姓:</label>
        <li>{{ $person->last_name }}</li>
        <label for="first_name">名:</label>
        <li>{{ $person->first_name }}</li>
        <label for="email_address">メールアドレス:</label>
        <li>{{ $person->email_address }}</li>
        <label for="phone_number">電話番号:</label>
        <li>{{ $person->phone_number }}</li>
        <label for="birth_date">生年月日:</label>
        <li>{{ $person->birth_date }}</li>
    </ol>
@endsection
