<?php

namespace LM\Tasks\Block;

use \Magento\Framework\Data\Form\FormKey;

class Display extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \LM\Tasks\Model\ListsFactory
     */
    protected $_listsFactory;

    /**
     * @var FormKey
     */
    protected $formKey;

    /**
     * Display constructor.
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \LM\Tasks\Model\ListsFactory                     $listsFactory
     * @param FormKey                                          $formKey
     */

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \LM\Tasks\Model\ListsFactory $listsFactory,
        FormKey $formKey
    ) {
        $this->formKey = $formKey;
        $this->_listsFactory = $listsFactory;
        parent::__construct($context);
    }

    /**
     * @return string
     */
    public function getFormKey()
    {
        return $this->formKey->getFormKey();
    }

    /**
     * @return \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
     */
    public function getPostCollection()
    {
        $post = $this->_listsFactory->create();
        return $post->getCollection();
    }



}