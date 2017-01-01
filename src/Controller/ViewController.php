<?php
namespace Pacificnm\Menu\Controller;

use Pacificnm\Controller\AbstractApplicationController;
use Zend\View\Model\ViewModel;
use Pacificnm\Menu\Service\ServiceInterface;
use Pacificnm\MenuItem\Service\ServiceInterface as MenuItemServiceInterface;

class ViewController extends AbstractApplicationController
{

    /**
     *
     * @var ServiceInterface
     */
    protected $service;

    /**
     *
     * @var MenuItemServiceInterface
     */
    protected $menuItemService;

    /**
     *
     * @param ServiceInterface $service            
     * @param MenuItemServiceInterface $menuItemService            
     */
    public function __construct(ServiceInterface $service, MenuItemServiceInterface $menuItemService)
    {
        $this->service = $service;
        
        $this->menuItemService = $menuItemService;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Application\Controller\AbstractApplicationController::indexAction()
     */
    public function indexAction()
    {
        parent::indexAction();
        
        $id = $this->params()->fromRoute('id');
        
        $entity = $this->service->get($id);
        
        if (! $entity) {
            $this->flashMessenger()->addErrorMessage('Object was not found');
            return $this->redirect()->toRoute('controller-index');
        }
        
        $menuItemEntitys = $this->menuItemService->getAll(array(
            'menuId' => $id,
            'pagination' => 'off'
        ));
        
        $this->getEventManager()->trigger('menuView', $this, array(
            'authId' => $this->identity()->getAuthId(),
            'requestUrl' => $this->getRequest()->getUri(),
            'menuEntity' => $entity
        ));
        
        return new ViewModel(array(
            'entity' => $entity,
            'menuItemEntitys' => $menuItemEntitys
        ));
    }
}

