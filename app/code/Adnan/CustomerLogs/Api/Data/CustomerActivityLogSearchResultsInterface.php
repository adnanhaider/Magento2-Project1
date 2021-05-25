<?php
declare(strict_types=1);

namespace Adnan\CustomerLogs\Api\Data;

interface CustomerActivityLogSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get CustomerActivityLog list.
     * @return \Adnan\CustomerLogs\Api\Data\CustomerActivityLogInterface[]
     */
    public function getItems();

    /**
     * Set order_id list.
     * @param \Adnan\CustomerLogs\Api\Data\CustomerActivityLogInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

