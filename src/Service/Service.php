<?php
namespace Pacificnm\Menu\Service;

use Pacificnm\Menu\Entity\Entity;
use Pacificnm\Menu\Mapper\MysqlMapperInterface;
use Pacificnm\MenuItem\Service\ServiceInterface as MenuItemServiceInterface;

class Service implements ServiceInterface
{
    /**
     * 
     * @var MysqlMapperInterface
     */
    protected $mapper;
    
    protected $menuItemService;
    
    /**
     * 
     * @param MysqlMapperInterface $mapper
     * @param MenuItemServiceInterface $menuItemService
     */
    public function __construct(MysqlMapperInterface $mapper, MenuItemServiceInterface $menuItemService)
    {
        $this->mapper = $mapper;
        
        $this->menuItemService = $menuItemService;
    }

    /**
     * 
     * {@inheritDoc}
     * @see \Pacificnm\Menu\Service\ServiceInterface::getAll()
     */
    public function getAll($filter)
    {
        $menuEntitys = $this->mapper->getAll($filter);
        
        foreach($menuEntitys as $menuEntity) {
            $menuItemEntitys = $this->menuItemService->getMenuItems($menuEntity->getMenuId());
            
            $menuEntity->setMenuItemEntity($menuItemEntitys);
            
        }
        
        return $menuEntitys;
    }

    /**
     * 
     * {@inheritDoc}
     * @see \Pacificnm\Menu\Service\ServiceInterface::get()
     */
    public function get($id)
    {
        return $this->mapper->get($id);
    }

    /**
     * 
     * {@inheritDoc}
     * @see \Pacificnm\Menu\Service\ServiceInterface::save()
     */
    public function save(Entity $entity)
    {
        return $this->mapper->save($entity);
    }

    /**
     * 
     * {@inheritDoc}
     * @see \Pacificnm\Menu\Service\ServiceInterface::getMenuByName()
     */
    public function getMenuByName($menuName)
    {
        return $this->mapper->getMenuByName($menuName);
    }

    /**
     * 
     * {@inheritDoc}
     * @see \Pacificnm\Menu\Service\ServiceInterface::delete()
     */
    public function delete(Entity $entity)
    {
        return $this->mapper->delete($entity);
    }
}

