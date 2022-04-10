
.PHONY: test-sf3
test-sf3:
	.scenarios.lock/install symfony3 lowest
	./vendor/bin/phpunit tests/
	.scenarios.lock/install symfony3 highest
	./vendor/bin/phpunit tests/

.PHONY: test-sf4
test-sf4:
	.scenarios.lock/install symfony4 lowest
	./vendor/bin/phpunit tests/
	.scenarios.lock/install symfony4 highest
	./vendor/bin/phpunit tests/

.PHONY: test-sf5
test-sf5:
	.scenarios.lock/install symfony5 lowest
	./vendor/bin/phpunit tests/
	.scenarios.lock/install symfony5 highest
	./vendor/bin/phpunit tests/

.PHONY: test-sf6
test-sf6:
	.scenarios.lock/install symfony6 lowest
	./vendor/bin/phpunit tests/
	.scenarios.lock/install symfony6 highest
	./vendor/bin/phpunit tests/

.PHONY: test-sf
test-sf:
	composer install
	./vendor/bin/phpunit tests/

.PHONY: test
test: test-sf3 test-sf4 test-sf5 test-sf6 test-sf
