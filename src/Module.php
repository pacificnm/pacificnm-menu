<?php
namespace Pacificnm\Menu;

class Module
{

    public function getConsoleUsage()
    {
        return array(
            'menu --list' => 'lists all Menus',
            'menu --view [--id=]' => 'gets a single menu by its id'
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/../config/pacificnm.menu.global.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/'
                )
            )
        );
    }
}
