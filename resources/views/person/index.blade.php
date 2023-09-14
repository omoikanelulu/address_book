@extends('layouts.address_app')

@section('content')
    <a href="{{ route('person.create') }}">登録画面へ</a>

    {{-- 操作の結果を表示する --}}
    @if (session('message'))
        <div class="bg-green-400 p-5">
            <p>{{ session('message') }}</p>
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>姓</th>
                <th>名</th>
                <th>メールアドレス</th>
                <th>電話番号</th>
                <th>生年月日</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peoples as $person)
                <tr>
                    {{-- 取得したデータの表示 --}}
                    <td>{{ $person->id }}</td>
                    <td>{{ $person->last_name }}</td>
                    <td>{{ $person->first_name }}</td>
                    <td>{{ $person->email_address }}</td>
                    <td>{{ $person->phone_number }}</td>
                    <td>{{ $person->birth_date }}</td>

                    {{-- 操作ボタン群 --}}
                    <td>
                        <a href="{{ route('person.show', $person->id) }}">詳細</a>
                        <a href="{{ route('person.edit', $person->id) }}">編集</a>
                        <form action="{{ route('person.destroy', $person->id) }}" method="post">
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
