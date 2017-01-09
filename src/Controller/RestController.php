<?php
namespace Pacificnm\Menu\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Pacificnm\Menu\Service\ServiceInterface;
use Pacificnm\MenuItem\Service\ServiceInterface as MenuItemService;
use Pacificnm\Menu\Form\Form;
use Zend\View\Model\JsonModel;

class RestController extends AbstractRestfulController
{
    /**
     * 
     * @var ServiceInterface
     */
    protected $service;
    
    /**
     * 
     * @var MenuItemService
     */
    protected $menuItemService;
    
    /**
     * 
     * @var Form
     */
    protected $form;
    
    /**
     * 
     * @param ServiceInterface $service
     * @param MenuItemService $menuItemService
     * @param Form $form
     */
    public function __construct(ServiceInterface $service,  MenuItemService $menuItemService, Form $form)
    {
        $this->service = $service;
        
        $this->menuItemService = $menuItemService;
        
        $this->form = $form;
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::create()
     */
    public function create($data)
    {
        $this->response->setStatusCode(405);
    
        return new JsonModel(array(
            'content' => 'Method Not Allowed'
        ));
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::delete()
     */
    public function delete($id)
    {
        $this->response->setStatusCode(405);
    
        return new JsonModel(array(
            "content" => "Method Not Allowed"
        ));
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::deleteList()
     */
    public function deleteList($data)
    {
        $this->response->setStatusCode(405);
    
        return new JsonModel(array(
            'content' => 'Method Not Allowed'
        ));
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::get()
     */
    public function get($id)
    {
        $entity = $this->service->get($id);
    
        if(! $entity) {
            $this->response->setStatusCode(403);
    
            return new JsonModel(array(
                'content' => 'Object not found'
            ));
        }
        
        $menuItemEntitys = $this->menuItemService->getAll(array(
            'pagination' => 'off',
            'menuId' => $id
        ));
    
        $menuItem = array();
        
        foreach($menuItemEntitys as $menuItemEntity) {
            $menuItem[] = array(
                'menuItemId' => $menuItemEntity->getMenuItemId(),
                'menuItemName' => $menuItemEntity->getMenuItemName(),
                'menuItemIcon' => $menuItemEntity->getMenuItemIcon(),
                'menuItemRoute' => $menuItemEntity->getMenuItemRoute(),
                'menuItemOrder' => $menuItemEntity->getMenuItemOrder(),
                'menuItemActive' => $menuItemEntity->getMenuItemActive()
            );
        }
        
        $data = array(
            'menuId' => $entity->getMenuId(),
                'menuRoute' => $entity->getMenuRoute(),
                'menuName' => $entity->getMenuName(),
                'menuIcon' => $entity->getMenuIcon(),
                'menuOrder' => $entity->getMenuOrder(),
                'menuLocation' => $entity->getMenuLocation(),
                'menuActive' => $entity->getMenuActive(),
                'menuItems' => $menuItem
        );
    
        return new JsonModel(array(
            'content' => $data
        ));
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::getList()
     */
    public function getList($params)
    {
        $page = $this->params()->fromQuery('page', 1);
    
        $countPerPage = $this->params()->fromQuery('countPerPage', 25);
    
        $filter = array( );
    
        $entitys = $this->service->getAll($filter);
    
        $paginator = $this->service->getAll($filter);
    
        $paginator->setCurrentPageNumber($page);
    
        $paginator->setItemCountPerPage($countPerPage);
    
        $data = array();
    
        foreach($paginator as $entity) {
           
            $menuItem = array();
            
            $menuItemEntitys = $this->menuItemService->getAll(array(
                'pagination' => 'off',
                'menuId' => $entity->getMenuId()
            ));
            
            foreach($menuItemEntitys as $menuItemEntity) {
                $menuItem[] = array(
                    'menuItemId' => $menuItemEntity->getMenuItemId(),
                    'menuItemName' => $menuItemEntity->getMenuItemName(),
                    'menuItemIcon' => $menuItemEntity->getMenuItemIcon(),
                    'menuItemRoute' => $menuItemEntity->getMenuItemRoute(),
                    'menuItemOrder' => $menuItemEntity->getMenuItemOrder(),
                    'menuItemActive' => $menuItemEntity->getMenuItemActive()
                );
            }
            
            
            $data[] = array(
                'menuId' => $entity->getMenuId(),
                'menuRoute' => $entity->getMenuRoute(),
                'menuName' => $entity->getMenuName(),
                'menuIcon' => $entity->getMenuIcon(),
                'menuOrder' => $entity->getMenuOrder(),
                'menuLocation' => $entity->getMenuLocation(),
                'menuActive' => $entity->getMenuActive(),
                'menuItems' => $menuItem
            );
        }
    
        
        return new JsonModel(array(
            'content' => $data,
            'page' => $page,
            'countPerPage' => $countPerPage,
            'itemCount' => $paginator->getTotalItemCount(),
            'pageCount' => $paginator->count(),
        ));
    
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::head()
     */
    public function head($id)
    {
        $this->response->setStatusCode(405);
    
        return new JsonModel(array(
            'content' => 'Method Not Allowed'
        ));
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::options()
     */
    public function options()
    {
        $this->response->setStatusCode(405);
    
        return new JsonModel(array(
            'content' => 'Method Not Allowed'
        ));
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::patch()
     */
    public function patch($id, $data)
    {
        $this->response->setStatusCode(405);
    
        return new JsonModel(array(
            'content' => 'Method Not Allowed'
        ));
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::replaceList()
     */
    public function replaceList($data)
    {
        $this->response->setStatusCode(405);
    
        return new JsonModel(array(
            'content' => 'Method Not Allowed'
        ));
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::patchList()
     */
    public function patchList($data)
    {
        $this->response->setStatusCode(405);
    
        return new JsonModel(array(
            'content' => 'Method Not Allowed'
        ));
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::update()
     */
    public function update($id, $data)
    {
        $this->response->setStatusCode(405);
    
        return new JsonModel(array(
            'content' => 'Method Not Allowed'
        ));
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::notFoundAction()
     */
    public function notFoundAction()
    {
        $this->response->setStatusCode(404);
    
        return new JsonModel(array(
            'content' => 'Method Not Allowed'
        ));
    }
}

