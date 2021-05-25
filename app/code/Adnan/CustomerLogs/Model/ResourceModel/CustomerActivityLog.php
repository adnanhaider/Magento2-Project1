<?php
declare(strict_types=1);

namespace Adnan\CustomerLogs\Model\ResourceModel;

class CustomerActivityLog extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('CustomerActivityLog', 'id');
    }
}

