<?php

namespace UKFast\SDK\Billing;

use UKFast\SDK\Billing\Entities\CloudCost;
use UKFast\SDK\Client as BaseClient;
use UKFast\SDK\Page;

class CloudCostClient extends BaseClient
{
    protected $basePath = 'billing/';

    /**
     * Gets a paginated response of all cloud costs
     *
     * @param int $page
     * @param int $perPage
     * @param array $filters
     * @return Page
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPage($page = 1, $perPage = 15, $filters = [])
    {
        $page = $this->paginatedRequest('v1/cloud-costs', $page, $perPage, $filters);
        $page->serializeWith(function ($item) {
            return $this->serializeCloudCost($item);
        });

        return $page;
    }

    /**
     * @param $item
     * @return CloudCost
     */
    protected function serializeCloudCost($item)
    {
        $cloudCost = new CloudCost($this->apiToFriendly($item, [
            'server_id' => 'serverId',
            'start_at' => 'startAt',
            'end_at' => 'endAt',
            'next_payment_on' => 'nextPaymentOn',
            'last_payment_at' => 'lastPaymentAt'
        ]));

        $cloudCost->resource = $this->apiToFriendly($item->resource, []);

        return $cloudCost;
    }
}
