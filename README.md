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

### Запуск с использованием Docker
```bash
docker-compose up -d
docker-compose exec app php artisan migrate --seed
```

### Документация API
```bash
http://localhost:8000/api/documentation
```
### Тестирование
```bash
docker-compose exec app php artisan test
```