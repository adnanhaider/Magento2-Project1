<?php 

namespace Adnan\UIGrid\Model\ResourceModel\Item;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Adnan\UIGrid\Model\Item;
use Adnan\UIGrid\Model\ResourceModel\Item as ItemResource;

class Collection extends AbstractCollection{
    protected $_idFieldName = 'id';

    protected function _construct(){
        $this->_init(Item::class, ItemResource::class);
    }
}