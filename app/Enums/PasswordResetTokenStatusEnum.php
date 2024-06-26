<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static PENDING()
 * @method static static VERIFIED()
 */
final class PasswordResetTokenStatusEnum extends Enum
{
    public const PENDING = 0;
    public const VERIFIED = 1;

    public static function getArrayView(): array
    {
        return [
            'Đang Chờ' => self::PENDING,
            'Đã Xác Nhận' => self::VERIFIED,
        ];
    }

    public static function getKeyByValue($value): string
    {
        return array_search($value, self::getArrayView(), true);
    }
}
