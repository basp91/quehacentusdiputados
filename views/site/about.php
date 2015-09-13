<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Acerca de la aplicación';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <h2><b>Yo en la cámara de diputados</b></h2>
    <br>
    <div class="row">
        <div class="col-lg-4">
            <p><img src="../../web/image.jpg"></p>
        </div>
        <div class="col-lg-8">
            <br>
            <p>
                Se supone que los diputados son electos por distritos para representar nuestros intereses. En época de campañas
                escuchan a las personas y anotan todas sus sugerencias. Pero ¿qué pasa cuando pasa el tiempo y en la cámara de
                diputados comienzan a votarse temas que resultan de nuestro interes pero que no logramos transmitirselos a
                nuestro diputado?
            </p>
            <p>
                El objetivo de "Yo en la camara de diputados" es proporcionar una plataforma en la que se le de seguimiento a
                las sesiones futuras y pasadas de los diputados para hacerles llegar nuestra opinión en base a encuestas que
                reflejen la opinión ciudadana y hacer un comparativo entre ésta y las votaciones hechas por sus representantes.
            </p>
        </div>
    </div>
</div>
