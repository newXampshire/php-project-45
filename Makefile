install:
	composer install

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

# games
brain-games:
	./bin/brain-games

brain-even:
	./bin/brain-even
