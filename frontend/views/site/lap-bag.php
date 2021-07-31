<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Laporan Bagian';

?>

<!------ Include the above in your HEAD tag ---------->

<!-- details card section starts from here -->
<?php
for ($i=0; $i < 2; $i++) { 
    echo "</br>";
}
?>

<div class="jumbotron">
  <h1 class="display-4">Selamat Datang!</h1>
  <p class="lead">Sistem Informasi Pemberkasan</p>
  <hr class="my-4">
<section class="details-card">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                        <img src="img/gu.png" alt="">
                    </div>
                    <div class="card-desc">
                        <h3>Laporan Gu</h3>
                        <h4>Bagian<h4>
                           <?= Html::a(
                                    'Sekretariat',
                                   ['/site/'],
                                    ['data-method' => 'post', 'class' => 'btn btn-primary btn-flat']
                                ) ?> </a>


                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                        <img src="img/ls.png" alt="">
                    </div>
                    <div class="card-desc">
                        <h3>Laporan Gu</h3>
                        <h4>Bagian</h4>
                            <?= Html::a(
                                    'Urusan',
                                   ['/site/lap-ls'],
                                    ['data-method' => 'post', 'class' => 'btn btn-danger btn-flat']
                                ) ?> </a>   
                    </div>
                </div>
            </div>


             <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                        <img src="img/ls.png" alt="">
                    </div>
                    <div class="card-desc">
                        <h3>Laporan Gu</h3>
                        <h4>Bagian</h4>
                            <?= Html::a(
                                    'Pendidikan',
                                   ['/site/lap-bag2'],
                                    ['data-method' => 'post', 'class' => 'btn btn-danger btn-flat']
                                ) ?> </a>   
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
</section>
</div>