<?php

class GroupFilter
{
    private $categoryId = null;
    public $parentId = null;

    /**
     * @param null $categoryId
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return null
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @return null
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * @param null $parentId
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
    }




}