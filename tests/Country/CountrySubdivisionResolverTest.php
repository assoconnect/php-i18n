<?php

declare(strict_types=1);

namespace AssoConnect\PhpI18n\Tests\Country;

use AssoConnect\PhpI18n\Country\CountrySubdivisionResolver;
use PHPUnit\Framework\TestCase;

class CountrySubdivisionResolverTest extends TestCase
{
    /**
     * @dataProvider provideSubdivisionsAndCountries
     */
    public function testSubdivisionsBelongsToTheRightCountry(string $subdivisionCode, string $countryCode): void
    {
        self::assertSame($countryCode, CountrySubdivisionResolver::resolveCountryCode($subdivisionCode));
    }

    /** @return mixed[] */
    public static function provideSubdivisionsAndCountries(): iterable
    {
        yield 'Mayotte' => ['WF', 'WF'];
        yield 'Guadeloupe' => ['GP', 'FR'];
        yield 'Greenland' => ['GL', 'GL'];
        yield 'France' => ['FR', 'FR'];
    }

    public function testFilterSubdivisionsWorksCorrectly(): void
    {
        $countryCodes = [
            'FR' => 'France',
            'MQ' => 'Martinique',
            'NC' => 'Nouvelle-Calédonie'
        ];
        self::assertSame(
            ['FR' => 'France', 'NC' => 'Nouvelle-Calédonie'],
            CountrySubdivisionResolver::filterSubdivisions($countryCodes)
        );
    }
}
