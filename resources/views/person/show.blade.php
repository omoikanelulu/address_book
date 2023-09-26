@extends('layouts.address_app')

@section('content')
    <a class="btn btn-primary" href="{{ route('person.index') }}">一覧画面へ</a>

    <h3 class="fs-3 my-3">ユーザ情報</h3>

    <table class="mx-auto my-5 w-11/12 border">
        <thead>
            <tr class="bg-gray-500 text-white">
                <th class="text-left">ID</th>
                <th class="text-left">姓</th>
                <th class="text-left">名</th>
                <th class="text-left">メールアドレス</th>
                <th class="text-left">電話番号</th>
                <th class="text-left">生年月日</th>
                <th class="text-left">操作</th>
            </tr>
        </thead>
        <tbody>
            <tr class="hover:bg-green-200">
                {{-- 取得したデータの表示 --}}
                <td>{{ $person->id }}</td>
                <td>{{ $person->last_name }}</td>
                <td>{{ $person->first_name }}</td>
                <td>{{ $person->email_address }}</td>
                <td>{{ $person->phone_number }}</td>
                <td>{{ $person->birth_date }}</td>

                {{-- 操作ボタン群 --}}
                <td>
                    <a class="inline-block p-2 bg-yellow-100 hover:bg-yellow-300 rounded"
                        href="{{ route('person.edit', $person->id) }}">編集</a>
                    <form class="inline-block p-2 bg-red-100 hover:bg-red-300 rounded"
                        action="{{ route('person.destroy', $person->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="削除">
                    </form>
                </td>
            </tr>
        </tbody>
    </table>

    <h3 class="fs-3 my-3">アドレス情報</h3>

    <table class="mx-auto my-5 w-11/12 border">
        <thead>
            <tr class="bg-gray-500 text-white">
                <th class="text-left">国</th>
                <th class="text-left">種類</th>
                <th class="text-left">郵便番号</th>
                <th class="text-left">都道府県</th>
                <th class="text-left">市町村</th>
                <th class="text-left">その他</th>
                <th class="text-left">操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($person->address as $address)
                <tr class="hover:bg-green-200">
                    {{-- 取得したデータの表示 --}}
                    <td>{{ $address->country }}</td>
                    <td>{{ $address->type }}</td>
                    <td>{{ $address->postal_code }}</td>
                    <td>{{ $address->state }}</td>
                    <td>{{ $address->city }}</td>
                    <td>{{ $address->street_address }}</td>

                    {{-- 操作ボタン群 --}}
                    <td>
                        <a class="inline-block p-2 bg-yellow-100 hover:bg-yellow-300 rounded"
                            href="{{ route('address.edit', $address->id) }}">編集</a>
                        <form class="inline-block p-2 bg-red-100 hover:bg-red-300 rounded"
                            action="{{ route('address.destroy', $address->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="削除">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
