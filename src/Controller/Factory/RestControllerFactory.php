<?php
namespace Pacificnm\Menu\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Menu\Controller\RestController;

class RestControllerFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\Menu\Controller\RestController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Pacificnm\Menu\Service\ServiceInterface');
        
        $menuItemService = $realServiceLocator->get('Pacificnm\MenuItem\Service\ServiceInterface');
        
        $form = $realServiceLocator->get('Pacificnm\Menu\Form\Form');
        
        return new RestController($service, $menuItemService, $form);
    }
}

