<?php

namespace UKFast\SDK\Billing\Entities;

use UKFast\SDK\Entity;
use DateTime;

/**
 * @property int $id
 * @property int $serverId
 * @property DateTime $startAt
 * @property DateTime $endAt
 * @property string $type
 * @property string $value
 * @property string $period
 * @property float $price
 * @property DateTime $nextPaymentOn
 * @property DateTime $lastPaymentAt
 */
class CloudCost extends Entity
{
    protected $dates = ['startAt', 'endAt', 'nextPaymentOn', 'lastPaymentAt'];
}
