<?php

namespace JackStore\Blog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Category Resource Model
 * @category JackStore
 * @package  JackStore_Category
 * @module   Category
 * @author   JackStore Developer
 */
class Category extends AbstractDb
{
    /**
     * construct
     * @return void
     */
    protected function _construct()
    {
        $this->_init('jack_blog_post_category', 'post_id_category');
    }
}
