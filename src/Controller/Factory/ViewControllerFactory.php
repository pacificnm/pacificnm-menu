<?php
namespace Pacificnm\Menu\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Menu\Controller\ViewController;

class ViewControllerFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\Menu\Controller\ViewController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Pacificnm\Menu\Service\ServiceInterface');
        
        $menuItemService = $realServiceLocator->get('Pacificnm\MenuItem\Service\ServiceInterface');
        
        return new ViewController($service, $menuItemService);
    }
}

