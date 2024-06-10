<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static PENDING()
 * @method static static APPROVE()
 * @method static static REJECT()
 */
final class SalaryStatusEnum extends Enum
{
    public const PENDING = 0;
    public const APPROVE = 1;
    public const REJECT = 2;

    public static function getArrayView(): array
    {
        return [
            'Đang Chờ' => self::PENDING,
            'Đã Thanh Toán' => self::APPROVE,
            'Từ Chối' => self::REJECT,
        ];
    }

    public static function getKeyByValue($value): string
    {
        return array_search($value, self::getArrayView(), true);
    }
}
