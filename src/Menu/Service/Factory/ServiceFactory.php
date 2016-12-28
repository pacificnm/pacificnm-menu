<?php
namespace Menu\Service\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Menu\Service\Service;

class ServiceFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Menu\Service\Service
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = $serviceLocator->get('Menu\Mapper\MysqlMapperInterface');
        
        $menuItemService = $serviceLocator->get('MenuItem\Service\ServiceInterface');
        
        return new Service($mapper, $menuItemService);
    }
}

