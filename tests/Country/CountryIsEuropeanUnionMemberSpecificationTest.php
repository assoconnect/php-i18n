<?php

declare(strict_types=1);

namespace AssoConnect\PhpI18n\Tests\Country;

use AssoConnect\PhpI18n\Country\CountryIsEuropeanUnionMemberSpecification;
use PHPUnit\Framework\TestCase;

class CountryIsEuropeanUnionMemberSpecificationTest extends TestCase
{
    /**
     * @dataProvider providerCountries()
     */
    public function testCountryIsEuropeanUnionMemberSpecificationWorksCorrectly(
        string $countryCode,
        bool $isEuropeanUnionMember
    ): void {
        $specification = new CountryIsEuropeanUnionMemberSpecification();
        self::assertSame($isEuropeanUnionMember, $specification->isSatisfiedBy($countryCode));
    }

    /** @return mixed[] */
    public function providerCountries(): iterable
    {
        yield 'European' => ['FR', true];
        yield 'Not european' => ['GB', false];
    }
}
