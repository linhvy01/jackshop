<?php 

namespace JackStore\Blog\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        $table = $installer->getConnection()
            ->newTable($installer->getTable('jack_blog_post'))
            ->addColumn(
                'post_id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true],
                'Post ID'
            )
            ->addColumn('title', Table::TYPE_TEXT, 255, ['nullable' => false], 'Post Title')
           ->addColumn('post_image', Table::TYPE_TEXT, 255, ['nullable' => false], 'Post Image')   
           ->addColumn('description', Table::TYPE_TEXT, 255, ['nullable' => false], 'Description')   
           ->addColumn('sort_type', Table::TYPE_INTEGER, 10, ['nullable' => true], 'Sort Type')                            
            ->addColumn('post_content', Table::TYPE_TEXT, 255, [], 'Post Content')
            ->addColumn('is_active', Table::TYPE_SMALLINT, null, ['nullable' => false, 'default' => '1'], 'Post Status')
            ->addColumn('creation_time', Table::TYPE_DATETIME, null, ['nullable' => false], 'Creation Time')
            ->addColumn('update_time', Table::TYPE_DATETIME, null, ['nullable' => false], 'Update Time')
            ->addColumn('post_id_category', Table::TYPE_INTEGER, null, ['nullable' => false], 'Post Id Category')            
            ->addIndex($installer->getIdxName('jack_blog_post', ['post_id']), ['post_id'])
            ->addIndex($installer->getIdxName('jack_blog_post', ['is_active']), ['is_active'])   
            ->addForeignKey(
                        $installer->getFkName(
                            'jack_blog_post',
                            'post_id_category',
                            'jack_blog_post_category',
                            'post_id_category'
                        ),
                        'post_id_category',
                        $installer->getTable('jack_blog_post_category'),
                        'post_id_category',
                        Table::ACTION_CASCADE
                    )                       
            ->setComment('Jack Blog Post Table');

        $installer->getConnection()->createTable($table);

        if (! $installer->tableExists('jack_blog_post_category')) {
            $table = $installer->getConnection()
                ->newTable($installer->getTable('jack_blog_post_category'));
            $table->addColumn(
                'post_id_category',
                Table::TYPE_INTEGER,
                null,
                [
                    'unsigned' => true,
                    'nullable' => false,
                    'primary'  => true,
                ],
                'Post Id Category'
            )
            ->addColumn('category_name', Table::TYPE_TEXT, 255, ['nullable' => false], 'Category Name')            
            ->addIndex($installer->getIdxName('jack_blog_post_category', ['post_id_category']), ['post_id_category']) 
            ->addIndex($installer->getIdxName('jack_blog_post_category', ['category_name']), ['category_name'])                                     
                ->setComment('Jack Blog Post Category');
            $installer->getConnection()->createTable($table);
        }        

        $installer->endSetup();
    }

}