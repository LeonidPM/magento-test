<?php

namespace LM\Tasks\Model;
use Magento\Framework\Model\AbstractModel;

class Lists extends AbstractModel {
	protected function _construct() {
		$this->_init('LM\Tasks\Model\Resource\Lists');
	}
}
?>