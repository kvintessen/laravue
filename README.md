## Как развернуть проект

1) Перейти в каталог .docker, создать файл .env по шаблону
2) Запустить команду `` docker-compose up -d --build ``
3) В /etc/hosts добавить следующее: ``127.0.0.1       laravue.local``
4) Перейти в корень проекта создать файл .env по шаблону
5) Зайти в контейнер laravue_app при помощи команды 
`` docker exec -ti laravue_app bash ``
6) Установить зависимости для composer: `` composer install ``
7) Установить зависимости для node: `` npm install ``
8) Собрать фронт: `` npm run production ``
9) Если ругается на права, то при помощи следующей команде
дать права на права, находясь в директории с проектом:
   `` sudo chmod -R 777 laravue/ ``
10) Зайти в контейнер laravue_app и накатить миграции:
`` php artisan migrate --seed ``
