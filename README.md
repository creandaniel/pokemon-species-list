HOW TO SET UP SYMPONY SITE LOCALLY
===============

This guide assumes you already have date/time installed and PHP 5.4 installed on your machine. 

First install database via SQL (pokemon_species)

Update database config in Symfony with database name + username/ password credentials

1. run those commands 

INSTALLER SET UP (ASSUMING YOU NEED TO SET UP SYMFONY INSTALLER)
 sudo mkdir -p /usr/local/bin
 sudo curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony
 sudo chmod a+x /usr/local/bin/symfony

2. CD to the project directory: cd /var/www/daniel/pokemon-species-list

3.  Run: php app/console server:run (sometimes might be php bin/console server:run ?)

4. Type http://127.0.0.1:8000 into browser:

If sucessful, prefix the url with: 

If unsucessfull check error messages or premission issues (egg. sudo chown daniel:pokemon-species-list )

http://127.0.0.1:8000/




Log Into Main area: 

1. http://127.0.0.1:8000/login
Dummy user login: 

2. user@test.com: password: test

3. You should be redirected to main area via index.  This will show latest pokemon in a list via database. 

To logout add /logout to end of URl. 

========================

Register for a new user
===========================
1. http://127.0.0.1:8000/registeradd a new user to login


http://127.0.0.1:8000/create 
http://127.0.0.1:8000/edit/{id}

http://127.0.0.1:8000/register

http://127.0.0.1:8000/show{id} (NOTE: Also allows you to delete a pokemon from here) - NEEDS fixing due to urls generate bug


NOTES:
===============

Apache conf exsists but run into issues setting up without relaying on localhost address

www.sympony-app.dc is host name

composer require knplabs/knp-paginator-bundle


