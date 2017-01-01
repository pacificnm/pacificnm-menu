<?php
namespace Pacificnm\Menu\Controller;

use Pacificnm\Controller\AbstractApplicationController;
use Zend\View\Model\ViewModel;
use Pacificnm\Menu\Service\ServiceInterface;
use Pacificnm\Menu\Form\Form;

class UpdateController extends AbstractApplicationController
{
    /**
     * 
     * @var ServiceInterface
     */
    protected $service;
    
    /**
     * 
     * @var Form
     */
    protected $form;
    
    /**
     * 
     * @param ServiceInterface $service
     * @param Form $form
     */
    public function __construct(ServiceInterface $service, Form $form)
    {
        $this->service = $service;
        
        $this->form = $form;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \Application\Controller\AbstractApplicationController::indexAction()
     */
    public function indexAction()
    {
        parent::indexAction();
        
        $request = $this->getRequest();
        
        $id = $this->params()->fromRoute('id');
        
        $entity = $this->service->get($id);
        
        if (! $entity) {
            $this->flashMessenger()->addErrorMessage('Object was not found');
            return $this->redirect()->toRoute('controller-index');
        }
        
        if ($request->isPost()) {
            $postData = $request->getPost();
        
            $this->form->setData($postData);
        
            if ($this->form->isValid()) {
                $entity = $this->form->getData();
        
                $menuEntity = $this->service->save($entity);
        
                $this->getEventManager()->trigger('menuUpdate', $this, array(
                    'authId' => $this->identity()->getAuthId(),
                    'requestUrl' => $this->getRequest()->getUri(),
                    'menuEntity' => $menuEntity
                ));
        
                $this->flashMessenger()->addSuccessMessage('Menu was saved');
        
                return $this->redirect()->toRoute('menu-view', array(
                    'id' => $menuEntity->getMenuId()
                ));
            }
        }
        
        $this->form->bind($entity);
        
        return new ViewModel(array(
            'form' => $this->form,
            'entity' => $entity
        ));
    }
}

