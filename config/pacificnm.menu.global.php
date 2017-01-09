<?php
return array(
    'module' => array(
        'Menu' => array(
            'name' => 'Menu',
            'version' => '1.0.6',
            'install' => array(
                'require' => array(),
                'sql' => 'sql/menu.sql'
            )
        )
    ),
    'controllers' => array(
        'factories' => array(
            'Pacificnm\Menu\Controller\ConsoleController' => 'Pacificnm\Menu\Controller\Factory\ConsoleControllerFactory',
            'Pacificnm\Menu\Controller\CreateController' => 'Pacificnm\Menu\Controller\Factory\CreateControllerFactory',
            'Pacificnm\Menu\Controller\DeleteController' => 'Pacificnm\Menu\Controller\Factory\DeleteControllerFactory',
            'Pacificnm\Menu\Controller\IndexController' => 'Pacificnm\Menu\Controller\Factory\IndexControllerFactory',
            'Pacificnm\Menu\Controller\RestController' => 'Pacificnm\Menu\Controller\Factory\RestControllerFactory',
            'Pacificnm\Menu\Controller\UpdateController' => 'Pacificnm\Menu\Controller\Factory\UpdateControllerFactory',
            'Pacificnm\Menu\Controller\ViewController' => 'Pacificnm\Menu\Controller\Factory\ViewControllerFactory'
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'Pacificnm\Menu\Service\ServiceInterface' => 'Pacificnm\Menu\Service\Factory\ServiceFactory',
            'Pacificnm\Menu\Mapper\MysqlMapperInterface' => 'Pacificnm\Menu\Mapper\Factory\MysqlMapperFactory',
            'Pacificnm\Menu\Form\Form' => 'Pacificnm\Menu\Form\Factory\FormFactory',
        )
    ),
    'router' => array(
        'routes' => array(
            'menu-create' => array(
                'pageTitle' => 'Menu',
                'pageSubTitle' => 'New',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'menu-index',
                'icon' => 'fa fa-list',
                'layout' => 'admin',
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin/menu/create',
                    'defaults' => array(
                        'controller' => 'Pacificnm\Menu\Controller\CreateController',
                        'action' => 'index'
                    )
                )
            ),
            'menu-delete' => array(
                'pageTitle' => 'Menu',
                'pageSubTitle' => 'Delete',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'menu-index',
                'icon' => 'fa fa-list',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/menu/delete/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\Menu\Controller\DeleteController',
                        'action' => 'index'
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+'
                    )
                )
            ),
            'menu-index' => array(
                'pageTitle' => 'Menu',
                'pageSubTitle' => 'Home',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'menu-index',
                'icon' => 'fa fa-list',
                'layout' => 'admin',
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin/menu',
                    'defaults' => array(
                        'controller' => 'Pacificnm\Menu\Controller\IndexController',
                        'action' => 'index'
                    )
                )
            ),
            'menu-rest' => array(
                'type' => 'segment',
                'pageTitle' => 'Menu',
                'pageSubTitle' => 'Rest',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'menu-index',
                'icon' => 'fa fa-list',
                'layout' => 'rest',
                'options' => array(
                    'route' => '/api/menu[/:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\Menu\Controller\RestController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+'
                    )
                )
            ),
            'menu-update' => array(
                'pageTitle' => 'Menu',
                'pageSubTitle' => 'Edit',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'menu-index',
                'icon' => 'fa fa-list',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/menu/update/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\Menu\Controller\UpdateController',
                        'action' => 'index'
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+'
                    )
                )
            ),
            'menu-view' => array(
                'pageTitle' => 'Menu',
                'pageSubTitle' => 'View',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'menu-index',
                'icon' => 'fa fa-list',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/menu/view/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\Menu\Controller\ViewController',
                        'action' => 'index'
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+'
                    )
                )
            )
        )
    ),
    'console' => array(
        'router' => array(
            'routes' => array(
                'menu-console-index' => array(
                    'options' => array(
                        'route' => 'menu --list',
                        'defaults' => array(
                            'controller' => 'Pacificnm\Menu\Controller\ConsoleController',
                            'action' => 'index'
                        )
                    )
                ),
                'menu-console-view' => array(
                    'options' => array(
                        'route' => 'menu --view [--id=]',
                        'defaults' => array(
                            'controller' => 'Pacificnm\Menu\Controller\ConsoleController',
                            'action' => 'view'
                        )
                    )
                )
            )
        ),
    ),
    'view_helpers' => array(
        'factories' => array(
            'menuHelper' => 'Pacificnm\Menu\View\Helper\Factory\MenuHelperFactory',
            'MenuSearchForm' => 'Pacificnm\Menu\View\Helper\Factory\MenuSearchFormFactory',
        )
    ),
    'view_manager' => array(
        'controller_map' => array(
            'Pacificnm\Menu' => true
        ),
        'template_map' => array(
            'pacificnm/menu/create/index' => __DIR__ . '/../view/menu/create/index.phtml',
            'pacificnm/menu/delete/index' => __DIR__ . '/../view/menu/delete/index.phtml',
            'pacificnm/menu/index/index' => __DIR__ . '/../view/menu/index/index.phtml',
            'pacificnm/menu/update/index' => __DIR__ . '/../view/menu/update/index.phtml',
            'pacificnm/menu/view/index' => __DIR__ . '/../view/menu/view/index.phtml'
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),
    'acl' => array(
        'default' => array(
            'guest' => array(),
            'user' => array(),
            'administrator' => array(
                'menu-create',
                'menu-delete',
                'menu-index',
                'menu-update',
                'menu-view'
                
            )
        )
    ),
    'menu' => array(
        'default' => array(
            array(
                'name' => 'Admin',
                'route' => 'admin-index',
                'icon' => 'fa fa-gear',
                'order' => 99,
                'location' => 'left',
                'active' => true,
                'items' => array(
                    array(
                        'name' => 'Menu',
                        'route' => 'menu-index',
                        'icon' => 'fa fa-list',
                        'order' => 6,
                        'active' => true
                    )
                )
            )
        )
    ),
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Admin',
                'route' => 'admin-index',
                'useRouteMatch' => true,
                'pages' => array(
                    array(
                        'label' => 'Menu',
                        'route' => 'menu-index',
                        'useRouteMatch' => true,
                        'pages' => array(
                            array(
                                'label' => 'View',
                                'route' => 'menu-view',
                                'useRouteMatch' => true,
                                'pages' => array(
                                    array(
                                        'label' => 'Edit',
                                        'route' => 'menu-update',
                                        'useRouteMatch' => true,
                                    ),
                                    array(
                                        'label' => 'Delete',
                                        'route' => 'menu-delete',
                                        'useRouteMatch' => true,
                                    ),
                                )
                            ),
                            array(
                                'label' => 'New',
                                'route' => 'menu-create',
                                'useRouteMatch' => true,
                            )
                        )
                    )
                )
            )
        )
    )
);