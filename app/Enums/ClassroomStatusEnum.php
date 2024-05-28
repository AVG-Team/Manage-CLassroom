<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static PENDING()
 * @method static static ACTIVE()
 */
final class ClassroomStatusEnum extends Enum
{
    public const PENDING = 0;
    public const ACTIVE = 1;

    public static function getArrayView(): array
    {
        return [
            'Pending' => self::PENDING,
            'Approve' => self::ACTIVE,
        ];
    }

    public static function getKeyByValue($value): string
    {
        return array_search($value, self::getArrayView(), true);
    }
}
