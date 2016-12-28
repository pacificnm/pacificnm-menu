<?php
namespace Menu\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Menu\Controller\UpdateController;

class UpdateControllerFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Menu\Controller\UpdateController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Menu\Service\ServiceInterface');
        
        $form = $realServiceLocator->get('Menu\Form\Form');
        
        return new UpdateController($service, $form);
    }
}

