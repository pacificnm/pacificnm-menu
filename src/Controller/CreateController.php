<?php
namespace Pacificnm\Menu\Controller;

use Pacificnm\Controller\AbstractApplicationController;
use Zend\View\Model\ViewModel;
use Pacificnm\Menu\Service\ServiceInterface;
use Pacificnm\Menu\Form\Form;

class CreateController extends AbstractApplicationController
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
        $this->form = $form;
        
        $this->service = $service;
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
        
        $request = $this->getRequest();

        if ($request->isPost()) {
        	$postData = $request->getPost();

        	$this->form->setData($postData);

        	if ($this->form->isValid()) {
        		$entity = $this->form->getData();

        		$menuEntity = $this->service->save($entity);

        		$this->getEventManager()->trigger('menuCreate', $this, array(
        			'authId' => $this->identity()->getAuthId(),
        			'requestUrl' => $this->getRequest()->getUri(),
        			'menuEntity' => $menuEntity
        		));

        		$this->flashMessenger()->addSuccessMessage('Object was saved');

        		return $this->redirect()->toRoute('menu-view', array(
        			'id' => $menuEntity->getMenuId()
        		));
        	}
        }

        return new ViewModel(array(
        	'form' => $this->form
        ));
    }
}

