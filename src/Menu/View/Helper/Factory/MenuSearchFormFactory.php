<?php
namespace Menu\View\Helper\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Menu\View\Helper\MenuSearchForm;

class MenuSearchFormFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Menu\View\Helper\MenuSearchForm
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        return new MenuSearchForm();
    }
}

