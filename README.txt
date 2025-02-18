    Init project:
composer install
docker exec 'docker_container_name' vendor/bin/phinx migrate -e development

Потрібно допрацювати маршрутизацію.

1. Папка View суто для дебагу.
2. Маршрутизація примітивна, потім її зміню. (src/config/router.php)
3. app на порті 9001:80, БД на "3308:3306", так-як маю ще кілька проектів.
4. Лишній слеш у URL на разі не зміг забрати, неправильна конфігурація app.conf (у .docker/php).