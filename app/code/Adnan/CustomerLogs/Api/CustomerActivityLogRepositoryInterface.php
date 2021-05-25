<?php
declare(strict_types=1);

namespace Adnan\CustomerLogs\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface CustomerActivityLogRepositoryInterface
{

    /**
     * Save CustomerActivityLog
     * @param \Adnan\CustomerLogs\Api\Data\CustomerActivityLogInterface $customerActivityLog
     * @return \Adnan\CustomerLogs\Api\Data\CustomerActivityLogInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Adnan\CustomerLogs\Api\Data\CustomerActivityLogInterface $customerActivityLog
    );

    /**
     * Retrieve CustomerActivityLog
     * @param string $customeractivitylogId
     * @return \Adnan\CustomerLogs\Api\Data\CustomerActivityLogInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($customeractivitylogId);

    /**
     * Retrieve CustomerActivityLog matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Adnan\CustomerLogs\Api\Data\CustomerActivityLogSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete CustomerActivityLog
     * @param \Adnan\CustomerLogs\Api\Data\CustomerActivityLogInterface $customerActivityLog
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Adnan\CustomerLogs\Api\Data\CustomerActivityLogInterface $customerActivityLog
    );

    /**
     * Delete CustomerActivityLog by ID
     * @param string $customeractivitylogId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($customeractivitylogId);
}

