# Instructions

## Installation 

### Install the project with docker-compose
```bash
docker-compose build --pull --no-cache
```

### Start the server in detached mode
```bash
docker-compose up -d 
```

### Follow the logs
```bash
docker-compose logs -f
```

### Stop the server (mind doing it to prevent the service keeping running in background)
```bash
docker-compose stop 
```


### Exectute php script to create entities despite the app is in a docker container
```bash
docker-compose exec php \
    bin/console make:entity --api-resource
```

By prepending `docker-compose exec php` to your composer script, you can type any php commands as usual.
You can [create an alias for this command](http://www.linfo.org/alias.html) like this `alias dcphp=docker-compose exec php`


### Install Graphql API 
```bash
docker-compose exec php sh -c '
    composer require webonyx/graphql-php
    bin/console cache:clear
'
```
