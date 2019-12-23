<?php

namespace UKFast\SDK\Billing\Entities;

use UKFast\SDK\Entity;
use DateTime;

/**
 * @property int $id
 * @property string $friendlyName
 * @property string $name
 * @property string $address
 * @property string $postcode
 * @property string $cardNumber
 * @property string $cardType
 * @property string $validFrom
 * @property string $expiry
 * @property int $issueNumber
 * @property boolean $primaryCard
 */
class PaymentCard extends Entity
{
    public function isExpired()
    {
        return DateTime::createFromFormat(DATE_ISO8601, $this->expiry) < new DateTime();
    }

    public function isNotExpired()
    {
        return !$this->isExpired();
    }
}
