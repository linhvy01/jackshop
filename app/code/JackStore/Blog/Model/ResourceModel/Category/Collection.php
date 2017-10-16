<?php

namespace JackStore\Blog\Model\ResourceModel\Category;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * _contruct
     * @return void
     */
    protected function _construct()
    {
        $this->_init('JackStore\Blog\Model\Category', 'JackStore\Blog\Model\ResourceModel\Category');
    }	
}

