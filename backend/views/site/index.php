<?php

/* @var $this yii\web\View */

$this->title = 'Admin Dashboard';
?>
<div class="site-index">

<?php
for ($i=0; $i < 3; $i++) { 
     echo "</br>";
 } 

?>
    
    <div class="jumbotron">
        <h1>Selamat Datang!</h1>

        <p class="lead">Perancangan Sistem Penata Keuangan dan Pemberkasan</p>
       
        <?php
            for ($i=0; $i < 2; $i++) { 
            echo "</br>";
        } ?>

        <div class="row">
        
         <div class="col-md-3">
            <p><a class="btn btn-lg btn-success" href="?r=berkas">Input Berkas</a></p>
        </div>

        <div class="col-md-3">
            <p><a class="btn btn-lg btn-success" href="?r=bagian">Input Bagian</a></p>
        </div>

        <div class="col-md-3">
            <p><a class="btn btn-lg btn-success" href="?r=gu">Input Gu </a></p>
        </div>

        <div class="col-md-3">
            <p><a class="btn btn-lg btn-success" href="?r=ls">Input Ls</a></p>
        </div>
        
       
        </div>
        
            

    <div class="body-content">

        

            
    </div>
        </div>

    </div>
</div>
