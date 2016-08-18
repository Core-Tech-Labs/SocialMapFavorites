
main:
		@echo Duplicating All Files
		sh install.sh
clean:
		@echo Cleaning up project

JobCommands:
		@echo #Adding FavAUser.php & unFavAUser.php

Mail:
		@echo #Adding Mail/FavAUserMail.php && Mail/Mail.php


test:
		phpunit
