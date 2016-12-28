<?php
namespace Menu\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Menu\Controller\ViewController;

class ViewControllerFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Menu\Controller\ViewController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Menu\Service\ServiceInterface');
        
        $menuItemService = $realServiceLocator->get('MenuItem\Service\ServiceInterface');
        
        return new ViewController($service, $menuItemService);
    }
}

