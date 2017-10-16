<?php
namespace JackStore\Blog\Setup;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
/**
 * @codeCoverageIgnore
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '0.0.2') < 0) {
            $installer = $setup;
            $installer->startSetup();
            $installer->getConnection()->addColumn(
                $installer->getTable('jack_blog_post'),
                'url_key',
                array(
                    'type' => Table::TYPE_TEXT,
                    'nullable' => true,
                    'length' => '1k',
                    'comment' => 'URL Key',
                    'default' => null
                )
            );
            $installer->endSetup();
        }
    }
}