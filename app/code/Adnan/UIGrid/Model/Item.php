<?php

namespace Adnan\UIGrid\Model;
use Magento\Framework\Model\AbstractModel;

class Item extends AbstractModel{

    protected function _construct(){
        $this->_init(\Adnan\UIGrid\Model\ResourceModel\Item::class);
    }
}