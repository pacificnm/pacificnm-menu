<?php
namespace Pacificnm\Menu\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Menu\Controller\UpdateController;

class UpdateControllerFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\Menu\Controller\UpdateController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Pacificnm\Menu\Service\ServiceInterface');
        
        $form = $realServiceLocator->get('Pacificnm\Menu\Form\Form');
        
        return new UpdateController($service, $form);
    }
}

