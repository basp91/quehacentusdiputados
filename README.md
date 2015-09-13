PROYECTO:
=========
Yo en la cámara de diputados
======================================

Se supone que los diputados son electos por distritos para representar nuestros intereses. En época de campañas
escuchan a las personas y anotan todas sus sugerencias. Pero ¿qué pasa cuando pasa el tiempo y en la cámara de
diputados comienzan a votarse temas que resultan de nuestro interes pero que no logramos transmitirselos a
nuestro diputado?

El objetivo de "Yo en la camara de diputados" es proporcionar una plataforma en la que se le de seguimiento a
las sesiones futuras y pasadas de los diputados para hacerles llegar nuestra opinión en base a encuestas que
reflejen la opinión ciudadana y hacer un comparativo entre ésta y las votaciones hechas por sus representantes.

REQUISITOS
------------

- PHP > 5.4.0
- Composer
- MySQL
- Servidor con PHP (XAMPP)

INSTRUCCIONES
-------------

1 - Clonar el proyecto en un directorio dentro de un servidor con PHP (XAMPP por ejemplo)
2 - En el directorio del proyecto correr "composer install"
4 - Crear la base de datos y usuario diputados en la base de datos y asignarle privilegios en la base de datos
3 - Correr la migración de la base de datos que se encuentra en "/migrations/proyecto.sql".
4 - Correr el servidor php
5 - Visitar la aplicación en la dirección : http://localhost/directorio_proyecto/web/

NOTA: La configuración de la base de datos es la siguiente (/config/db.php):

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=diputados',
    'username' => 'diputados',
    'password' => 'B8xrEG5RueZv6HBh',
    'charset' => 'utf8',
];

MODO DESARROLLO A MODO PRODUCCIÓN
---------------

Para pasar a modo producción, en el archivo '/web/index.php' del proyecto verificar que:

    defined('YII_DEBUG') or define('YII_DEBUG', false);
    defined('YII_ENV') or define('YII_ENV', 'stable');

Posteriormente correr "composer update" y si no funciona "composer update --no-dev".

Para regresar a modo desarrollo regresar las propiedades a sus valores iniciales y correr "composer update" de nuevo.

FRAMEWORK: Yii 2 Basic Project Template
---------------------------------------

Yii 2 Basic Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
rapidly creating small projects.

The template contains the basic features including user login/logout and a contact page.
It includes all commonly used configurations that would allow you to focus on adding new
features to your application.

[![Latest Stable Version](https://poser.pugx.org/yiisoft/yii2-app-basic/v/stable.png)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://poser.pugx.org/yiisoft/yii2-app-basic/downloads.png)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-basic.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-basic)

ESTRUCTURA DEL DIRECTORIO
-------------------------

Estructura por defecto del framework

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources

Estructura del proyecto

      config/
        db.php                  contiene la configuración de la base de datos
        web.php                 contiene la configuración del proyecto web

      models/
        Diputado.php            contiene el modelo Diputado
        Distrito.php            contiene el modelo Distrito
        Entidad.php             contiene el modelo Entidad
        Iniciativa.php          contiene el modelo Iniciativa (iniciativa a discutir o ya discutida en la camara de diputados)
        Municipio.php           contiene el modelo Municipio
        Partido.php             contiene el modelo Partido
        VotacionCiudadana.php   contiene el modelo Votación ciudadana por distrito y para los usuarios registrados
        VotacionDiputado.php    contiene el modelo Diputado (en un segundo tiempo deberá ser obtenida de una api oficial)
        - - -
        User.php                contiene al modelo User y exige que identifique su distrito e INE
        LoginForm.php           inicio de sesión
        ContactForm.php         contacto con la administración de la aplicación web

      controllers/
        *

      views/                    
        *
