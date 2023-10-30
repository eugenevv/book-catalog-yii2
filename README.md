# book-catalog-yii2
<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Basic Project Template</h1>
    <br>
</p>

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![build](https://github.com/yiisoft/yii2-app-basic/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-basic/actions?query=workflow%3Abuild)

ТРЕБОВАНИЯ
----------
- Минимальная гарантированная версия Git 2.34.1
- Минимальная гарантированная версия Docker 24.0.5
- Минимальная гарантированная версия docker-compose 1.29.2
- Минимальная гарантированная версия PHP 7.4

УСТАНОВКА
--------------------------

Клонируем проект

    git clone git@github.com:eugenevv/book-catalog-yii2.git

Переходим в папку проекта

    cd book-catalog-yii2

Стартуем контейнер

    docker-compose up -d

Устанавливаем зависимости композера

    docker exec -it book-catalog-yii2-app composer install

Устанавливаем доступы на дирректории

    docker exec -it book-catalog-yii2-app composer run-script post-install-cmd

Выполняем миграции

    docker exec -it book-catalog-yii2-app php yii migrate

Прописываем домен в `/etc/hosts`

      127.0.0.1	book-catalog-yii2.local

Заходим на страницу проекта:

    http://book-catalog-yii2.local/
