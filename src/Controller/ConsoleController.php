<?php
namespace Pacificnm\Menu\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Console\Adapter\AdapterInterface;
use Zend\Console\Request as ConsoleRequest;
use RuntimeException;
use Pacificnm\Menu\Service\ServiceInterface;

class ConsoleController extends AbstractActionController
{

    /**
     *
     * @var ServiceInterface
     */
    protected $service;

    /**
     *
     * @var AdapterInterface
     */
    protected $console;

    /**
     *
     * @param ServiceInterface $service            
     * @param AdapterInterface $console            
     */
    public function __construct(ServiceInterface $service, AdapterInterface $console)
    {
        $this->service = $service;
        
        $this->console = $console;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\Mvc\Controller\AbstractActionController::indexAction()
     */
    public function indexAction()
    {
        $request = $this->getRequest();
        
        // validate we are in a console
        if (! $request instanceof ConsoleRequest) {
            throw new RuntimeException('Cannot handle request of type ' . get_class($request));
        }
        
        $table = new \Zend\Text\Table\Table(array(
            'columnWidths' => array(
                10,
                20,
                20,
                20,
                10,
                20,
                10
            )
        ));
        
        $table->appendRow(array(
            'Menu Id',
            'Route',
            'Name',
            'Icon',
            'Order',
            'Location',
            'Active'
        ));
        
        $entitys = $this->service->getAll(array(
            'pagination' => 'off'
        ));
        
        foreach ($entitys as $entity) {
            $table->appendRow(array(
                $entity->getMenuId(),
                $entity->getMenuRoute(),
                $entity->getMenuName(),
                $entity->getMenuIcon(),
                $entity->getMenuOrder(),
                $entity->getMenuLocation(),
                $entity->getMenuActive()
            ));
        }
        
        echo $table;
        
        $end = date('m/d/Y h:i a', time());
        
        $this->console->write("Comleted acl list at {$end}\n");
    }

    public function viewAction()
    {
        $request = $this->getRequest();
        
        // validate we are in a console
        if (! $request instanceof ConsoleRequest) {
            throw new RuntimeException('Cannot handle request of type ' . get_class($request));
        }
        
        $id = $this->params()->fromRoute('id');
        
        $table = new \Zend\Text\Table\Table(array(
            'columnWidths' => array(
                10,
                20,
                20,
                20,
                10,
                20,
                10
            )
        ));
        
        $table->appendRow(array(
            'Menu Id',
            'Route',
            'Name',
            'Icon',
            'Order',
            'Location',
            'Active'
        ));
        
        $entity = $this->service->get($id);
        
        $table->appendRow(array(
            $entity->getMenuId(),
            $entity->getMenuRoute(),
            $entity->getMenuName(),
            $entity->getMenuIcon(),
            $entity->getMenuOrder(),
            $entity->getMenuLocation(),
            $entity->getMenuActive()
        ));
        
        echo $table;
        
        $end = date('m/d/Y h:i a', time());
        
        $this->console->write("Comleted acl list at {$end}\n");
    }
}

