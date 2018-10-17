<?php
namespace LM\Tasks\Setup;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface {
	public function install(SchemaSetupInterface $setup, ModuleContextInterface $context) {
		$installer = $setup;
		$installer->startSetup();
		$tableName = $installer->getTable('list_table');
		if ($installer->getConnection()->isTableExists($tableName) != true) {
			$table = $installer->getConnection()
				->newTable($tableName)
				->addColumn('id', Table::TYPE_INTEGER, null, [
					'identity' => true,
					'unsigned' => true,
					'nullable' => false,
					'primary' => true,
				], 'ID')
				->addColumn('task_body', Table::TYPE_TEXT, null, [
					'length' => 255,
					'nullable' => false,
				], 'TEXT')
				->setComment('List Table');
			$installer->getConnection()->createTable($table);
		}
		$installer->endSetup();
	}
}

