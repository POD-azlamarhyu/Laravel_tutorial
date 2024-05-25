<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Curl Command

`curl --request POST http://localhost/api/ -H 'Accept: application/json' -H 'Content-Type: application/json' -H 'Authorization: Bearer '`

### Auth

`curl --request POST http://localhost/api/auth/logout -H 'Accept: application/json' -H 'Content-Type: application/json' -H 'Authorization: Bearer '`

`curl --request POST http://localhost/api/auth/logout -H 'Accept: application/json' -H 'Content-Type: application/json' -H 'Authorization: Bearer '`

`curl --request POST http://localhost/api/auth/signup -H 'Accept: application/json' -H "Content-Type: application/json" -d '{"name":"","email":"","password":""}'`

`curl --request POST http://localhost/api/auth/login -H 'Accept: application/json' -H "Content-Type: application/json" -d '{"email":"","password":""}'`

`curl --request POST http://localhost/api/auth/login -H 'Accept: application/json' -H "Content-Type: application/json" -d '{"email":"","password":""}'`

### User info

`curl --request GET http://localhost/api/userinfo/index -H 'Accept: application/json' -H "Content-Type: application/json" -H 'Authorization: Bearer ' -d '{}'`

`curl --request GET http://localhost/api/userinfo/myuser -H 'Accept: application/json' -H "Content-Type: application/json" -H 'Authorization: Bearer ' -d '{}'`

`curl --request POST http://localhost/api/userinfo/create -H 'Accept: application/json' -H "Content-Type: application/json" -H 'Authorization: Bearer ' -d '{"account_name":"","icon":"","user_bio":"","account_id":""}'`

`curl --request DELETE http://localhost/api/userinfo/delete/4 -H 'Accept: application/json' -H "Content-Type: application/json" -H 'Authorization: Bearer ' -d '{"account_name":"","icon":,"user_bio":"","account_id":""}'`

`curl --request PUT http://localhost/api/userinfo/update/4 -H 'Accept: application/json' -H "Content-Type: application/json" -H 'Authorization: Bearer ' -d '{"account_name":"","icon":,"user_bio":"","account_id":""}'`

### Tweet

`curl --request GET http://localhost/api/tweet/index/ -H 'Accept: application/json' -H "Content-Type: application/json" -H 'Authorization: Bearer ' -d '{}'`

`curl --request GET http://localhost/api/tweet/detail/1/ -H 'Accept: application/json' -H "Content-Type: application/json" -H 'Authorization: Bearer ' -d '{}'`

`curl --request GET http://localhost/api/tweet/tweet_detail/1/ -H 'Accept: application/json' -H "Content-Type: application/json" -H 'Authorization: Bearer ' -d '{}'`


`curl --request POST http://localhost/api/tweet/post/ -H 'Accept: application/json' -H "Content-Type: application/json" -H 'Authorization: Bearer ' -d '{"content":""}'`

`curl --request POST http://localhost/api/tweet/post/ -H 'Authorization: Bearer ' -F "content=" -F "image_file=@/home/xxx.jpeg"`

`curl --request PUT http://localhost/api/tweet/update/3/ -H 'Accept: application/json' -H "Content-Type: application/json" -H 'Authorization: Bearer ' -d '{"content":""}'`

`curl --request DELETE http://localhost/api/tweet/delete/3/ -H 'Accept: application/json' -H "Content-Type: application/json" -H 'Authorization: Bearer ' -d '{}'`

`curl --request DELETE http://localhost/api/tweet/delete/6/ -H 'Accept: application/json' -H "Content-Type: application/json" -H 'Authorization: Bearer ' -d '{}'`

### Favorite

#### template

`curl --request GET http://localhost/api/favorit/tweet/tweet_prof -H 'Accept: application/json' -H "Content-Type: application/json" -H 'Authorization: Bearer ' -d '{}'`

`curl --request GET http://localhost/api/favorit/tweet/tweet_prof/favorite_number -H 'Accept: application/json' -H "Content-Type: application/json" -H 'Authorization: Bearer ' -d '{}'`


#### actual

`curl --request GET http://localhost/api/favorit/tweet/tweet_prof -H 'Accept: application/json' -H "Content-Type: application/json" -H 'Authorization: Bearer ' -d '{}'`

`curl --request GET http://localhost/api/favorit/tweet/tweet_prof/favorite_number -H 'Accept: application/json' -H "Content-Type: application/json" -H 'Authorization: Bearer ' -d '{}'`



## Bibbiography

## env

- [Laravel Sail(public)](https://laravel.com/docs/11.x/sail)
- [【Laravel入門】Laravel sailとは？Laravel sailで環境構築までしてみる](https://qiita.com/takegons/items/644dd262801244af769f)

### command

- [Laravel の make:model をいい感じに使いたい](https://qiita.com/niisan-tokyo/items/9c799989cb535489f201)
- [【Laravel】「 php artisan make:model 」コマンドのオプション解説](https://qiita.com/Masahiro111/items/f6201b1e89fb6cfddc09)
- [Artisanコマンド（早見表）](https://laraweb.net/environment/899/)
- [よく使うLaravel artisan コマンド](https://zenn.dev/hdmt/scraps/e20979a31a73da)
- [Laravel artisan コマンド](https://qiita.com/ryocha12/items/2c15ad2377c36dfcf408)

### Model

- [Database: Getting Started](https://laravel.com/docs/11.x/database)
- [Database: Query Builder](https://laravel.com/docs/11.x/queries)
- [Database: Migrations](https://laravel.com/docs/11.x/migrations)
- [Eloquent: Getting Started](https://laravel.com/docs/11.x/eloquent)
- [Eloquent: Relationships](https://laravel.com/docs/11.x/eloquent-relationships)
- [Eloquent: Factories](https://laravel.com/docs/11.x/eloquent-factories)
- [Database: Seeding](https://laravel.com/docs/11.x/seeding)
- [【DB設計】DM機能実装のためのDB設計で大苦戦した初心者の話](https://qiita.com/Yuzaburo/items/22435b470688eedb4530)
- [Laravel Eloquentのパフォーマンスを上げるために](https://zenn.dev/yum3/articles/t_laravel_eloquent_performance)
- [【Laravel】Eloquentで多対多のリレーションを使い倒す](https://qiita.com/fujita-goq/items/afd4307e90daf95c4f14)
- [酷すぎる自分のSQL（Laravel query builder）をリファクタした。](https://zenn.dev/kome471/articles/d69a1b09fc86c5)

### View

- [View](https://laravel.com/docs/11.x/views)
- [HTTP Reponses](https://laravel.com/docs/11.x/responses)
- [Laravelでログイン画面までを作る(CRUD）](https://qiita.com/EasyCoder/items/150f20a8b5270f1e7992)
- [はじめてのLaravelアプリケーションガイド](https://qiita.com/Fendo181/items/dece727ea402552fee19)
- [Laravel+React でWebアプリを構築する [使用技術: Laravel Sail, Laravel Breeze, Inertia, TailwindCss, Vite]](https://qiita.com/Sho-taro/items/820e4117c5b5f4c6717f)

### Controllers

- [Controllers](https://laravel.com/docs/11.x/controllers)
- [Laravel基本的な流れ④ ControllerとRoutingの基本を抑えよう。](https://qiita.com/taisuke-m/items/e188abe6c63f0f9bb051)
- [laravelのコントローラの書き方](https://zenn.dev/mo_ri_regen/articles/laravel-contoller)
- [【Laravel】コントローラーとは？作成や編集方法を実例で解説。](https://qiita.com/shizen-shin/items/2ddb0748cdca1867440c)


### Routing

- [Routing](https://laravel.com/docs/11.x/routing)
