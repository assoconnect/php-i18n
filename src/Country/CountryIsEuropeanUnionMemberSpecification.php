<?php

declare(strict_types=1);

namespace AssoConnect\PhpI18n\Country;

class CountryIsEuropeanUnionMemberSpecification
{
    public function isSatisfiedBy(string $countryCode): bool
    {
        $EUCodes = array(
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
        );

        return in_array($countryCode, $EUCodes);
    }
}
