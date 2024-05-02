Проект "Astronomy"
Описание
Проект "Astronomy" разработан для сайта kvartsiem.ru. Этот проект представляет собой веб-приложение, разработанное с использованием фреймворка Laravel, объединяющее функциональность парсинга новостей, возможность авторизации пользователей, а также административную панель для управления новостями.

Особенности
Парсер новостей: Реализован парсер для получения новостей с внешнего ресурса и последующего их добавления в базу данных проекта.
Авторизация и комментарии: Реализована система аутентификации пользователей с возможностью оставлять комментарии под новостями.
Панель администратора: Разработана административная панель для управления новостями, включающая возможности удаления и редактирования новостей.
Лайки с помощью AJAX: Для обеспечения удобства пользователей реализован механизм добавления лайков к записям с использованием AJAX.
Требования
PHP 8.0.3
Composer
MySQL
Веб-сервер (например, Apache или Nginx)

Установка
После настройки сервера, базы данных,php (Указать данные в .env для базы данных)
Обновить зависимости: composer update
Нужно запустить команду в терминале php artisan migrate --seed (либо создать роут на выполнение данной команды)
Зайти в админку и запустить парсер 
