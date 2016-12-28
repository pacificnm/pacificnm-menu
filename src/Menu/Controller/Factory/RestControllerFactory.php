<?php
namespace Menu\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Menu\Controller\RestController;

class RestControllerFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Menu\Controller\RestController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Menu\Service\ServiceInterface');
        
        $menuItemService = $realServiceLocator->get('MenuItem\Service\ServiceInterface');
        
        $form = $realServiceLocator->get('Menu\Form\Form');
        
        return new RestController($service, $menuItemService, $form);
    }
}

