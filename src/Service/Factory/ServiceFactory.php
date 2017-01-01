<?php
namespace Pacificnm\Menu\Service\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Menu\Service\Service;

class ServiceFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\Menu\Service\Service
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = $serviceLocator->get('Pacificnm\Menu\Mapper\MysqlMapperInterface');
        
        $menuItemService = $serviceLocator->get('Pacificnm\MenuItem\Service\ServiceInterface');
        
        return new Service($mapper, $menuItemService);
    }
}

