<?php
declare(strict_types=1);

namespace Adnan\CustomerLogs\Api\Data;

interface CustomerActivityLogInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const CUSTOMERACTIVITYLOG_ID = 'customeractivitylog_id';
    const LOG_ID = 'log_id';
    const ORDER_ID = 'order_id';
    const CREATED_AT = 'created_at';

    /**
     * Get customeractivitylog_id
     * @return string|null
     */
    public function getCustomeractivitylogId();

    /**
     * Set customeractivitylog_id
     * @param string $customeractivitylogId
     * @return \Adnan\CustomerLogs\Api\Data\CustomerActivityLogInterface
     */
    public function setCustomeractivitylogId($customeractivitylogId);

    /**
     * Get order_id
     * @return string|null
     */
    public function getOrderId();

    /**
     * Set order_id
     * @param string $orderId
     * @return \Adnan\CustomerLogs\Api\Data\CustomerActivityLogInterface
     */
    public function setOrderId($orderId);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Adnan\CustomerLogs\Api\Data\CustomerActivityLogExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Adnan\CustomerLogs\Api\Data\CustomerActivityLogExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Adnan\CustomerLogs\Api\Data\CustomerActivityLogExtensionInterface $extensionAttributes
    );

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Adnan\CustomerLogs\Api\Data\CustomerActivityLogInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Get log_id
     * @return string|null
     */
    public function getLogId();

    /**
     * Set log_id
     * @param string $logId
     * @return \Adnan\CustomerLogs\Api\Data\CustomerActivityLogInterface
     */
    public function setLogId($logId);
}

