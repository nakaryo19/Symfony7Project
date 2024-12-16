# 環境構築手順
・環境資材をgitからコピー
```
```
・dockerビルド
```
docker-compose up --build -d
```
・appコンテナに接続
```
docker exec -it symfony7project_app_1 bash
```
・マイグレーション実行
```
php bin/console doctrine:migrations:migrate
```
## 補足
・DB接続のホスト側のポートを5433、コンテナ側を5422としています。
自身の環境に合わせてdocker-compose.ymlをカスタマイズください。

