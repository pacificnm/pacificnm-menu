<?php
namespace Pacificnm\Menu\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Menu\Controller\CreateController;

class CreateControllerFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return \Pacificnm\Menu\Controller\CreateController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Pacificnm\Menu\Service\ServiceInterface');
        
        $form = $realServiceLocator->get('Pacificnm\Menu\Form\Form');
        
        return new CreateController($service, $form);
    }
}

