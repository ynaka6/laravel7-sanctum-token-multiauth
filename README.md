<p align="center"><img src="https://camo.githubusercontent.com/4fdba9cc966adba5b42efa89a471464066f9b184/68747470733a2f2f6c61726176656c2e636f6d2f6173736574732f696d672f636f6d706f6e656e74732f6c6f676f2d73616e6374756d2e737667" width="400"></p>

## 📝 About

本リポジトリは、[Laravel Sanctum](https://laravel.com/docs/7.x/sanctum)のサンプル実装です。
APIトークンを利用した認証を考慮しつつ、Multi Authを実装しています。

※ セッション認証は別途調査する予定

## 📝 認証について

`App/User`、`App/Admin`の複数Modelで、Sanctumを利用し認証します。  
データについては事前にFactoryを利用し登録しています。  

- ログイン処理
- ログインユーザーの取得

を中心に実装しています。

## 📝 APIリクエスト

| URL  |説明  |
|---|---|
|`/api/login`  |UserログインAPI  |
|`/api/me`  |ログインユーザー取得API  |
|`/admin/api/login`  |AdminログインAPI  |
|`/admin/api/me`  |ログイン管理ユーザー取得API  |

### UserログインAPI

![/api/login - UserログインAPI](https://github.com/ynaka6/laravel7-sanctum-token/blob/master/screenshots/api_login.png)

```
curl --request POST \
  --url http://127.0.0.1:8000/api/login \
  --header 'accept: application/json' \
  --header 'content-type: application/json' \
  --data '{
	"email": "alf38@example.org",
	"password": "password"
}'
```

### ログインユーザー取得API

![/api/me - ログインユーザー取得API](https://github.com/ynaka6/laravel7-sanctum-token/blob/master/screenshots/api_me.png)

```
curl --request GET \
  --url http://localhost:8000/api/me \
  --header 'accept: application/json' \
  --header 'authorization: Bearer 6|oW3GIXpw48kcfAc1FcqA4gm4zOBFfVgNVGdMCqIImFMzoaEmTqSY4fsOFNxXymPnXPFXU5mfMYg7pMI7'
```

### AdminログインAPI

![/admin/api/login - AdminログインAPI](https://github.com/ynaka6/laravel7-sanctum-token/blob/master/screenshots/admin_api_login.png)

```
curl --request POST \
  --url http://127.0.0.1:8000/admin/api/login \
  --header 'accept: application/json' \
  --header 'content-type: application/json' \
  --data '{
	"email": "stokes.edgardo@example.net",
	"password": "password"
}'
```

### ログイン管理ユーザー取得API

![/admin/api/me - ログイン管理ユーザー取得API](https://github.com/ynaka6/laravel7-sanctum-token/blob/master/screenshots/admin_api_me.png)

```
curl --request GET \
  --url http://127.0.0.1:8000/admin/api/me \
  --header 'accept: application/json' \
  --header 'authorization: Bearer 4|dbtGtsoXAyE7VH1yaIpvDsI3F2UqelBl2YkOI8j17xvqCgfU5k4kk9D37OhlBpTur2uJUcttwCGSFV1U'
```


## Tools
- [Insomnia](https://insomnia.rest/) : HTTPクライアント

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
