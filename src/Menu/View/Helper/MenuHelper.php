<?php
namespace Menu\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Menu\Service\ServiceInterface;

class MenuHelper extends AbstractHelper
{

    /**
     *
     * @var ServiceInterface
     */
    protected $service;

    /**
     *
     * @param ServiceInterface $service            
     */
    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     */
    public function __invoke($menuLocation)
    {
        $this->validLocations($menuLocation);
        
        $view = $this->getView();
        
        $partialHelper = $view->plugin('partial');
        
        $data = new \stdClass();
        
        $entitys = $this->service->getAll(array(
            'pagination' => 'off',
            'menuLocation' => $menuLocation
        ));
        
        
        $data->entitys = $entitys;
        
        switch ($menuLocation) {
            case 'Top':
                return $partialHelper('partials/menu-top.phtml', $data);
                break;
            case 'Left':
                return $partialHelper('partials/menu-left.phtml', $data);
                break;
            case 'Right':
                return $partialHelper('partials/menu-right.phtml', $data);
                break;
            case 'Bottom':
                return $partialHelper('partials/menu-bottom.phtml', $data);
                break;
        }
    }

    /**
     * 
     * @param string $menuLocation
     * @throws \Exception
     * @return boolean
     */
    protected function validLocations($menuLocation)
    {
        $haystack = array(
            'Top',
            'Left',
            'Right',
            'Bottom'
        );
        
        if (! in_array($menuLocation, $haystack)) {
            throw new \Exception();
        } else {
            return true;
        }
    }
}

