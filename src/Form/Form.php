<?php
namespace Pacificnm\Menu\Form;


use Zend\Form\Form as ZendForm;
use Zend\InputFilter\InputFilterProviderInterface;
use Pacificnm\Menu\Hydrator\Hydrator;
use Pacificnm\Menu\Entity\Entity;
use Pacificnm\Page\Service\ServiceInterface as PageServiceInterface;

class Form extends ZendForm implements InputFilterProviderInterface
{
    /**
     * 
     * @var PageServiceInterface
     */
    protected $pageService;
    
    /**
     * 
     * @param string $name
     * @param array $options
     */
    public function __construct(PageServiceInterface $pageService, $name = 'menu-form', $options = array())
    {
        parent::__construct($name, $options);
    
        $this->setHydrator(new Hydrator(false));
    
        $this->setObject(new Entity());
        
        $this->pageService = $pageService;
        
        // menuId
        $this->add(array(
            'name' => 'menuId',
            'type' => 'hidden',
            'attributes' => array(
                'id' => 'menuId'
            )
        ));
        
        // menuRoute
        $this->add(array(
            'name' => 'menuRoute',
            'type' => 'Select',
            'options' => array(
                'label' => 'Route:',
                'value_options' => $this->getPageOptions()
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'menuRoute'
            )
        ));
        
        // menuName
        $this->add(array(
            'name' => 'menuName',
            'type' => 'Text',
            'options' => array(
                'label' => 'Name:'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'menuName'
            )
        ));
        
        // menuIcon
        $this->add(array(
            'name' => 'menuIcon',
            'type' => 'Text',
            'options' => array(
                'label' => 'Icon:'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'menuIcon'
            )
        ));
        // menuLocation
        $this->add(array(
            'type' => 'Select',
            'name' => 'menuLocation',
            'options' => array(
                'label' => 'Menu Location:',
                'value_options' => array(
                    'Top-Right' => 'Top Right',
                    'Top-Left' => 'Top Left',
                    'Left' => 'Left',
                    'Right' => 'Right',
                    'Bottom' => 'Bottom'
                )
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'menuLocation'
            )
        ));
        
        // menuOrder
        $this->add(array(
            'name' => 'menuOrder',
            'type' => 'Text',
            'options' => array(
                'label' => 'Order:'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'menuOrder'
            )
        ));
        
        // menuActive
        $this->add(array(
            'type' => 'Checkbox',
            'name' => 'menuActive',
            'options' => array(
                'label' => 'Active',
                'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0'
            ),
            'attributes' => array(
                'id' => 'menuActive'
            )
        ));
        
        // submit
        $this->add(array(
            'name' => 'submit',
            'type' => 'button',
            'attributes' => array(
                'value' => 'Submit',
                'id' => 'submit',
                'class' => 'btn btn-primary btn-flat'
            )
        ));
        
    }
    
    /**
     * {@inheritDoc}
     * @see \Zend\InputFilter\InputFilterProviderInterface::getInputFilterSpecification()
     */
    public function getInputFilterSpecification()
    {
        // TODO Auto-generated method stub
        
    }
    
    /**
     * 
     * @return string[]
     */
    protected function getPageOptions()
    {
        $options = array();
        
        $entitys = $this->pageService->getAll(array(
            'pagination' => 'off',
        ));
        
        foreach($entitys as $entity) {
            $options[$entity->getPageRoute()] = $entity->getPageRoute() . ' ' . $entity->getPageName();
        }
        
        return $options;
    }

}

