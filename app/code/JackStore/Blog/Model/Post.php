<?php

namespace JackStore\Blog\Model;

use JackStore\Blog\Api\Data\PostInterface;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class Post extends AbstractModel implements PostInterface, IdentityInterface
{
    /**#@+
     * Post's Statuses
     */
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    const BASE_MEDIA_PATH = 'JackStore/Blog/images';    
    /**#@-*/

    /**
     * CMS page cache tag
     */
    const CACHE_TAG = 'blog_post';

    /**
	 * @var string    
     */
    protected $_cacheTag = 'blog_post';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'blog_post';

    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $_urlBuilder;    

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource|null $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb|null $resourceCollection
     * @param \Magento\Framework\UrlInterface $urlBuilder
     * @param array $data
     */
    function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\UrlInterface $urlBuilder,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = [])
    {
        $this->_urlBuilder = $urlBuilder;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }    

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('JackStore\Blog\Model\ResourceModel\Post');
    }  

   

    /**
     * Prepare post's statuses.
     * Available event blog_post_get_available_statuses to customize statuses.
     *
     * @return array
     */
    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
    }

    /**
     * Return unique ID(s) for each object in system
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->getData(self::POST_ID);
    }   
    
    /**
     * Get Post Title
     *
     * @return str|null
     */
    public function getTitle()
    {
        return $this->getData(self::POST_TITLE);
    }  

    /**
     * Get Post Image
     *
     * @return str|null
     */
    public function getImage()
    {
        return $this->getData(self::POST_IMAGE);
    }

    /**
     * Get Post Description
     *
     * @return str|null
     */
    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * Get Sort Type
     *
     * @return str|null
     */
    public function getSortType()
    {
        return $this->getData(self::SORT_TYPE);
    }   

    /**
     * Get Post Content
     *
     * @return str|null
     */
    public function getContent()
    {
        return $this->getData(self::POST_CONTENT);
    }    

    /**
     * Get Post Status
     *
     * @return smallint|null
     */
    public function getStatus()
    {
        return $this->getData(self::POST_STATUS);
    } 

    /**
     * Get url key
     *
     * @return string|null
     */
    public function getUrlKey()
    {
        return $this->getData(self::URL_KEY);
    }     

    /**
     * Return the desired URL of a post
     *  eg: /blog/view/index/id/1/
     * @TODO Move to a PostUrl model, and make use of the
     * @TODO rewrite system, using url_key to build url.
     * @TODO desired url: /blog/my-latest-blog-post-title
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->_urlBuilder->getUrl('blog/' . $this->getUrlKey());
    }    

    /**
     * Get Id Category
     *
     * @return int|null
     */
    public function getIdCategory()
    {
        return $this->getData(self::POST_ID_CATEGORY);
    }   

    /**
     * Get Post Creation Time
     *
     * @return str|null
     */
    public function getCreationTime()
    {
        return $this->getData(self::CREATION_TIME);
    }  

    /**
     * Get Post Update Time
     *
     * @return str|null
     */
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    } 

    /**
     * Is active
     *
     * @return bool|null
     */
    // public function isActive()
    // {
    //     return (bool) $this->getData(self::IS_ACTIVE);
    // }   
    
    /**
     * Set ID
     *
     * @param int $id
     * @return \JackStore\Blog\Api\Data\PostInterface
     */
    public function setId($id)
    {
        return $this->setData(self::POST_ID, $id);
    }

    /**
     * Set Post Title
     *
     * @param str $title
     * @return \JackStore\Blog\Api\Data\PostInterface
     */
    public function setTitle($id)
    {
        return $this->setData(self::POST_TITLE, $title);
    }  

    /**
     * Set Post Image
     *
     * @param str $image
     * @return \JackStore\Blog\Api\Data\PostInterface
     */
    public function setImage($id)
    {
        return $this->setData(self::POST_IMAGE, $image);
    }  

    /**
     * Set Description
     *
     * @param str $des
     * @return \JackStore\Blog\Api\Data\PostInterface
     */
    public function setDescription($des)
    {
        return $this->setData(self::DESCRIPTION, $des);
    }        

    /**
     * Set url key
     *
     * @param str $url_key
     * @return \JackStore\Blog\Api\Data\PostInterface
     */
    public function setUrlKey($url_key)
    {
        return $this->setData(self::URL_KEY, $url_key);
    }    

    /**
     * Set Sort Type
     *
     * @param int $st
     * @return \JackStore\Blog\Api\Data\PostInterface
     */
    public function setSortType($st)
    {
        return $this->setData(self::SORT_TYPE, $st);
    } 

    /**
     * Set Post Content
     *
     * @param str $content
     * @return \JackStore\Blog\Api\Data\PostInterface
     */
    public function setContent($content)
    {
        return $this->setData(self::POST_CONTENT, $content);
    }    

    /**
     * Set Post Status
     *
     * @param smallint $status
     * @return \JackStore\Blog\Api\Data\PostInterface
     */
    public function setStatus($status)
    {
        return $this->setData(self::POST_STATUS, $status);
    } 

    /**
     * Set Id Category
     *
     * @param int $idCategory
     * @return \JackStore\Blog\Api\Data\PostInterface
     */
    public function setPostIdCategory($postIdCategory)
    {
        return $this->setData(self::POST_ID_CATEGORY, $postIdCategory);
    }     

    /**
     * Set Creation Time
     *
     * @param int $creationTime
     * @return \JackStore\Blog\Api\Data\PostInterface
     */
    public function setCreationTime($creationTime)
    {
        return $this->setData(self::CREATION_TIME, $creationTime);
    }  

    /**
     * Set Update Time
     *
     * @param int $updateTime
     * @return \JackStore\Blog\Api\Data\PostInterface
     */
    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }          

}



