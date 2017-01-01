<?php
namespace Pacificnm\Menu\Service;

use Pacificnm\Menu\Entity\Entity;
use Zend\Paginator\Paginator;

interface ServiceInterface
{

    /**
     *
     * @param array $filter            
     * @return Paginator
     */
    public function getAll($filter);

    /**
     *
     * @param number $id            
     * @return Entity
     */
    public function get($id);

    /**
     *
     * @param string $menuName
     * @return Entity
     */
    public function getMenuByName($menuName);
    
    
    /**
     *
     * @param Entity $entity            
     * @return Entity
     */
    public function save(Entity $entity);

    /**
     *
     * @param Entity $entity            
     * @return bool
     */
    public function delete(Entity $entity);
}

