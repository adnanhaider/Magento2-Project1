<?php
namespace Adnan\UIGrid\Ui\DataProvider\Category\Component\Listing\Column;
 
use \Magento\Sales\Api\OrderRepositoryInterface;
use \Magento\Framework\View\Element\UiComponent\ContextInterface;
use \Magento\Framework\View\Element\UiComponentFactory;
use \Magento\Ui\Component\Listing\Columns\Column;
use \Magento\Framework\Api\SearchCriteriaBuilder;
use \Adnan\UIGrid\Model\ItemFactory;
 
class Mycolumn extends Column
{
 
    protected $_orderRepository;
    protected $_searchCriteria;
    protected $_customfactory;
 
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        OrderRepositoryInterface $orderRepository,
        SearchCriteriaBuilder $criteria,
        ItemFactory $customFactory,
        array $components = [], array $data = [])
    {
        $this->_orderRepository = $orderRepository;
        $this->_searchCriteria  = $criteria;
        $this->_customfactory = $customFactory;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }
 
    public function prepareDataSource(array $dataSource)
    {
        // return "this is a string";
        
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $order  = $this->_orderRepository->get($item["entity_id"]);
 
                $order_id = $order->getEntityId();
                // $collection = $this->_customfactory->create()->getCollection();
                // $collection->addFieldToFilter('order_id',$order_id);
 
                // $data = $collection->getFirstItem();
                // echo "<pre>";
                // var_dump($collection);
                // die('l');
 
                // $item[$this->getData('name')] = $data->getShortName();
                $items = $order->getAllItems();
                // $item[$this->getData('name')] = $items[0]->getName();
                $temp = array();
                foreach( $items as $_item){
                    $val = $_item->getName();
                    array_push($temp, $val);
                }
                $item[$this->getData('name')] = $temp;
            }
        }
        return $dataSource;
    }
}