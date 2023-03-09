.PHONY: up clean

up:
	cd .. && composer install -noa
	docker compose -p tdd-php up -d --build

clean:
	docker compose stop
	docker compose rm -f
	sudo rm -rf _data/ vendor/