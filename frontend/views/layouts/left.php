<aside class="main-sidebar">

    <section class="sidebar">



        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Acciones', 'options' => ['class' => 'header']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],

                    [
                        'label' => 'Inicio',
                        'icon' => 'home',
                        'url' => '@web/index.php',
                    ],

                    [
                      'label' => 'Personas',
                      'icon' => 'users',
                      'url' => '#',
                      'items' => [
                        [
                        'label' => 'Clientes',
                        'icon' => 'clipboard',
                        'url' => ['personas/index'],
                        
                        ],

                        [
                        'label' => 'Transportistas',
                        'icon' => 'truck',
                        'url' => ['camionero/index'],
                        
                        ],
                      ],
                    ],                  
                                        

                    [
                      'label' => 'Remitos',
                      'icon' => 'users',
                      'url' => '#',
                      'items' => [
                        [
                        'label' => 'Listado de Remitos',
                        'icon' => 'clipboard',
                        'url' => ['remito/index'],
                        
                        ],
                        [
                        'label' => 'Cargar Remito',
                        'icon' => 'truck',
                        'url' => ['remito/create'],
                        
                        ],

                        [
                        'label' => 'Cargar Pago',
                        'icon' => 'clipboard',
                        'url' => ['pagosremito/create'],
                        
                        ],

                        [
                        'label' => 'Pagos de Remitos',
                        'icon' => 'clipboard',
                        'url' => ['remito/indexpagos'],
                        
                        ],
                      ],
                    ], 
                    

                    [
                      'label' => 'Gestion de Usuarios',
                      'icon' => 'users',
                      'url' => '#',
                      'items' => [
                        [
                            'label' => 'Crear Usuario',
                            'icon' => 'user-plus',
                            'url' => '?r=site/registro',
                        ],
                      ],
                    ],
                ],
            ]
        ) 
        ?>        


    </section>

</aside>
