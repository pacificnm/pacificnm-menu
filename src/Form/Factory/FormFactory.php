<?php
namespace Pacificnm\Menu\Form\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Menu\Form\Form;

class FormFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\Menu\Form\Form
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        return new Form();
    }
}

