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

### Create Next.js PWA
```bash
docker-compose exec pwa \
    generate-api-platform-client
```

### Deployment through minikubes for learning (this par is not clear after build part )
follow these [instructions](https://api-platform.com/docs/deployment/minikube/)
- Download minikube by one methode [here](https://minikube.sigs.k8s.io/docs/start/)
- Then start the minikube server
```bash
minikube start --addons registry --addons dashboard
```
- configure minikube to be able using docker. Instrutions [here](https://minikube.sigs.k8s.io/docs/handbook/registry)
```
// Command on mac. It should return the port number to  
minikube addons enable registry

// keep the task running in a cli tab
docker run --rm -it --network=host alpine ash -c "apk add socat && socat TCP-LISTEN:<port number>,reuseaddr,fork TCP:$(minikube ip):<port number>"
```
- build and push the docker images of the api and pwa app
```
docker build -t localhost:<port number>/php api --target api_platform_php
docker build -t localhost:<port number>/pwa pwa --target api_platform_pwa_prod
docker push localhost:<port number>
```
- Deploy to minikube 
```
helm install api-platform-nextjs helm/api-platform \
  --set php.image.repository=localhost:<port number>/php \
  --set php.image.tag=latest \
  --set pwa.image.repository=localhost:<port number>/pwa \
  --set pwa.image.tag=latest

```

### Deployment through docker-composer for small scale app 
[instructions](https://api-platform.com/docs/deployment/docker-compose/)
