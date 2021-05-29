# 第一部 Chapter 3 / アプリケーションアーキテクチャ

## 対応表

- [トランザクションスクリプト例](app/Service/BookService.php)
- [依存関係が増えるコントローラ例](app/Http/Controllers/UserController.php)
- [アクションへ独立させた例](app/Http/Actions/UserIndexAction.php)
- [レスポンダの実装](app/Http/Responder/UserResponder.php)
- [コントローラクラスからデータベース操作を分離](app/Http/Controllers/Layered/UserController.php)
- [リポジトリのインターフェースを定義](app/Repository/UserRepositoryInterface.php)
- [リポジトリの実装例](app/Repository/UserRepository.php)
- [サービスクラスとリポジトリ利用例 | データベース操作を伴う実装をサービスクラスとして分離](app/Service/UserPurchaseService.php)

## Docker 

```bash
$ docker-compose build
$ docker-compose up -d
$ docker-compose exec -w /var/www/html php composer install
```
