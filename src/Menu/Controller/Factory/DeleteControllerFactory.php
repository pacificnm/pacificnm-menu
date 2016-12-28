<?php
namespace Menu\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Menu\Controller\DeleteController;

class DeleteControllerFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return \Menu\Controller\DeleteController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Menu\Service\ServiceInterface');
        
        return new DeleteController($service);
    }
}

