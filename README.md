# laravel_with_docker
dockerを使用したLaravelの開発環境　apache + php + mysql + phpmyadmin

使用する際の注意点
＊000-default.confにて、
DocumentRoot /var/www/html/Laravelの名前/public
<Directory /var/www/html/Laravelの名前/public>
の箇所で、「Laravelの名前」をlaravelをインストールする際の名前に変更しておくこと。

＊docker-compose.ymlにて、
MYSQL_DATABASE: データベース名
の箇所で、「データベース名」を任意のデータベース名にすること。（今後、mysqlのデータベース名になります）

*laravelインストールの際
コンテナを立ち上げたら、
docker exec -it laravel_app bash
でコンテナに入り、
/var/www/htmlがカレントディレクトリなことを確認したら、
composer create-project "laravel/laravel=~5.0" --prefer-dist laravelapp(任意の名前）
でlaravelをインストールをする。
laravelは５系を使用すること。
また、000-default.confで決めたディレクトリ名と任意の名前を同じにすること。

＊laravelの設定
　＊.envの編集
  DB_CONNECTION=mysql
  DB_HOST=laravel_db　#docker-composeのmysqlのコンテナ名を指定
  DB_PORT=3306
  DB_DATABASE=laraveldb　#docker-compose.ymlのmysqlで指定したデータベース名
  DB_USERNAME=dbuser　#docker-composeのmysql.ymlで指定したユーザ名名
  DB_PASSWORD=dbpass　#docker-composeのmysql.ymlで指定したパスワード名
  
  ＊storageとbootstrap/cacheの権限を変更する。
  コンテナ内のlaravelのプロジェクト内に入ったら、
  chmod -R 777 storage
  chmod -R 777 bootstrap/cache
  をコマンド入力する。
  
  ＊AppServiceProvider.phpの編集（文字コードエラーを防ぐ）
  src/laravelapp/app/Providers/AppServiceProvider.phpを開いて、
  use Illuminate\Support\Facades\Schema;　の追加と、
  public function boot()
    {
        //
        Schema::defaultStringLength(191);
    } 
  この関数に一行追加する。
  
  ＊config/app.phpの編集
  'timezone' => 'Asia/Tokyo',
  'locale' => 'ja',
  に変更する。

  ＊Authの日本語化
  php -r "copy('https://readouble.com/laravel/5.8/ja/install-ja-lang-files.php', 'install-ja-lang.php');"
  php -f install-ja-lang.php
  php -r "unlink('install-ja-lang.php');"