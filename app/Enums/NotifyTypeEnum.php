<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static WARNING()
 * @method static static ERROR()
 * @method static static SUCCESS()
 */
final class NotifyTypeEnum extends Enum
{
    public const WARNING = 0;
    public const ERROR = 1;
    public const SUCCESS = 1;

    public static function getArrayView(): array
    {
        return [
            'Cảnh Báo' => self::WARNING,
            'Báo Lỗi' => self::ERROR,
            'Thành Công' => self::SUCCESS,
        ];
    }

    public static function getKeyByValue($value): string
    {
        return array_search($value, self::getArrayView(), true);
    }
}
