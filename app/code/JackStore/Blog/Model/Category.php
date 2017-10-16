<?php

namespace JackStore\Blog\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\Context;
use Magento\Framework\Registry;
use Magento\Framework\Model\ResourceModel\AbstractResource;
use Magento\Framework\Data\Collection\AbstractDb;
use JackStore\Blog\Model\CategoryFactory;
use JackStore\Blog\Model\ResourceModel\Post\CollectionFactory;
use JackStore\Blog\Api\Data\CategoryInterface;



class Category extends AbstractModel
{
    /**
     * Cache tag
     *
     * @var string
     */
    const CACHE_TAG = 'blog_post_category';

    /**
     * Cache tag
     *
     * @var string
     */
    protected $_cacheTag = 'blog_post_category';

    /**
     * Event prefix
     *
     * @var string
     */
    protected $_eventPrefix = 'blog_post_category';

    /**
     * Category Collection
     *
     * @var \JackStore\Blog\Model\ResourceModel\Category\Collection
     */
    public $categoryCollection;

    /**
     * Blog Category Factory
     *
     * @var \JackStore\Blog\Model\CategoryFactory
     */
    public $categoryFactory;

    /**
     * Category Collection Factory
     *
     * @var \JackStore\Blog\Model\ResourceModel\Category\CollectionFactory
     */
    public $categoryCollectionFactory; 

    /**
     * constructor
     *
     * @param \JackStore\Blog\Model\CategoryFactory $categoryFactory
     * @param \JackStore\Blog\Model\ResourceModel\Category\CollectionFactory $categoryCollectionFactory
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb $resourceCollection
     * @param array $data
     */    
    public function __construct(
        CategoryFactory $categoryFactory,
        CollectionFactory $categoryCollectionFactory,
        Context $context,
        Registry $registry,
        AbstractResource $resource = null,
        AbstractDb $resourceCollection = null,  
        array $data = []  	
    )
    {
        $this->categoryFactory       = $categoryFactory;
        $this->categoryCollectionFactory = $categoryCollectionFactory;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('JackStore\Blog\Model\ResourceModel\Category');
    }
    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Get Post Id Category
     *
     * @return int|null
     */
    public function getIdCategory()
    {
        return $this->getData(self::POST_ID_CATEGORY);
    }  
    
    /**
     * Get Id 
     *
     * @return int|null
     */
    public function getPostCategoryName()
    {
        return $this->getData(self::CATEGORY_NAME);
    }

    /**
     * Set Post Id Category
     *
     * @param int $postIdCategory
     * @return \JackStore\Blog\Api\Data\PostInterface
     */    
    public function setPostIdCategory($postIdCategory)
    {
        return $this->setData(self::POST_ID_CATEGORY, $postIdCategory);
    }  

    /**
     * Set ID
     *
     * @param int $id
     * @return \JackStore\Blog\Api\Data\PostInterface
     */
    public function setPostCategoryName($postCategoryName)
    {
        return $this->setData(self::CATEGORY_NAME, $postCategoryName);
    }                    
}





