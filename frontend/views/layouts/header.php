<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

   <?= Html::a('<span class = "logo-mini">'.Html::img('@web/logo/logo.jpg').'</span><span class="logo-lg">'.Html::img('@web/logo/logo.png') . "Transportes LEILA" . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <li>
                    <?php
                        if(!Yii::$app->user->isGuest){
                            echo Html::a('Cerrar Sesion ('.Yii::$app->user->identity->username.') <i class = "fa fa-sign-out"></i>', ['site/logout'], ['data' => ['method' => 'post']]);
                        }else{
                            echo Html::a('Iniciar Sesion <i class = "fa fa-sign-out"></i>', ['site/login']);
                        }
                     ?>
                </li>
            </ul>
        </div>
    </nav>
</header>
