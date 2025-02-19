    Init project:
composer install
docker exec 'docker_container_name' vendor/bin/phinx migrate -e development

http://localhost:9003 - homePage не прописаний

1. Папка View суто для дебагу.
2. Маршрутизація примітивна, потім її зміню. (src/config/router.php)
3. app на порті 9002:80, БД на "3309:3306", так-як маю ще кілька проектів.
4. Лишній слеш у URL на разі не зміг забрати, неправильна конфігурація app.conf (у .docker/php).
