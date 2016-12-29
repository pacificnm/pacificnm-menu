<?php
return array(
    'module' => array(
        'Menu' => array(
            'name' => 'Menu',
            'version' => '1.0.4',
            'install' => array(
                'require' => array(),
                'sql' => 'sql/menu.sql'
            )
        )
    ),
    'controllers' => array(
        'factories' => array(
            'Menu\Controller\ConsoleController' => 'Menu\Controller\Factory\ConsoleControllerFactory',
            'Menu\Controller\CreateController' => 'Menu\Controller\Factory\CreateControllerFactory',
            'Menu\Controller\DeleteController' => 'Menu\Controller\Factory\DeleteControllerFactory',
            'Menu\Controller\IndexController' => 'Menu\Controller\Factory\IndexControllerFactory',
            'Menu\Controller\RestController' => 'Menu\Controller\Factory\RestControllerFactory',
            'Menu\Controller\UpdateController' => 'Menu\Controller\Factory\UpdateControllerFactory',
            'Menu\Controller\ViewController' => 'Menu\Controller\Factory\ViewControllerFactory'
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'Menu\Service\ServiceInterface' => 'Menu\Service\Factory\ServiceFactory',
            'Menu\Mapper\MysqlMapperInterface' => 'Menu\Mapper\Factory\MysqlMapperFactory',
            'Menu\Form\Form' => 'Menu\Form\Factory\FormFactory',
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
                        'controller' => 'Menu\Controller\CreateController',
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
                        'controller' => 'Menu\Controller\DeleteController',
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
                        'controller' => 'Menu\Controller\IndexController',
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
                        'controller' => 'Menu\Controller\RestController',
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
                        'controller' => 'Menu\Controller\UpdateController',
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
                        'controller' => 'Menu\Controller\ViewController',
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
                            'controller' => 'Menu\Controller\ConsoleController',
                            'action' => 'index'
                        )
                    )
                ),
                'menu-console-view' => array(
                    'options' => array(
                        'route' => 'menu --view [--id=]',
                        'defaults' => array(
                            'controller' => 'Menu\Controller\ConsoleController',
                            'action' => 'view'
                        )
                    )
                )
            )
        ),
    ),
    'view_helpers' => array(
        'factories' => array(
            'menuHelper' => 'Menu\View\Helper\Factory\MenuHelperFactory',
            'MenuSearchForm' => 'Menu\View\Helper\Factory\MenuSearchFormFactory',
        )
    ),
    'view_manager' => array(
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