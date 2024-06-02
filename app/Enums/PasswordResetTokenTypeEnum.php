<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static PASSWORDRESET()
 * @method static static EMAILVERIFY()
 */
final class PasswordResetTokenTypeEnum extends Enum
{
    public const PASSWORDRESET = 0;
    public const EMAILVERIFY = 1;

    public static function getArrayView(): array
    {
        return [
            'Password Rest' => self::PASSWORDRESET,
            'Email Verify' => self::EMAILVERIFY,
        ];
    }

    public static function getKeyByValue($value): string
    {
        return array_search($value, self::getArrayView(), true);
    }

    public static function getValues(string|array|null $keys = null): array
    {
        return [
            self::PASSWORDRESET,
            self::EMAILVERIFY,
        ];
    }
}
