<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static REJECT()
 * @method static static APPROVE()
 */
final class NotifyStatusEnum extends Enum
{
    public const REJECT = 0;
    public const APPROVE = 1;

    public static function getArrayView(): array
    {
        return [
            'Từ Chối' => self::REJECT,
            'Chấp Nhận' => self::APPROVE,
        ];
    }

    public static function getKeyByValue($value): string
    {
        return array_search($value, self::getArrayView(), true);
    }
}
