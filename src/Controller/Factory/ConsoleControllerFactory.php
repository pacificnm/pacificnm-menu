<?php
namespace Pacificnm\Menu\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Menu\Controller\ConsoleController;

class ConsoleControllerFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\Menu\Controller\ConsoleController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Pacificnm\Pacificnm\Menu\Service\ServiceInterface');
        
        $console = $realServiceLocator->get('console');
        
        return new ConsoleController($service, $console);
    }
}

