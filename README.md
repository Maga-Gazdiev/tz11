## Развертывание

### Установка зависимостей

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

4. Сгенерируйте ключ приложения:

    ```bash
    php artisan key:generate
    ```

5. Выполните миграции базы данных:

    ```bash
    php artisan migrate
    ```

### Запуск приложения

1. Запустите сервер разработки:

    ```bash
    php artisan serve
    ```

2. Откройте браузер и перейдите по адресу `http://localhost:8000`.

### Тестирование

1. Для запуска тестов используйте:

    ```bash
    vendor/bin/phpunit
    ```

2. Для проверки качества кода используйте:

    ```bash
    vendor/bin/phpcs --standard=PSR12 app/
    ```

### Настройка CI/CD

Этот проект использует GitHub Actions для CI/CD. При каждом коммите и пулл-реквесте запускаются тесты и проверки качества кода.

