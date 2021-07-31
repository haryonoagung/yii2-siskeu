<?php

use adminlte\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          
            <div class="pull-left info">
              
        </div>
        <!-- search form -->
        
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?=
        Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => [
                        ['label' => 'Menu User', 'options' => ['class' => 'header']],
                        ['label' => 'Dashboard', 'icon' => 'fa fa-dashboard', 
                            'url' => ['/'], 'active' => $this->context->route == 'site/index'
                        ],
                        
                        [
                            'label' => 'Data Laporan Gu dan LS',
                            'icon' => 'fa fa-bars',
                            'url' => '#',
                            'items' => [
                                [
                                    'label' => 'Laporan GU',
                                    'icon' => 'fa fa-file-text',
                                    'url' => '?r=site/lap-gu',
                    'active' => $this->context->route == '' 
                                ],
                                [
                                    'label' => 'Laporan LS',
                                    'icon' => 'fa fa-file-text',
                                    'url' => '?r=site/lap-ls',
                    'active' => $this->context->route == ''
                                ],
                          
                            ]
                        ],
                        
                    /*

                        [
                            'label' => 'Users',
                            'icon' => 'fa fa-users',
                            'url' => ['/user'],
                            'active' => $this->context->route == 'user/index',
                        ],
                        ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                        ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                    ],

                    */
                ]
            ]
        )
        ?>
        
    </section>
    <!-- /.sidebar -->
</aside>
