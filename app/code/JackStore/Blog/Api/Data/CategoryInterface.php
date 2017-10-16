<?php

namespace JackStore\Blog\Api\Data;

interface CategoryInterface 
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const POST_ID_CATEGORY = 'post_id_category';	
    const CATEGORY_NAME = 'category_name';

    /**
     * Get Post Category ID
     *
     * @return int|null
     */
    public function getIdCategory();  

    /**
     * Get Post Category Name
     *
     * @return str|null
     */
    public function getPostCategoryName();     

    /**
     * Set Post Id Category
     *
     * @param int $postIdCategory
     * @return \JackStore\Blog\Api\Data\CategoryInterface
     */    
    public function setPostIdCategory($postIdCategory);   

    /**
     * Set Post Category Name
     *
     * @param int $getPostCategoryName
     * @return \JackStore\Blog\Api\Data\PostInterface
     */    
    public function setPostCategoryName($postCategoryName);       
}





