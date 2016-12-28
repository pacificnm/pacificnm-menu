<?php
namespace Menu\View\Helper\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Menu\View\Helper\MenuHelper;

class MenuHelperFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return \Menu\View\Helper\MenuHelper
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get("Menu\Service\ServiceInterface");
        
        return new MenuHelper($service);
    }
}

