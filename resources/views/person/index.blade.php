@extends('layouts.address_app')

@section('content')
    <a href="{{ route('person.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
        登録画面へ
    </a>

    {{-- 操作の結果を表示する --}}
    @if (session('message'))
        <div class="bg-green-400 p-5 mt-5 rounded">
            <p>{{ session('message') }}</p>
        </div>
    @endif

    <table class="mx-auto mt-5 w-11/12 border">
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
            @foreach ($peoples as $person)
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
                        <a class="inline-block p-2 bg-blue-100 hover:bg-blue-300 rounded"
                            href="{{ route('person.show', $person->id) }}">詳細</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
