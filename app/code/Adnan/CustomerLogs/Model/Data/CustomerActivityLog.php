<?php
declare(strict_types=1);

namespace Adnan\CustomerLogs\Model\Data;

use Adnan\CustomerLogs\Api\Data\CustomerActivityLogInterface;

class CustomerActivityLog extends \Magento\Framework\Api\AbstractExtensibleObject implements CustomerActivityLogInterface
{

    /**
     * Get customeractivitylog_id
     * @return string|null
     */
    public function getCustomeractivitylogId()
    {
        return $this->_get(self::CUSTOMERACTIVITYLOG_ID);
    }

    /**
     * Set customeractivitylog_id
     * @param string $customeractivitylogId
     * @return \Adnan\CustomerLogs\Api\Data\CustomerActivityLogInterface
     */
    public function setCustomeractivitylogId($customeractivitylogId)
    {
        return $this->setData(self::CUSTOMERACTIVITYLOG_ID, $customeractivitylogId);
    }

    /**
     * Get order_id
     * @return string|null
     */
    public function getOrderId()
    {
        return $this->_get(self::ORDER_ID);
    }

    /**
     * Set order_id
     * @param string $orderId
     * @return \Adnan\CustomerLogs\Api\Data\CustomerActivityLogInterface
     */
    public function setOrderId($orderId)
    {
        return $this->setData(self::ORDER_ID, $orderId);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Adnan\CustomerLogs\Api\Data\CustomerActivityLogExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Adnan\CustomerLogs\Api\Data\CustomerActivityLogExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Adnan\CustomerLogs\Api\Data\CustomerActivityLogExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->_get(self::CREATED_AT);
    }

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Adnan\CustomerLogs\Api\Data\CustomerActivityLogInterface
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * Get log_id
     * @return string|null
     */
    public function getLogId()
    {
        return $this->_get(self::LOG_ID);
    }

    /**
     * Set log_id
     * @param string $logId
     * @return \Adnan\CustomerLogs\Api\Data\CustomerActivityLogInterface
     */
    public function setLogId($logId)
    {
        return $this->setData(self::LOG_ID, $logId);
    }
}

