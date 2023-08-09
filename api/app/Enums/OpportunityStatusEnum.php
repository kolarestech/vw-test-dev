<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static WAITING()
 * @method static static APPROVED()
 * @method static static REJECTED()
 */
final class OpportunityStatusEnum extends Enum
{
    const WAITING = 0;
    const APPROVED = 1;
    const REJECTED = 2;
}
