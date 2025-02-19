<?php

namespace App\Enum;

enum PaymentStatus : string
{
    case Pending = 'pending';
    case Paid = 'paid';
    case Failed = 'failed';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

}
