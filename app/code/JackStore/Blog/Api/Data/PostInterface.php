<?php

namespace JackStore\Blog\Api\Data;

interface PostInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const POST_ID = 'post_id';
    const URL_KEY       = 'url_key';    
    const POST_TITLE = 'post_title';
    const POST_IMAGE = 'post_image';
    const DESCRIPTION = 'description';
    const SORT_TYPE = 'sort_type';
    const POST_CONTENT = 'content';
    const POST_STATUS = 'is_active';
    const CREATION_TIME = 'creation_time';
    const UPDATE_TIME = 'update_time';
    const POST_ID_CATEGORY = 'post_id_category';

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get Post Title
     *
     * @return string|null
     */       
    public function getTitle();

    /**
     * Get Post Image
     *
     * @return string|null
     */      
    public function getImage();    

    /**
     * Get Post Description
     *
     * @return string|null
     */      
    public function getDescription();  

    /**
     * Get Sort Type
     *
     * @return int|null
     */      
    public function getSortType();   

    /**
     * Get URL Key
     *
     * @return string
     */
    public function getUrlKey();       

    /**
     * Get Post Content
     *
     * @return string|null
     */      
    public function getContent();

    /**
     * Get Post Status
     *
     * @return smallint|null
     */      
    public function getStatus();    

    /**
     * Get Post Creation Time
     *
     * @return string|null
     */      
    public function getCreationTime();    
    /**
     * Get Post Update Time
     *
     * @return string|null
     */      
    public function getUpdateTime();

    /**
     * Get Post Id Category
     *
     * @return int|null
     */      
    public function getIdCategory();    

    /**
     * Set ID
     *
     * @param int $id
     * @return \JackStore\Blog\Api\Data\PostInterface
     */    
    public function setId($id);    

    /**
     * Set Post Title
     *
     * @param str $title
     * @return \JackStore\Blog\Api\Data\PostInterface
     */    
    public function setTitle($title);

    /**
     * Set Post Image
     *
     * @param str $image
     * @return \JackStore\Blog\Api\Data\PostInterface
     */    
    public function setImage($image);

    /**
     * Set Description
     *
     * @param str $des
     * @return \JackStore\Blog\Api\Data\PostInterface
     */    
    public function setDescription($des);  

    /**
     * Set URL Key
     *
     * @param string $url_key
     * @return \JackStore\Blog\Api\Data\PostInterface
     */
    public function setUrlKey($url_key);  

    /**
     * Return full URL including base url.
     *
     * @return mixed
     */
    public function getUrl();      

    /**
     * Set Sort Type
     *
     * @param int $st
     * @return \JackStore\Blog\Api\Data\PostInterface
     */    
    public function setSortType($st);

    /**
     * Set Post Content
     *
     * @param str $content
     * @return \JackStore\Blog\Api\Data\PostInterface
     */    
    public function setContent($content);

    /**
     * Set Post Status
     *
     * @param smallint $status
     * @return \JackStore\Blog\Api\Data\PostInterface
     */    
    public function setStatus($status);

    /**
     * Set Creation Time
     *
     * @param int $creationTime
     * @return \JackStore\Blog\Api\Data\PostInterface
     */    
    public function setCreationTime($creationTime);

    /**
     * Set Update Time
     *
     * @param int $updateTime
     * @return \JackStore\Blog\Api\Data\PostInterface
     */    
    public function setUpdateTime($updateTime);

    /**
     * Set Post Id Category
     *
     * @param int $postIdCategory
     * @return \JackStore\Blog\Api\Data\PostInterface
     */    
    public function setPostIdCategory($postIdCategory);
}


