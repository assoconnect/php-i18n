<?php

declare(strict_types=1);

namespace AssoConnect\PhpI18n\Country;

class CountrySubdivisionResolver
{
    public const SUBDIVISION_CODES = [
        'BL' => 'FR', // Saint-Barthélemy
        'GF' => 'FR', // Guyane (française)
        'GP' => 'FR', // Guadeloupe
        'MF' => 'FR', // Saint-Martin
        'MQ' => 'FR', // Martinique
        'NC' => 'FR', // Nouvelle-Calédonie
        'PF' => 'FR', // Polynésie française
        'PM' => 'FR', // Saint-Pierre-et-Miquelon
        'RE' => 'FR', // La Réunion
        'TF' => 'FR', // Terres australes françaises[6]
        'WF' => 'FR', // Wallis-et-Futuna
        'YT' => 'FR', // Mayotte
        // Denmark
        'FO' => 'DK', // Faroe Islands
        'GL' => 'DK', // Greenland
        // Great Britain
        'GG' => 'GB', // Guernsey
        'IM' => 'GB', // Isle of Man
        'JE' => 'GB', // Jersey
    ];

    /**
     * Return the country code if the provided code is a subdivision code,
     * or the same code if the provided code is already a country code.
     */
    public static function resolveCountryCode(string $code): string
    {
        if (array_key_exists($code, self::SUBDIVISION_CODES)) {
            return self::SUBDIVISION_CODES[$code];
        }

        return $code;
    }

    /**
     * Returns an array of type [countryCode => countryName] without subdivision ones
     */
    public static function filterSubdivisions(array $countryCodesAndNames): array
    {
        $countrySubdivisionsKeys = array_keys(self::SUBDIVISION_CODES);
        return array_filter(
            $countryCodesAndNames,
            function ($countryName, $countryCode) use ($countrySubdivisionsKeys) {
                return !in_array($countryCode, $countrySubdivisionsKeys);
            },
            ARRAY_FILTER_USE_BOTH
        );
    }
}
