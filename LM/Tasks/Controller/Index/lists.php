<?php

namespace LM\Tasks\Controller\Index;

class Lists extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @var \LM\Tasks\Model\ListsFactory
     */
    protected $_listsFactory;

    /**
     * Lists constructor.
     *
     * @param \Magento\Framework\App\Action\Context      $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \LM\Tasks\Model\ListsFactory               $listsFactory
     */

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \LM\Tasks\Model\ListsFactory $listsFactory
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_listsFactory = $listsFactory;

        return parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $post_add_task = $this->getRequest()->getPost('task');
        if (isset($post_add_task)) {
            $task = $this->_objectManager->create('LM\Tasks\Model\Lists');
            $task->setTask_body($post_add_task);
            $task->save();
        }

        $post_del_task = $this->getRequest()->getPost('t_list');

        if (!empty($post_del_task)) {
            $post = $this->_listsFactory->create();
            $collection = $post->getCollection();
            foreach ($post_del_task as $t) {
                foreach ($collection as $item) {
                    $elem = $item->getId();
                    if ($elem == $t) {
                        $item->delete();
                    }
                }
            }
        }

        return $this->_pageFactory->create();
    }
}
