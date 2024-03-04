<?php 

namespace App\Enums;

enum SupportStatus: string
{
    case A = "Open";
    case C = "Closed";
    case P = "Pendent";

    public static function fromValue(string $status): string
    {
        foreach (self::cases() as $status) {
            if ($status->name === $status) {
                return $status->value;
            }
        }
        
    }
}