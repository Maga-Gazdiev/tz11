## Развертывание

1. Клонируйте репозиторий:

    ```bash
    git clone git@github.com:Maga-Gazdiev/tz11.git
    cd tz11
    ```

2. Установите зависимости с помощью Composer:

    ```bash
    composer install
    ```

3. Создайте файл `.env` на основе `.env.example`:

    ```bash
    cp .env.example .env
    ```

4. Отредактируйте файл `.env` для настройки базы данных. Убедитесь, что у вас указаны правильные параметры подключения:

    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    ```

5. Сгенерируйте ключ приложения:

    ```bash
    php artisan key:generate
    ```

6. Выполните миграции базы данных:

    ```bash
    php artisan migrate
    ```

7. Запустите сервер разработки:

    ```bash
    php artisan serve
    ```

8. Откройте браузер и перейдите по адресу `http://localhost:8000`.

9. Для запуска тестов используйте:

    ```bash
    vendor/bin/phpunit
    ```

10. Для проверки качества кода используйте:

    ```bash
    vendor/bin/phpcs --standard=PSR12 app/
    ```

### Настройка CI/CD

Этот проект использует GitHub Actions для CI/CD. При каждом коммите и пулл-реквесте запускаются тесты и проверки качества кода.
