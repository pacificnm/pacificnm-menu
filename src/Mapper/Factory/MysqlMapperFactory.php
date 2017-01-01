<?php
namespace Pacificnm\Menu\Mapper\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Hydrator\Aggregate\AggregateHydrator;
use Pacificnm\Menu\Hydrator\Hydrator;
use Pacificnm\Menu\Entity\Entity;
use Pacificnm\Menu\Mapper\MysqlMapper;

class MysqlMapperFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\Menu\Mapper\MysqlMapper
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $hydrator = new AggregateHydrator();
    
        $hydrator->add(new Hydrator());
    
        $prototype = new Entity();
    
        $readAdapter = $serviceLocator->get('db2');
    
        $writeAdapter = $serviceLocator->get('db1');
    
        return new MysqlMapper($readAdapter, $writeAdapter, $hydrator, $prototype);
    }
}

