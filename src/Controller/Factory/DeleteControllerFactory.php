<?php
namespace Pacificnm\Menu\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Menu\Controller\DeleteController;

class DeleteControllerFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return \Pacificnm\Menu\Controller\DeleteController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Pacificnm\Pacificnm\Menu\Service\ServiceInterface');
        
        return new DeleteController($service);
    }
}

