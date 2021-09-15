install:
	composer install

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

gendiff:
	./bin/gendiff

test:
	composer exec --verbose phpunit tests