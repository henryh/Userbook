## About project

![Image alt](https://github.com/henryh/userbook/raw/master/screen.png)

Based on Laravel.

Sample Laravel project. List of users with authorization with search by users and bookmarks.

Model of users. I added a custom search and scope method for sorting and a belongsToMany relationship with the Favorite model.
https://github.com/henryh/userbook/blob/master/app/User.php

I added the seeder with a user generate method.
https://github.com/henryh/userbook/blob/master/database/seeds/UserSeeder.php

A seeder structure store in the factory (fake data, via fzaninotto/faker library):
https://github.com/henryh/userbook/blob/master/database/factories/UserFactory.php
The factory can be used for unit tests.

The Favorite model with minimal code:
https://github.com/henryh/userbook/blob/master/app/Favourite.php

Migration for the Favorite model:
https://github.com/henryh/userbook/blob/master/database/migrations/2019_07_18_162847_create_favourites_table.php

The frontend side made on the standard Bootstrap solution:
https://github.com/henryh/userbook/blob/master/resources/views/user/index.blade.php

The user page controller with basic actions:
https://github.com/henryh/userbook/blob/master/app/Http/Controllers/UserController.php

The main routing is here:
https://github.com/henryh/userbook/blob/master/routes/web.php

## Intallation
1. Clone project
2. Create the .env file from .env.example
3. Run composer update
4. Run artisan db migration
5. Run artisan db seeder
6. Open the application and register your own account to log in.

## More

[Project author](https://github.com/henryh).

[Laravel documentation](https://laravel.com/docs/contributions).

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
