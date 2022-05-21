# Setup

---

## Requirements
- Docker
- Docker Compose
- PHP Composer

## Docker
```
docker-compose build
docker-compose up -d
docker-compose up -d -- build

docker exec -it web /bin/sh
docker exec -it php /bin/sh
docker exec -it web /bin/bash
docker exec -it php /bin/bash
```

## Hosts
**/etc/hosts**
```  
127.0.0.1  project.local
```
