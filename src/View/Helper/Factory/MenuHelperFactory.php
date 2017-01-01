<?php
namespace Pacificnm\Menu\View\Helper\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Menu\View\Helper\MenuHelper;

class MenuHelperFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return \Pacificnm\Menu\View\Helper\MenuHelper
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get("Pacificnm\Menu\Service\ServiceInterface");
        
        return new MenuHelper($service);
    }
}

