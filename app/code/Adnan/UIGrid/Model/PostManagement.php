<?php 
namespace Adnan\UIGrid\Model;
use Adnan\UIGrid\Model\ItemFactory;

 
class PostManagement {
    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    private $jsonResultFactory;
    protected $_productCollectionFactory;

    public function __construct(\Magento\Backend\Block\Template\Context $context,        
    \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory ,
    \Magento\Framework\Controller\Result\JsonFactory $jsonResultFactory
    // array $data = []
    )
    {
        $this->_productCollectionFactory = $productCollectionFactory;    
        // parent::__construct($context, $data);
        $this->jsonResultFactory = $jsonResultFactory;
        
    }

	/**
	 * {@inheritdoc}
	*/

	public function getPost()
	{
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $result = $this->jsonResultFactory->create();
        $result->setData($collection->getData());
        return $collection->getData();
	}
}