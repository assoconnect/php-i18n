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
        'TF' => 'FR', // Terres australes françaises
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

    public const SUBDIVISION_NOT_CONSIDERED_AS_COUNTRIES = [
        'BL', // Saint-Barthélemy
        'GF', // Guyane (française)
        'GP', // Guadeloupe
        'MF', // Saint-Martin
        'MQ', // Martinique
        'PM', // Saint-Pierre-et-Miquelon
        'RE', // La Réunion
        'TF', // Terres australes françaises
        'YT' // Mayotte
    ];

    /**
     * Return the country code if the provided code is a subdivision code,
     * or the same code if the provided code is already a country code.
     */
    public static function resolveCountryCode(string $code): string
    {
        if (in_array($code, self::SUBDIVISION_NOT_CONSIDERED_AS_COUNTRIES, true)) {
            return self::SUBDIVISION_CODES[$code];
        }

        return $code;
    }

    /**
     * Returns an array of type [countryCode => countryName] without subdivisions that aren't considered as countries
     * @param array<string, string> $countryCodesAndNames
     * @return array<string, string>
     */
    public static function filterSubdivisions(array $countryCodesAndNames): array
    {
        return array_filter(
            $countryCodesAndNames,
            static function ($countryName, $countryCode) {
                return !in_array($countryCode, self::SUBDIVISION_NOT_CONSIDERED_AS_COUNTRIES, true);
            },
            ARRAY_FILTER_USE_BOTH
        );
    }
}
