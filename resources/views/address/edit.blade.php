@extends('layouts.address_app')

@section('content')
    <a href="{{ route('person.index') }}">一覧画面へ</a>

    <form action="{{ route('address.update', $person->address->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="country">国</label>
        <input type="text" name="country" id="country" value="{{ old('country', $person->country) }}">
        <label for="type">種類</label>
        <input type="text" name="type" id="type" value="{{ old('type', $person->type) }}">
        <label for="postal_code">郵便番号</label>
        <input type="text" name="postal_code" id="postal_code" value="{{ old('postal_code', $person->postal_code) }}">
        <label for="state">都道府県</label>
        <input type="text" name="state" id="state" value="{{ old('state', $person->state) }}">
        <label for="city">市町村</label>
        <input type="text" name="city" id="city" value="{{ old('city', $person->city) }}">
        <label for="street_address">その他</label>
        <input type="text" name="street_address" id="street_address" value="{{ old('street_address', $person->street_address) }}">
        <input type="submit" value="更新する">
    </form>
@endsection
