<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static USER()
 * @method static static TEACHER()
 * @method static static STAFF()
 * @method static static ADMIN()
 */
final class UserLevelEnum extends Enum
{
    public const USER = 0;
    public const TEACHER = 1;
    public const STAFF = 1;
    public const ADMIN = 2;

    public static function getArrayView(): array
    {
        return [
            'User' => self::USER,
            'Teacher' => self::TEACHER,
            'Staff' => self::STAFF,
            'Admin' => self::ADMIN,
        ];
    }

    public static function getKeyByValue($value): string
    {
        return array_search($value, self::getArrayView(), true);
    }

    public static function getValues(string|array|null $keys = null): array
    {
        return [
            self::USER,
            self::TEACHER,
            self::STAFF,
            self::ADMIN,
        ];
    }
}
