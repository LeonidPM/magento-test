<?php

namespace LM\Tasks\Model\Resource\Lists;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection {
	protected function _construct() {
		$this->_init(
			'LM\Tasks\Model\Lists',
			'LM\Tasks\Model\Resource\Lists'
		);
	}
}
?>