@extends('layouts.address_app')

@section('content')
    <a class="btn btn-primary mb-4" href="{{ route('person.index') }}">一覧画面へ</a>

    <form action="{{ route('person.store') }}" method="post">
        @csrf
        <div class="row mb-4">
            <div class="col-6">
                <label class="form-label col-6" for="last_name">姓</label>
                <input class="form-control col-6 rounded" type="text" name="last_name" id="last_name">
            </div>
            <div class="col-6">
                <label class="form-label col-6" for="first_name">名</label>
                <input class="form-control col-6 rounded" type="text" name="first_name" id="first_name">
            </div>
            <div class="col">
                <label class="form-label" for="email_address">メールアドレス</label>
                <input class="form-control rounded" type="email" name="email_address" id="email_address">
            </div>
            <div class="col">
                <label class="form-label" for="phone_number">電話番号</label>
                <input class="form-control rounded" type="tel" name="phone_number" id="phone_number">
            </div>
            <div class="col">
                <label class="form-label" for="birth_date">生年月日</label>
                <input class="form-control rounded" type="date" name="birth_date" id="birth_date">
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-4">
                <label class="form-label" for="country">国</label>
                <input class="form-control rounded" type="text" name="country" id="country">
            </div>
            <div class="col-4">
                <label class="form-label" for="type">種類</label>
                <input class="form-control rounded" type="text" name="type" id="type">
            </div>
            <div class="col-4">
                <label class="form-label" for="postal_code">郵便番号</label>
                <input class="form-control rounded" type="text" name="postal_code" id="postal_code">
            </div>
            <div class="col-4">
                <label class="form-label" for="postal_code">都道府県</label>
                <input class="form-control rounded" type="text" name="state" id="state">
            </div>
            <div class="col-4">
                <label class="form-label" for="postal_code">市町村</label>
                <input class="form-control rounded" type="text" name="city" id="city">
            </div>
            <div class="col-4">
                <label class="form-label" for="postal_code">その他</label>
                <input class="form-control rounded" type="text" name="street_address" id="street_address">
            </div>
        </div>

        {{-- ログイン中のユーザID --}}
        <input type="hidden" name="person_id" id="person_id" value="{{ auth()->id() }}">
        <input class="btn btn-primary bg-danger" type="submit" value="登録する">
    </form>
@endsection
