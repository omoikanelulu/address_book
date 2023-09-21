# try-catchでエラーハンドリングする

## try-catchとは？

try-catch ブロックは、プログラムの一部が例外（エラー）をスローする可能性がある場合に、その例外を「キャッチ」して適切に処理するための構文です。

try ブロック内で例外が発生した場合、プログラムの実行は直ちに対応する catch ブロックに移ります。

## 基本的な使い方

```php
try {
    // 例外が発生する可能性があるコード
    // 例: ファイルのオープン、データベースのクエリ実行など
} catch (ExceptionType1 $e) {
    // ExceptionType1 がスローされた場合の処理
} catch (ExceptionType2 $e) {
    // ExceptionType2 がスローされた場合の処理
} finally {
    // 例外の発生有無に関わらず、最後に必ず実行される処理
}
```

## 使用例

```php
public function store(StorePersonRequest $request)
{
    try {
        // トランザクション処理開始
        DB::beginTransaction();

        // $personDataに、リクエストの中から必要なデータを集める
        $personData = $request->only('first_name', 'last_name', 'email_address', 'phone_number', 'birth_date');
        // レコードの挿入処理
        Person::create($personData);

        $addressData = $request->only('country', 'type', 'postal_code', 'state', 'city', 'street_address');
        $addressData['person_id'] = auth()->id();
        Address::create($addressData);

        // トランザクションをコミット
        DB::commit();
    } catch (\Exception $e) {
        // トランザクションをロールバック
        DB::rollBack();
        return redirect()->route('person.error')->with('message', '登録に失敗しました');
    }
    return redirect()->route('person.index')->with('message', '登録しました');
}
``````
