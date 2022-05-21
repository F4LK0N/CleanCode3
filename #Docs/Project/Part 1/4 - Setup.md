# Setup

---

## Requirements
- Docker
- Docker Compose
- PHP Composer

## Docker
Manage
```
docker-compose build
docker-compose up -d
docker-compose up -d -- build
```

Shell
To access the shell of a container
```
docker exec -it php /bin/sh
docker exec -it web /bin/sh
docker exec -it php /bin/bash
docker exec -it web /bin/bash
```

## Hosts
**/etc/hosts**
```  
127.0.0.1  project.local
```

## Composer
From inside the **php** shell container:
```  
composer install
composer dumpautoload

composer self-update --update-keys
composer diagnose -vvv
```


