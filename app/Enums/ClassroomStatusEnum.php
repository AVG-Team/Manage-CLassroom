<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static PENDING()
 * @method static static ACTIVE()
 * @method static static CLOSE()
 */
final class ClassroomStatusEnum extends Enum
{
    public const PENDING = 0;
    public const ACTIVE = 1;
    public const CLOSE = 2;

    public static function getArrayView(): array
    {
        return [
            'Chờ Duyệt' => self::PENDING,
            'Đã Hoạt Động' => self::ACTIVE,
            'Đóng Lớp' => self::CLOSE,
        ];
    }

    public static function getKeyByValue($value): string
    {
        return array_search($value, self::getArrayView(), true);
    }
}
