<?php
namespace Menu\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Menu\Controller\IndexController;

class IndexControllerFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Menu\Controller\IndexController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Menu\Service\ServiceInterface');
        
        return new IndexController($service);
    }
}

