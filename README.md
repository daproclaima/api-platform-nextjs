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
