# Свадебный сайт
Полноценный сайт для представления информации о свадебном дне и хранения воспоминаний долгие годы спустя. 

Демо версия для Геральта: [ссылка](http://свадьба-гральта.кусок-пирога.рф) (без доступа в панель управления)

## Функционал
- Счётчик времени до свадьбы и после свадьбы
- Преветственный слова молодёжонов  
- Расписание свадебного дня со временем, картой и описанием
- План рассадки
- Красивый таймлайн с историей отношений
- Информация о свадебных специалистах
- Галерея с фото и видео. Доступ к альбому по ключу, регистрация не требуется!

## Панель управления
- Настройка любых изображений и текстовых блоков на сайте
- Настройка расписания свадебного дня, истории отношений, специалистов, галереи

## Установка
1. `$ cd wedding-website` - зайдите в каталог с сайтом
2. `$ composer install` - установите требуемые библиотеки
3. В файле `./models/User.php` устаните логин/пароль администратора:
```php
private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ]
    ];
```
4. Профит!
