# Laravel/Jetstream環境で、新規プロジェクトを作成する覚書

### npmの通信をIPv4で行うよう、システムの設定を変更
```
sudo sysctl -w net.ipv6.conf.all.disable_ipv6=1
sudo sysctl -w net.ipv6.conf.default.disable_ipv6=1
```

### Laravelプロジェクトを作成
```
composer create-project --prefer-dist laravel/laravel address_book
```

### 作成したプロジェクトへ移動
```
cd address_book/
```

### Jetstreamを導入
```
composer require laravel/jetstream:^3.0
```

### Livewireを導入
```
php artisan jetstream:install livewire
```

### composer.jsonに記述のあるcomposerパッケージをインストール
```
composer install
```

### package.jsonに記述のあるnpmパッケージをインストール
```
npm install
```

### debugbarの導入
```
composer require barryvdh/laravel-debugbar --dev
```

### MySQLを起動後、データベースを作成する
MySQLにログインする
パスワードを設定している場合は -p password も続けて入力する
```
mysql -u root
```

### データベースを作成するクエリ
```
CREATE DATABASE address_book;
```

### ログアウト quitでも可能
```
exit
```

### マイグレーションを実行
```
php artisan migrate
```

ここまでで、環境の準備完了。