<?php 
namespace Adnan\UIGrid\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;


class Item extends AbstractDb{
    protected function _construct(){
        $this->_init('adnan_moduleone_item', 'id');
    }
}