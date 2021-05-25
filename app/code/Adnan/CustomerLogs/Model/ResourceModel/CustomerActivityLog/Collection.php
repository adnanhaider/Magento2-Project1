<?php
declare(strict_types=1);

namespace Adnan\CustomerLogs\Model\ResourceModel\CustomerActivityLog;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'customeractivitylog_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Adnan\CustomerLogs\Model\CustomerActivityLog::class,
            \Adnan\CustomerLogs\Model\ResourceModel\CustomerActivityLog::class
        );
    }
    
}

