<?php
namespace Pacificnm\Menu\Mapper;

use Zend\Hydrator\HydratorInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Update;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Delete;
use Application\Mapper\AbstractMysqlMapper;
use Pacificnm\Menu\Entity\Entity;

class MysqlMapper extends AbstractMysqlMapper implements MysqlMapperInterface
{

    /**
     *
     * @param AdapterInterface $readAdapter            
     * @param AdapterInterface $writeAdapter            
     * @param HydratorInterface $hydrator            
     * @param Entity $prototype            
     */
    public function __construct(AdapterInterface $readAdapter, AdapterInterface $writeAdapter, HydratorInterface $hydrator, Entity $prototype)
    {
        $this->hydrator = $hydrator;
        
        $this->prototype = $prototype;
        
        parent::__construct($readAdapter, $writeAdapter);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Pacificnm\Menu\Mapper\MysqlMapperInterface::getAll()
     */
    public function getAll($filter)
    {
        $this->select = $this->readSql->select('menu');
        
        $this->filter($filter);
        
        $this->select->order('menu_order');
        
        // if pagination is disabled
        if (array_key_exists('pagination', $filter)) {
            if ($filter['pagination'] == 'off') {
                return $this->getRows();
            }
        }
        
        return $this->getPaginator();
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Pacificnm\Menu\Mapper\MysqlMapperInterface::get()
     */
    public function get($id)
    {
        $this->select = $this->readSql->select('menu');
        
        $this->select->where(array(
            'menu.menu_id = ?' => $id
        ));
        
        return $this->getRow();
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Pacificnm\Menu\Mapper\MysqlMapperInterface::getMenuByName()
     */
    public function getMenuByName($menuName)
    {
        $this->select = $this->readSql->select('menu');
        
        $this->select->where(array(
            'menu.menu_name = ?' => $menuName
        ));
        
        return $this->getRow();
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Pacificnm\Menu\Mapper\MysqlMapperInterface::save()
     */
    public function save(Entity $entity)
    {
        $postData = $this->hydrator->extract($entity);
        
        // if we have id then its an update
        if ($entity->getMenuId()) {
            $this->update = new Update('menu');
            
            $this->update->set($postData);
            
            $this->update->where(array(
                'menu.menu_id = ?' => $entity->getMenuId()
            ));
            
            $this->updateRow();
        } else {
            $this->insert = new Insert('menu');
            
            $this->insert->values($postData);
            
            $id = $this->createRow();
            
            $entity->setMenuId($id);
        }
        
        return $this->get($entity->getMenuId());
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Pacificnm\Menu\Mapper\MysqlMapperInterface::delete()
     */
    public function delete(Entity $entity)
    {
        $this->delete = new Delete('menu');
        
        $this->delete->where(array(
            'menu.menu_id = ?' => $entity->getMenuId()
        ));
        
        return $this->deleteRow();
    }

    /**
     *
     * @param array $filter            
     * @return \Pacificnm\Menu\Mapper\MysqlMapper
     */
    protected function filter($filter)
    {
        
        // menuLocation
        if (array_key_exists('menuLocation', $filter) && strlen($filter['menuLocation']) > 0) {
            $this->select->where(array(
                'menu.menu_location = ?' => $filter['menuLocation']
            ));
        }
        
        // menuName
        if (array_key_exists('menuName', $filter) && strlen($filter['menuLocation']) > 0) {
            $this->select->where->like('menu.menu_name', $filter['menuName'] . '%');
        }
        
        // menuRoute
        if (array_key_exists('menuRoute', $filter) && strlen($filter['menuLocation']) > 0) {
            $this->select->where->like('menu.menu_route', $filter['menuRoute'] . '%');
        }
        
        // menuActive
        if (array_key_exists('menuActive', $filter) && strlen($filter['menuLocation']) > 0) {
            $this->select->where(array(
                'menu.menu_active = ?' => $filter['menuActive']
            ));
        }
        return $this;
    }
}

