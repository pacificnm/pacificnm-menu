<?php
namespace Menu\View\Helper;

use Zend\View\Helper\AbstractHelper;

class MenuSearchForm extends AbstractHelper
{
    /**
     * 
     */
    public function __construct()
    {
        
    }
    
    /**
     * 
     * @param array $queryParams
     */
    public function __invoke(array $queryParams = array())
    {
        $view = $this->getView();
        
        $partialHelper = $view->plugin('partial');
        
        $data = new \stdClass();
        
        $data->queryParams = $queryParams;
        
        return $partialHelper('partials/menu-search-form.phtml', $data);
    }
}

