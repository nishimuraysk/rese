# アプリケーション名
Rese（リーズ）
ある企業のグループ会社の飲食店予約サービス

◾️飲食店一覧ページ（/）
https://github.com/nishimuraysk/rese/assets/140567528/c5743449-40d7-4bea-a630-6d8263eccd80

◾️会員登録ページ（/register）
https://github.com/nishimuraysk/rese/assets/140567528/cbe191bf-a255-4ea3-a0a9-bf4f451a82e3

◾️サンクスページ（/thanks）
https://github.com/nishimuraysk/rese/assets/140567528/e47143e1-c0fd-4e8b-bc12-0329208517b0

◾️ログインページ（/login）
https://github.com/nishimuraysk/rese/assets/140567528/2263d673-331a-4bfe-a66f-ba8b68282710

◾️マイページ（/mypage）
https://github.com/nishimuraysk/rese/assets/140567528/abc90162-dfc4-47c3-ba00-fe788b8514c4

◾️飲食店詳細ページ（/detail/:shop_id）
https://github.com/nishimuraysk/rese/assets/140567528/2c67978f-0011-4efd-9c75-67d7849fd9bf

◾️予約完了ページ（/done）
https://github.com/nishimuraysk/rese/assets/140567528/488f71f5-e0d7-4798-abb9-2c52037050e4

## 作成した目的
制作の背景と目的：外部の飲食店予約サービスは手数料を取られるので自社で予約サービスを持ちたい。
制作の目標：初年度でのユーザー数10,000人達成

## アプリケーションURL
デプロイURL：未定
http://localhost/
http://localhost:8080/index.php
テスト用のユーザーデータは以下のファイルにあるのでログイン時に活用ください。
UsersTableSeeder.php

## 他のリポジトリ
https://github.com/nishimuraysk/rese

## 機能一覧
- 会員登録
- ログイン
- ログアウト
- ユーザー情報取得
- ユーザー飲食店お気に入り一覧取得
- ユーザー飲食店予約情報取得
- 飲食店一覧取得
- 飲食店詳細取得
- 飲食店お気に入り追加
- 飲食店お気に入り削除
- 飲食店予約情報追加
- 飲食店予約情報削除
- エリアで検索する
- ジャンルで検索する
- 店名で検索する

## 使用技術（実行環境）
- Laravel 10.31.0

## テーブル設計
https://github.com/nishimuraysk/rese/assets/140567528/efa90295-6c60-4a11-941d-b97f16446a5b
https://github.com/nishimuraysk/rese/assets/140567528/d000224e-676a-49ea-9bd9-b64e98570456

## ER図
https://github.com/nishimuraysk/rese/assets/140567528/dd74cffd-8914-49a9-b18b-93eaf5f7b7bf

# 環境構築
ターミナルでgit cloneして作成されたフォルダに移動して、下記の作業及びコマンドを実行してください。

・.env.exampleを.envにリネームして、DBの設定を行ってください
・DBはMySQLを使っているのでMySQLにDBを作ってください
・アプリケーションキーの初期化を行ってください

```
docker-compose up -d --build
docker-compose exec php bash
composer create-project "laravel/laravel=10.*" . --prefer-dist
composer require laravel/breeze --dev
php artisan breeze:install
php artisan migrate
npm install
npm run dev
docker-compose exec php bash
php artisan migrate
php artisan db:seed
```

## 他に記載することがあれば記述する
