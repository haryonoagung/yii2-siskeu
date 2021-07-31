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
                        ['label' => 'Menu Admin', 'options' => ['class' => 'header']],
                        ['label' => 'Dashboard', 'icon' => 'fa fa-dashboard', 
                            'url' => ['/'], 'active' => $this->context->route == 'site/index'
                        ],
                        
                        [
                            'label' => 'Master Data',
                            'icon' => 'fa fa-bars',
                            'url' => '#',
                            'items' => [
                                [
                                    'label' => 'Input Berkas',
                                    'icon' => 'fa fa-file-text',
                                    'url' => '?r=berkas',
				    'active' => $this->context->route == 'berkas/index' 
                                ],

                                [
                                    'label' => 'Input Bagian',
                                    'icon' => 'fa fa-file-text',
                                    'url' => '?r=bagian',
                    'active' => $this->context->route == 'bagian/index' 
                                ],

                                [
                                    'label' => 'Input GU',
                                    'icon' => 'fa fa-file-text',
                                    'url' => '?r=gu',
				    'active' => $this->context->route == 'gu/index'
                                ],
                                [
                                    'label' => 'Input LS',
                                    'icon' => 'fa fa-file-text',
                                    'url' => '?r=ls',
                    'active' => $this->context->route == 'ls/index'
                                ]
                            ]
                        ],


                        [
                            'label' => 'Data Laporan',
                            'icon' => 'fa fa-bars',
                            'url' => '#',
                            'items' => [
                                [
                                    'label' => 'Laporan GU',
                                    'icon' => 'fa fa-file-text',
                                    'url' => '?r=lap-gu',
                    'active' => $this->context->route == 'lap-gu/index' 
                                ],
                                [
                                    'label' => 'Laporan LS',
                                    'icon' => 'fa fa-file-text',
                                    'url' => '?r=lap-ls',
                    'active' => $this->context->route == 'lap-ls/index'
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
