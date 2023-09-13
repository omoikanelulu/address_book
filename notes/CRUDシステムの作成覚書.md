# 簡単なCRUDシステムを作成する手順覚書

## モデルの作成

-aオプションを付け、諸々のファイルもまとめて作成

```bash
php artisan make:model Address -a
```

## モデルにプロパティを設定

$fillable に設定したものだけ、操作が許されるフィールドになる

```php
protected $fillable [
    'first_name',
    'last_name',
    'email_address',
    'phone_number',
    'birth_date',
];
```
