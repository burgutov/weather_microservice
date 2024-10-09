# Weather Microservice

## Описание

Микросервис погоды предоставляет API для получения актуальных данных о погоде в различных городах. Он разработан с использованием **Laravel** и **Docker**, что упрощает развертывание и управление зависимостями.

## Установка и запуск

### Предварительные требования

- Установленный [Docker](https://www.docker.com/get-started)
- Установленный [Docker Compose](https://docs.docker.com/compose/)

### Клонирование репозитория

Сначала клонируйте репозиторий на вашу локальную машину:

```bash
git clone https://github.com/burgutov/weather_microservice
cd weather_microservice
```
## Запуск проекта

1. **Соберите образы**:

    ```bash
    docker-compose build
    ```

2. **Запустите контейнеры**:

    ```bash
    docker-compose up -d
    ```

3. **Запустите миграции**:

```bash
docker-compose exec app php artisan migrate
 ```

4. **Запустите сидер**:

```bash
docker-compose exec app php artisan db:seed --class=CitiesTableSeeder
 ```


## Проверка API через cURL

Вы можете проверить работу API с помощью утилиты `curl`, которая позволяет выполнять HTTP-запросы из командной строки.

### Пример запроса

Чтобы получить данные о погоде для города с ID 1, выполните следующий команду в терминале:

```bash
curl -X GET http://localhost:8000/api/weather/1/
```

Если запущено сразу после загрузки seed, пожалуйста подождите минуту.

### Документация API
```bash
http://localhost:8000/api/documentation
```
### Тестирование
```bash
docker-compose exec app php artisan test
```