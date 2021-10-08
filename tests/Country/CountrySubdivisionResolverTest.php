<?php

declare(strict_types=1);

namespace AssoConnect\PhpI18n\Tests\Country;

use AssoConnect\PhpI18n\Country\CountrySubdivisionResolver;
use PHPUnit\Framework\TestCase;

class CountrySubdivisionResolverTest extends TestCase
{
    /**
     * @dataProvider provideSubdivisionsAndCountries()
     */
    public function testSubdivisionsBelongsToTheRightCountry(string $subdivisionCode, string $countryCode): void
    {
        $resolver = new CountrySubdivisionResolver();
        $this->assertSame($countryCode, $resolver->resolveCountryCode($subdivisionCode));
    }

    public function provideSubdivisionsAndCountries(): iterable
    {
        yield 'Guadeloupe' => ['GP', 'FR'];
        yield 'Greenland' => ['GL', 'DK'];
        yield 'France' => ['FR', 'FR'];
    }

    public function testFilterSubdivisionsWorksCorrectly(): void
    {
        $resolver = new CountrySubdivisionResolver();
        $countryCodes = [
            'FR' => 'France',
            'MQ' => 'Martinique'
        ];
        $this->assertSame(['FR' => 'France'], $resolver->filterSubdivisions($countryCodes));
    }
}
