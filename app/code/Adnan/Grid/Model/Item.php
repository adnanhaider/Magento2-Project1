<?php

namespace Adnan\Grid\Model;
use Magento\Framework\Model\AbstractModel;

class Item extends AbstractModel{

    protected function _construct(){
        $this->_init(\Adnan\Grid\Model\ResourceModel\Item::class);
    }
}