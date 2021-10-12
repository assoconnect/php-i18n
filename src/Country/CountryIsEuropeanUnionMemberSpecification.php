<?php

declare(strict_types=1);

namespace AssoConnect\PhpI18n\Country;

class CountryIsEuropeanUnionMemberSpecification
{
    public const EU_CODES = [
        'AT',
        'BE',
        'BG',
        'CY',
        'CZ',
        'DE',
        'DK',
        'EE',
        'ES',
        'FI',
        'FR',
        'GR',
        'HR',
        'HU',
        'IE',
        'IT',
        'LT',
        'LU',
        'LV',
        'MT',
        'NL',
        'PL',
        'PT',
        'RO',
        'SE',
        'SI',
        'SK'
    ];

    public function isSatisfiedBy(string $countryCode): bool
    {
        return in_array($countryCode, self::EU_CODES);
    }
}
