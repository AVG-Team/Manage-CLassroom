<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static PENDING()
 * @method static static APPROVE()
 */
final class UsersSubscribedStatusEnum extends Enum
{
    public const PENDING = 0;
    public const APPROVE = 1;

    public static function getArrayView(): array
    {
        return [
            'Đang Chờ' => self::PENDING,
            'Đã Chấp Nhận' => self::APPROVE,
        ];
    }

    public static function getKeyByValue($value): string
    {
        return array_search($value, self::getArrayView(), true);
    }
}
