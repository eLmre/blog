## Запуск

```
git clone https://github.com/eLmre/blog.git
```
Скопировать и переименовать .env.example в .env и прописать настройки соединения с базой данных.
```
composer install
php artisan migrate
php artisan key:generate
php artisan db:seed
```
Логин и Пароль администратора
<i>admin@admin.com / password</i>
