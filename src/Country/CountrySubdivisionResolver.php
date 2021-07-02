<?php

declare(strict_types=1);

namespace AssoConnect\PhpI18n\Country;

class CountrySubdivisionResolver
{
    /**
     * Return the country code if the provided code is a subdivision code,
     * or the same code if the provided code is already a country code.
     */
    public function resolveCountryCode(string $code): string
    {
        // List of subdivisions code => countries code
        $subdivisions = [
            // France
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

        if (array_key_exists($code, $subdivisions)) {
            return $subdivisions[$code];
        }

        return $code;
    }
}
