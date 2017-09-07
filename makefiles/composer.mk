#------------------------------------------------------------------------------
# Composer
#------------------------------------------------------------------------------

composer: composer.phar
	php composer.phar $(CLI_ARGS)

composer-install: composer.phar ## Install dependencies
	php composer.phar install

composer.phar:
	curl -sS https://getcomposer.org/installer | php

clean:
	rm -f composer.lock
	rm -f composer.phar
	rm -rf vendor

.PHONY: composer composer-install clean
