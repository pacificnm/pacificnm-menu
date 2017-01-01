<?php
namespace Pacificnm\Menu\Entity;

use Pacificnm\MenuItem\Entity\Entity as MenuItemEntity;

class Entity
{

    /**
     *
     * @var number
     */
    protected $menuId;

    /**
     *
     * @var string
     */
    protected $menuRoute;

    /**
     *
     * @var string
     */
    protected $menuName;

    /**
     *
     * @var string
     */
    protected $menuIcon;

    /**
     *
     * @var number
     */
    protected $menuOrder;

    /**
     *
     * @var string
     */
    protected $menuLocation;

    /**
     *
     * @var bool
     */
    protected $menuActive;

    /**
     *
     * @var MenuItemEntity
     */
    protected $menuItemEntity;

    /**
     *
     * @return the $menuId
     */
    public function getMenuId()
    {
        return $this->menuId;
    }

    /**
     *
     * @return the $menuRoute
     */
    public function getMenuRoute()
    {
        return $this->menuRoute;
    }

    /**
     *
     * @return the $menuName
     */
    public function getMenuName()
    {
        return $this->menuName;
    }

    /**
     *
     * @return the $menuIcon
     */
    public function getMenuIcon()
    {
        return $this->menuIcon;
    }

    /**
     *
     * @return the $menuOrder
     */
    public function getMenuOrder()
    {
        return $this->menuOrder;
    }

    /**
     *
     * @return the $menuLocation
     */
    public function getMenuLocation()
    {
        return $this->menuLocation;
    }

    /**
     *
     * @return the $menuActive
     */
    public function getMenuActive()
    {
        return $this->menuActive;
    }

    /**
     *
     * @return the $menuItemEntity
     */
    public function getMenuItemEntity()
    {
        return $this->menuItemEntity;
    }

    /**
     *
     * @param number $menuId            
     */
    public function setMenuId($menuId)
    {
        $this->menuId = $menuId;
    }

    /**
     *
     * @param string $menuRoute            
     */
    public function setMenuRoute($menuRoute)
    {
        $this->menuRoute = $menuRoute;
    }

    /**
     *
     * @param string $menuName            
     */
    public function setMenuName($menuName)
    {
        $this->menuName = $menuName;
    }

    /**
     *
     * @param string $menuIcon            
     */
    public function setMenuIcon($menuIcon)
    {
        $this->menuIcon = $menuIcon;
    }

    /**
     *
     * @param number $menuOrder            
     */
    public function setMenuOrder($menuOrder)
    {
        $this->menuOrder = $menuOrder;
    }

    /**
     *
     * @param string $menuLocation            
     */
    public function setMenuLocation($menuLocation)
    {
        $this->menuLocation = $menuLocation;
    }

    /**
     *
     * @param boolean $menuActive            
     */
    public function setMenuActive($menuActive)
    {
        $this->menuActive = $menuActive;
    }

    /**
     *
     * @param \MenuItem\Entity\Entity $menuItemEntity            
     */
    public function setMenuItemEntity($menuItemEntity)
    {
        $this->menuItemEntity = $menuItemEntity;
    }
}

