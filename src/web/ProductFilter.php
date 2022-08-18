<?php

class ProductFilter
{
    public $parentId = null;
    public $groupId = null;

    /**
     * @param null $parentId
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
    }

    public function setGroupId($id)
    {
        $this->groupId = $id;
    }

    /**
     * @return null
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * @return null
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    public function addId()
    {

    }

}