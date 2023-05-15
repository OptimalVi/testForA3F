# Тестовое приложение для A3F

## Требования
- Установленный и запущений докер
- Умение работать с git
- Открытый 80 порт

## Запуск
> `git clone git@github.com:OptimalVi/testForA3F.git`

> `cd testForA3F`

> `docker-compose up` 

> Проект доступен из браузера по localhost или адресу вашего сервера.

## Backend
Для проверки работы нужно на 80й порт отправить post запрос с url параметром
вернется json в формате: 
` tag: 1`

## Frontend
Достаточно открыть файл index.html в папке frontend

## Время 
Сильно усложнил Backend по этому заняло ~8ч
- Планирование + Docker 1:30;
- Backend 5h
- Frontend 1:30h