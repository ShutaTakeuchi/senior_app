![icon](image/home-good-app-icon.png)

# アプリケーション名
HOME-GOOD
<br>
<br>

# アプリケーション概要
大分県別府市における高齢者の自宅生活をサポートするアプリケーションです。　
<br>　
<br>

# 作成した目的
「老人ホームや自宅訪問介護サービスの利用までは必要ないけど、  
1人暮らしの生活が少々困難であったり、急な体調不良を考えると不安がある。　   
それでも大切な自宅で生活を送りたい。」  
私はこのように考える高齢者の方々に１日でも多くの自宅生活を送っていただきたく、  
当アプリケーションを作成致しました。
<br>
<br>

# URL・QRコード
作品  
- [ポートフォリオ](http://18.182.174.136:8000)  
- [作品の説明動画]()  

<br>

アプリケーション内で使用しているAPI関連  
- [スプレッドシート](https://docs.google.com/spreadsheets/d/1FH7nkXPNeqa8ay_8IcEcMjADq8K8ibqQTBCCytZJYAY/edit?usp=sharing)
- LINE Messaging API のQRコード
    - 各種連絡受付  
    ![icon](image/line-api-qr-contact.png)
    - 配達業務関連  
    ![icon](image/line-api-qr-task.png)

<br>
<br>

# テスト用アカウント
お客様専用ページと管理・業務専用のページの２つがあります。  
どちらも予めフォーム内は入力済みに設定しております。  

- お客様ページ
    - お客様アカウント
        - メールアドレス：test@test.com
        - パスワード：password123
- 管理・業務ページ
    - 管理者アカウント
        - メールアドレス：admin@admin.com
        - パスワード：password123
    - 配達員アカウント
        - メールアドレス：haitatsu@haitatsu.com
        - パスワード：password123

<br>
<br>

# 使用技術
- PHP7.2
- Laravel5.8
- MySQL
- HTML5/CSS3
- Bootstrap4
- Apache
- Docker/Docker-compose
- AWS
    - VPC
    - EC2
- LINE Messaging API
- Google Sheets API
- ぐるなびAPI
- 楽天商品検索API

<br>

# 機能一覧
- ユーザー登録、ログイン機能
    - Auth機能
        - マルチ認証
- CRUD機能
    - Create
        - お客様側
            - ひとことを投稿
            - 商品注文
        - スタッフ側
            - スタッフ新規登録
    - Read
        - お客様側
            - 投稿一覧
            - 注文一覧
            - アカウント情報表示
        - スタッフ側
            - お客様、スタッフのアカウント一覧
            - 商品注文一覧
            - お客様アカウント検索
    - Update
        - お客様側
            - アカウント情報変更
        - スタッフ側
            - 商品状況の変更
            - お客様、スタッフのアカウント情報変更
    - Delete
        - お客様側
            - アカウント削除
        - スタッフ側
            - お客様、スタッフのアカウント削除
            - 注文商品の削除
- API使用
    - LINE Messaging API
        - お客様からの各種連絡の通知
        - 配達員のタスク完了時の通知
    - Google Sheets API
        - 配達員のタスク完了時にタスク履歴を記録
    - ぐるなびAPI
        - フードデリバリーサービス（ごはん）で店舗を検索
    - 楽天商品検索API
        - オンラインショッピング（おかいもの）で商品を検索

<br>

# アプリケーションでできること
## <span style="color: #FF3366;">フードデリバリーサービス</span>
- 別府市内のHOME-GOOD連携の飲食店の商品を注文できるデリバリーサービスです。

## <span style="color: #FF3366;">オンラインショッピングサービス</span>
- お客様は**欲しい商品を選択するだけ**といった難しい操作を省いた通販サービスです。

## <span style="color: #FF3366;">タクシーサービス</span> 
- 別府市の範囲内で利用が可能なHOME-GOODオリジナルのタクシーサービスです。

## <span style="color: #FF3366;">24時間連絡サービス</span>
- 緊急や救急時に毎日24時間、営業所と繋がる連絡サービスです。

<br>

# アプリケーションの運営イメージ
当アプリケーションの一般利用は実現できませんでしたが、  
以下のような運営の仕方をイメージして作成致しました。

<br>
中央の黄緑の建物の図はHOME-GOODの営業所を指しております。

![process](image/home-good-process.png)

<br>

### また当アプリケーションにおけるユーザーは３つに分類されます。
## <span style="color: #3366FF">お客様</span>
- 実際にHOME-GOODのサービスを利用します。
- お客様ページを使用します。

## <span style="color: #3366FF">配達員（HOME-GOODスタッフ）</span>
- 配達業務をメインとして担当し、さらにフードデリバリー注文の購入や、タクシー業務も従事します。
- 管理者ページを使用します。

## <span style="color: #3366FF">管理者（HOME-GOODスタッフ）</span>
- 通販サイトにて注文中の商品の購入や入荷管理、お客様の各種連絡に対応、営業所窓口受付など基本的に営業所駐在での業務を担当します。  
- 管理者ページを使用します。

![process](image/home-good-class.png)
