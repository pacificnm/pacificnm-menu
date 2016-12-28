<?php
namespace Menu\Form\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Menu\Form\Form;

class FormFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Menu\Form\Form
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        return new Form();
    }
}

