<?php

namespace LM\Tasks\Model\Resource;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Lists extends AbstractDb {
	protected function _construct() {
		$this->_init('list_table', 'id');
	}
}
?>