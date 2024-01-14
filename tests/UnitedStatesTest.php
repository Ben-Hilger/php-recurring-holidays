<?php 

use PHPUnit\Framework\TestCase;
use Benhilger\NationalHolidays\UnitedStates\UnitedStatesNationalHolidays;
use Benhilger\NationalHolidays\UnitedStates\UnitedStatesHolidays;

class UnitedStatesTest extends TestCase {
 
    public function test2024NationalHoldayDates(): void {
        $allHolidays = [
            UnitedStatesHolidays::NewYears->name => new DateTest(2024, 1, 1),
            UnitedStatesHolidays::MartinLutherKingBirthday->name => new DateTest(2024, 1, 15),
            UnitedStatesHolidays::WashingtonBirthday->name => new DateTest(2024, 2, 19),
            UnitedStatesHolidays::MemorialDay->name => new DateTest(2024, 5, 27),
            UnitedStatesHolidays::Juneteenth->name => new DateTest(2024, 6, 19),
            UnitedStatesHolidays::IndependenceDay->name => new DateTest(2024, 7, 4),
            UnitedStatesHolidays::LaborDay->name => new DateTest(2024, 9, 2),
            UnitedStatesHolidays::ColumbusDay->name => new DateTest(2024, 10, 14),
            UnitedStatesHolidays::VeteransDay->name => new DateTest(2024, 11, 11),
            UnitedStatesHolidays::ThanksgivingDay->name => new DateTest(2024, 11, 28),
            UnitedStatesHolidays::ChristmasDay->name => new DateTest(2024, 12, 25)
        ];
        
        $this->testDatesForYear(2024, $allHolidays); 
    }

    public function test2025NationalHoldayDates(): void {
        $allHolidays = [
            UnitedStatesHolidays::NewYears->name => new DateTest(2025, 1, 1),
            UnitedStatesHolidays::MartinLutherKingBirthday->name => new DateTest(2025, 1, 20),
            UnitedStatesHolidays::WashingtonBirthday->name => new DateTest(2025, 2, 17),
            UnitedStatesHolidays::MemorialDay->name => new DateTest(2025, 5, 26),
            UnitedStatesHolidays::Juneteenth->name => new DateTest(2025, 6, 19),
            UnitedStatesHolidays::IndependenceDay->name => new DateTest(2025, 7, 4),
            UnitedStatesHolidays::LaborDay->name => new DateTest(2025, 9, 1),
            UnitedStatesHolidays::ColumbusDay->name => new DateTest(2025, 10, 13),
            UnitedStatesHolidays::VeteransDay->name => new DateTest(2025, 11, 11),
            UnitedStatesHolidays::ThanksgivingDay->name => new DateTest(2025, 11, 27),
            UnitedStatesHolidays::ChristmasDay->name => new DateTest(2025, 12, 25)
        ];
        
        $this->testDatesForYear(2025, $allHolidays); 
    }

    public function test2026NationalHoldayDates(): void {
        $unitedStates = new UnitedStatesNationalHolidays();
        $allHolidays = [
            UnitedStatesHolidays::NewYears->name => new DateTest(2026, 1, 1),
            UnitedStatesHolidays::MartinLutherKingBirthday->name => new DateTest(2026, 1, 19),
            UnitedStatesHolidays::WashingtonBirthday->name => new DateTest(2026, 2, 16),
            UnitedStatesHolidays::MemorialDay->name => new DateTest(2026, 5, 25),
            UnitedStatesHolidays::Juneteenth->name => new DateTest(2026, 6, 19),
            UnitedStatesHolidays::IndependenceDay->name => new DateTest(2026, 7, 4),
            UnitedStatesHolidays::LaborDay->name => new DateTest(2026, 9, 7),
            UnitedStatesHolidays::ColumbusDay->name => new DateTest(2026, 10, 12),
            UnitedStatesHolidays::VeteransDay->name => new DateTest(2026, 11, 11),
            UnitedStatesHolidays::ThanksgivingDay->name => new DateTest(2026, 11, 26),
            UnitedStatesHolidays::ChristmasDay->name => new DateTest(2026, 12, 25)
        ];
        
        $this->testDatesForYear(2026, $allHolidays); 
    }
    
    public function test2024NationalHoldayObservedDates(): void {
        $unitedStates = new UnitedStatesNationalHolidays();
        $allHolidays = [
            UnitedStatesHolidays::NewYears->name => new DateTest(2024, 1, 1),
            UnitedStatesHolidays::MartinLutherKingBirthday->name => new DateTest(2024, 1, 15),
            UnitedStatesHolidays::WashingtonBirthday->name => new DateTest(2024, 2, 19),
            UnitedStatesHolidays::MemorialDay->name => new DateTest(2024, 5, 27),
            UnitedStatesHolidays::Juneteenth->name => new DateTest(2024, 6, 19),
            UnitedStatesHolidays::IndependenceDay->name => new DateTest(2024, 7, 4),
            UnitedStatesHolidays::LaborDay->name => new DateTest(2024, 9, 2),
            UnitedStatesHolidays::ColumbusDay->name => new DateTest(2024, 10, 14),
            UnitedStatesHolidays::VeteransDay->name => new DateTest(2024, 11, 11),
            UnitedStatesHolidays::ThanksgivingDay->name => new DateTest(2024, 11, 28),
            UnitedStatesHolidays::ChristmasDay->name => new DateTest(2024, 12, 25)
        ];
        
        $this->testDatesForYear(2024, $allHolidays, true); 
    }

    public function test2025NationalHoldayObservedDates(): void {
        $allHolidays = [
            UnitedStatesHolidays::NewYears->name => new DateTest(2025, 1, 1),
            UnitedStatesHolidays::MartinLutherKingBirthday->name => new DateTest(2025, 1, 20),
            UnitedStatesHolidays::WashingtonBirthday->name => new DateTest(2025, 2, 17),
            UnitedStatesHolidays::MemorialDay->name => new DateTest(2025, 5, 26),
            UnitedStatesHolidays::InaugurationDay->name => new DateTest(2025, 1, 20),
            UnitedStatesHolidays::Juneteenth->name => new DateTest(2025, 6, 19),
            UnitedStatesHolidays::IndependenceDay->name => new DateTest(2025, 7, 4),
            UnitedStatesHolidays::LaborDay->name => new DateTest(2025, 9, 1),
            UnitedStatesHolidays::ColumbusDay->name => new DateTest(2025, 10, 13),
            UnitedStatesHolidays::VeteransDay->name => new DateTest(2025, 11, 11),
            UnitedStatesHolidays::ThanksgivingDay->name => new DateTest(2025, 11, 27),
            UnitedStatesHolidays::ChristmasDay->name => new DateTest(2025, 12, 25)
        ];
        
        $this->testDatesForYear(2025, $allHolidays, true); 
    }

    public function test2026NationalHoldayObservedDates(): void {
        $allHolidays = [
            UnitedStatesHolidays::NewYears->name => new DateTest(2026, 1, 1),
            UnitedStatesHolidays::MartinLutherKingBirthday->name => new DateTest(2026, 1, 19),
            UnitedStatesHolidays::WashingtonBirthday->name => new DateTest(2026, 2, 16),
            UnitedStatesHolidays::MemorialDay->name => new DateTest(2026, 5, 25),
            UnitedStatesHolidays::Juneteenth->name => new DateTest(2026, 6, 19),
            UnitedStatesHolidays::IndependenceDay->name => new DateTest(2026, 7, 3),
            UnitedStatesHolidays::LaborDay->name => new DateTest(2026, 9, 7),
            UnitedStatesHolidays::ColumbusDay->name => new DateTest(2026, 10, 12),
            UnitedStatesHolidays::VeteransDay->name => new DateTest(2026, 11, 11),
            UnitedStatesHolidays::ThanksgivingDay->name => new DateTest(2026, 11, 26),
            UnitedStatesHolidays::ChristmasDay->name => new DateTest(2026, 12, 25)
        ];

        $this->testDatesForYear(2026, $allHolidays, true); 
    }

    /**
    *   @param int $year
    *   @param array $holidays
    *   @param bool $observed
    */
    private function testDatesForYear(int $year, array $holidays, bool $observed = false): void {
        $unitedStates = new UnitedStatesNationalHolidays();
        $nationalHolidays = $unitedStates->getHolidays($year, observed: $observed);

        foreach($holidays as $holiday => $test) {
            $actualDate = $nationalHolidays[$holiday];
            $expectedDate = $test->date;
            $this->assertEquals($expectedDate, $actualDate, "Date mismatch for holiday: $holiday");
        } 
        
    }

    public function testInaugurationDaysInPast(): void {
        $unitedStates = new UnitedStatesNationalHolidays();

        // January 20th, 2021 
        $inaugurationDay = $unitedStates->getHolidays(2021)[UnitedStatesHolidays::InaugurationDay->name];
        $dateTest = new DateTest(2021, 1, 20);
        $this->assertEquals($inaugurationDay, $dateTest->date);

        // January 20th, 2017
        $inaugurationDay = $unitedStates->getHolidays(2017)[UnitedStatesHolidays::InaugurationDay->name];
        $dateTest = new DateTest(2017, 1, 20);
        $this->assertEquals($inaugurationDay, $dateTest->date);

        
        // January 21st, 2013
        $inaugurationDay = $unitedStates->getHolidays(2013)[UnitedStatesHolidays::InaugurationDay->name];
        $dateTest = new DateTest(2013, 1, 21);
        $this->assertEquals($inaugurationDay, $dateTest->date);
        
        // January 20th, 2009
        $inaugurationDay = $unitedStates->getHolidays(2009)[UnitedStatesHolidays::InaugurationDay->name];
        $dateTest = new DateTest(2009, 1, 20);
        $this->assertEquals($inaugurationDay, $dateTest->date);
    }

    public function testInaugurationDaysInFuture(): void {
        $unitedStates = new UnitedStatesNationalHolidays();
        
        // January 20th, 2025
        $inaugurationDay = $unitedStates->getHolidays(2025)[UnitedStatesHolidays::InaugurationDay->name];
        $dateTest = new DateTest(2025, 1, 20);
        $this->assertEquals($inaugurationDay, $dateTest->date);
        
        // January 20th, 2029
        $inaugurationDay = $unitedStates->getHolidays(2029)[UnitedStatesHolidays::InaugurationDay->name];
        $dateTest = new DateTest(2029, 1, 20);
        $this->assertEquals($inaugurationDay, $dateTest->date);
        
        // January 20th, 2033
        $inaugurationDay = $unitedStates->getHolidays(2033)[UnitedStatesHolidays::InaugurationDay->name];
        $dateTest = new DateTest(2033, 1, 20);
        $this->assertEquals($inaugurationDay, $dateTest->date);
        
        // January 21st, 2041
        $inaugurationDay = $unitedStates->getHolidays(2041)[UnitedStatesHolidays::InaugurationDay->name];
        $dateTest = new DateTest(2041, 1, 21);
        $this->assertEquals($inaugurationDay, $dateTest->date);

    }

    public function testIsNationalDate(): void {
        $unitedStates = new UnitedStatesNationalHolidays();

        $date = new DateTime();
        
        $yearsToTest = [2024, 2025, 2026];

        foreach($yearsToTest as $year) {
            // December 25th, 2025 - Holiday
            $date->setDate($year, 12, 25);
            $this->assertTrue($unitedStates->isHoliday($date));
        
            // June 19th, 2025 - Holiday
            $date->setDate($year, 12, 25);
            $this->assertTrue($unitedStates->isHoliday($date));
        
            // December 12th, 2025 - Not a Holiday
            $date->setDate($year, 12, 12);
            $this->assertFalse($unitedStates->isHoliday($date));
        }
        
        // July 3rd, 2026 - Observed Holiday, but observed = false
        $date->setDate(2026, 7, 3);
        $this->assertFalse($unitedStates->isHoliday($date));

        // July 4th, 2026 - Not Observed Holiday, but observed = false
        $date->setDate(2026, 7, 4);
        $this->assertTrue($unitedStates->isHoliday($date)); 

    }

    public function testIsNationalDateObserved(): void {
        $unitedStates = new UnitedStatesNationalHolidays();

        $date = new DateTime();
        
        $yearsToTest = [2024, 2025, 2026];

        foreach($yearsToTest as $year) {
            // December 25th, 2025 - Holiday
            $date->setDate($year, 12, 25);
            $this->assertTrue($unitedStates->isHoliday($date, observed: true));
        
            // June 19th, 2025 - Holiday
            $date->setDate($year, 12, 25);
            $this->assertTrue($unitedStates->isHoliday($date, observed: true));
        
            // December 12th, 2025 - Not a Holiday
            $date->setDate($year, 12, 12);
            $this->assertFalse($unitedStates->isHoliday($date, observed: true));
        }
 
        // July 3rd, 2026 - Observed Holiday, but observed = true
        $date->setDate(2026, 7, 3);
        $this->assertTrue($unitedStates->isHoliday($date, observed: true));
        
        // July 4th, 2026 - Not Observed Holiday, but observed = true
        $date->setDate(2026, 7, 4);
        $this->assertFalse($unitedStates->isHoliday($date, observed: true)); 
    }
}

class DateTest {
    
    public ?DateTime $date;

    function __construct(int $year, int $month, int $day) {
        $this->date = new DateTime();
        $this->date->setDate($year, $month, $day);
        $this->date->setTime(0, 0, 0, 0);
    }
}
