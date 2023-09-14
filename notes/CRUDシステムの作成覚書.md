# 簡単なCRUDシステムを作成する手順覚書

## モデル、コントローラ、ルーティング

### モデルの作成

-a オプションを付け、諸々のファイルもまとめて作成

```bash
php artisan make:model Address -a
```

### モデルにプロパティを設定

$fillable に設定したものだけが、操作が許されるフィールドになる

```php
protected $fillable [
    'first_name',
    'last_name',
    'email_address',
    'phone_number',
    'birth_date',
];
```

### マイグレーションファイルに記述

```php
public function up()
{
    Schema::create('people', function (Blueprint $table) {
        $table->id();
        $table->string('first_name')->comment('名');
        $table->string('last_name')->comment('性');
        $table->string('email_address')->unique()->comment('メールアドレス');
        $table->string('phone_number')->unique()->comment('電話番号');
        $table->date('birth_date')->comment('生年月日');
        $table->timestamps();
    });
}
```

### マイグレーションを実行

```bash
php artisan migrate
```

### コントローラの作成

--resource オプションを付けることで、リソースコントローラとして作成される

モデルの作成時に -a オプションを使用した場合、コントローラは既に作成されている

```bash
php artisan make:controller PersonController --resource
```

### ルーティングの記述

web.phpにコントローラを登録する

```php
use App\Http\Controllers\PersonController;

Route::resource('person', PersonController::class);
```

## コントローラメソッドの記述

### 一覧表示（index）

```php
public function index()
{
    $peoples = Person::all();
    return view('person.index', compact('peoples'));
}
```

### 新規作成（create）

```php
public function create()
{
    return view('person.create');
}
```

### 登録処理（store）

```php
public function store(StorePersonRequest $request)
{
    Person::create($request->all());
    return redirect()->route('person.index')->with('message', '登録しました');
}
```

### 詳細表示（show）

```php
public function show($id)
{
    $person = Person::findOrFail($id);
    return view('person.show', compact('person'));
}
```

### 編集画面（edit）

```php
public function edit($id)
{
    $person = Person::findOrFail($id);
    return view('person.edit', compact('person'));
}
```

### 更新処理（update）

```php
public function update(UpdatePersonRequest $request, $id)
{
    $person = Person::findOrFail($id);
    $person->update($request->all());
    return redirect()->route('person.index')->with('message', '更新しました');
}
```

### 削除処理（destroy）

```php
public function destroy($id)
{
    $person = Person::findOrFail($id);
    $person->delete();
    return redirect()->route('person.index')->with('message', '削除しました');
}
```

## Viewファイルの作成例

### index.blade.php

```php
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
```

- route()の第二引数に、取得したレコードのIDを入れる
- destroyのアクションへは、formタグを通っていく

### show.blade.php

```php
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
```

### create.blade.php

```php
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
```

### edit.blade.php

```php
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
```

- 更新処理には@method('PUT')もしくは('PATCH')が必要

- old()の第一引数は、直前に入力した値の属性名、第二引数は直前のデータがない場合に表示する値を記述する

- createとeditは、ほぼ同じ画面構成なので、ひとつの画面でどちらにも使えるようにする方法もある
