<?php
namespace Menu\Mapper\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Hydrator\Aggregate\AggregateHydrator;
use Menu\Hydrator\Hydrator;
use Menu\Entity\Entity;
use Menu\Mapper\MysqlMapper;

class MysqlMapperFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Menu\Mapper\MysqlMapper
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

