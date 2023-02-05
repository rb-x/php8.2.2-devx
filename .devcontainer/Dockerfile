FROM ubuntu:20.04

ENV TZ=Europe/Paris
ENV PHP_GIT_REPO=git remote add origin git@github.com:rb-x/php8.2.2-devx.git
ENV BASENAME="php-8.2.2-internalog"

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
RUN apt update -y && apt install -y pkg-config build-essential autoconf bison re2c libxml2-dev libsqlite3-dev libreadline-dev libzip-dev libssl-dev libcurl4-openssl-dev libonig-dev libpq-dev libreadline-dev libpng-dev libjpeg-dev libfreetype-dev libsodium-dev git python3 python3-pip curl netcat && pip3 install rich

WORKDIR /php

RUN git clone "$PHP_GIT_REPO"

WORKDIR /php/$BASENAME

RUN ./buildconf --force && ./configure --enable-debug --enable-mysqlnd --with-pdo-mysql --with-pdo-mysql=mysqlnd --with-pdo-pgsql=/usr/bin/pg_config --enable-bcmath --enable-fpm --with-fpm-user=www-data --with-fpm-group=www-data --enable-mbstring --enable-phpdbg --enable-shmop --enable-sockets --enable-sysvmsg --enable-sysvsem --enable-sysvshm --with-zlib --with-curl --with-pear --with-openssl --enable-pcntl --with-readline --enable-gd --with-freetype --with-jpeg --enable-intl --with-zip --with-sodium --enable-xdebug

RUN make -j$(nproc)
RUN make install
