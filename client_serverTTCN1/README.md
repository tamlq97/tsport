## #Prerequisite Installed
- [Nginx](https://gist.github.com/nd3w/8017f2e0b8afb44188e733d2ec487deb)(Recommended) or Apache Webserver
- [PHP 7.4](https://gist.github.com/nd3w/8017f2e0b8afb44188e733d2ec487deb)
- [Composer](https://getcomposer.org/download/)
- [Git](https://git-scm.com/downloads)
## Install
This is the server backend **Laravel** provide **API** for Frontend is **VueJS** to call.
```
cd ttcn_laravel_vue/client_serverTTCN1
cp .env.example .env
```

Open `.env` file and update these variables to fit to you.

```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce_db
DB_USERNAME=root
DB_PASSWORD=
```

Add your [mailtrap](https://mailtrap.io/) info to testing mail
```
MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
```

And Run 
```
composer install
php artisan key:generate
php artisan jwt:secret
php artisan storage:link
```
Import **tsport.sql** file to your database. After that run `php artisan serve`

Run `php artisan queue:work` if you want to check mail after ordered.