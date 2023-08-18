<?php
/**
 * Neta\Shopware\SDK\Entity.
 *
 * Copyright 2016 LeadCommerce
 *
 * @author    Alexander Mahrt <amahrt@leadcommerce.de>
 * @copyright 2016 LeadCommerce <amahrt@leadcommerce.de>
 */

namespace Neta\Shopware\SDK\Entity;

/**
 * Class Category.
 */
class Category extends Base
{
    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var int
     */
    protected $parentId;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Category
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * @param int $parentId
     *
     * @return Category
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

}
