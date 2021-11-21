
# Instruction
Development app or program, using resources : Properties, Settings, Command, any else.


### Language & system/program version

- nginx: newely version
- php: 7.3-fpm
- laravel (custom version in codeidea)
- mysql 5.7

### Usage

- Install programs : docker.

- Run containers 

  ```command shell
  docker-compose -f ./docker-compose.yml up -d
  ```

- Source modify

1. (Once) First: Install php, mysql in your local pc.

  ```command shell
  brew search php
  ## find php: 7.3 version
  brew install php

  brew search mysql
  ## find mysql: 5.7 version
  brew install mysql
  ```
  
2. (Once) Seconds: Then download libs.

  ```command shell
  cd ./source
  composer install
  ## if you not install composer, search the internet
  ```

3. (Usually this step) Modify code

4. (Usually this step) Test your local serv

  ```command shell
  php artisan serve
  ```


### 배포 주소

- 프론트 주소 : https://greenpass.codeidea.io/
- 관리자 주소 : https://greenpass.codeidea.io/admin/


- Copyrighted by codeidea. and botbinoo.
