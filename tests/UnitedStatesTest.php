<?php 

use PHPUnit\Framework\TestCase;
use Benhilger\NationalHolidays\UnitedStates\UnitedStatesNationalHolidays;
use Benhilger\NationalHolidays\Holidays;
class UnitedStatesTest extends TestCase {
 
    public function test2024NationalHoldayDates(): void {
        $allHolidays = [
            new DateTest(2024, 1, 1),
            new DateTest(2024, 1, 15),
            new DateTest(2024, 2, 19),
            new DateTest(2024, 5, 27),
            new DateTest(2024, 6, 19),
            new DateTest(2024, 7, 4),
            new DateTest(2024, 9, 2),
            new DateTest(2024, 10, 14),
            new DateTest(2024, 11, 11),
            new DateTest(2024, 11, 28),
            new DateTest(2024, 12, 25)
        ];
        
        $this->testDatesForYear(2024, $allHolidays); 
    }

    public function test2025NationalHoldayDates(): void {
        $allHolidays = [
            new DateTest(2025, 1, 1),
            new DateTest(2025, 1, 20),
            new DateTest(2025, 2, 17),
            new DateTest(2025, 5, 26),
            new DateTest(2025, 6, 19),
            new DateTest(2025, 7, 4),
            new DateTest(2025, 9, 1),
            new DateTest(2025, 10, 13),
            new DateTest(2025, 11, 11),
            new DateTest(2025, 11, 27),
            new DateTest(2025, 12, 25)
        ];
        
        $this->testDatesForYear(2025, $allHolidays); 
    }

    public function test2026NationalHoldayDates(): void {
        $unitedStates = new UnitedStatesNationalHolidays();
        $allHolidays = [
            new DateTest(2026, 1, 1),
            new DateTest(2026, 1, 19),
            new DateTest(2026, 2, 16),
            new DateTest(2026, 5, 25),
            new DateTest(2026, 6, 19),
            new DateTest(2026, 7, 4),
            new DateTest(2026, 9, 7),
            new DateTest(2026, 10, 12),
            new DateTest(2026, 11, 11),
            new DateTest(2026, 11, 26),
            new DateTest(2026, 12, 25)
        ];
        
        $this->testDatesForYear(2026, $allHolidays); 
    }
    
    public function test2024NationalHoldayObservedDates(): void {
        $unitedStates = new UnitedStatesNationalHolidays();
        $allHolidays = [
            new DateTest(2024, 1, 1),
            new DateTest(2024, 1, 15),
            new DateTest(2024, 2, 19),
            new DateTest(2024, 5, 27),
            new DateTest(2024, 6, 19),
            new DateTest(2024, 7, 4),
            new DateTest(2024, 9, 2),
            new DateTest(2024, 10, 14),
            new DateTest(2024, 11, 11),
            new DateTest(2024, 11, 28),
            new DateTest(2024, 12, 25)
        ];
        
        $this->testDatesForYear(2024, $allHolidays, true); 
    }

    public function test2025NationalHoldayObservedDates(): void {
        $allHolidays = [
            new DateTest(2025, 1, 1),
            new DateTest(2025, 1, 20),
            new DateTest(2025, 2, 17),
            new DateTest(2025, 5, 26),
            new DateTest(2025, 1, 20),
            new DateTest(2025, 6, 19),
            new DateTest(2025, 7, 4),
            new DateTest(2025, 9, 1),
            new DateTest(2025, 10, 13),
            new DateTest(2025, 11, 11),
            new DateTest(2025, 11, 27),
            new DateTest(2025, 12, 25)
        ];
        
        $this->testDatesForYear(2025, $allHolidays, true); 
    }

    public function test2026NationalHoldayObservedDates(): void {
        $allHolidays = [
            new DateTest(2026, 1, 1),
            new DateTest(2026, 1, 19),
            new DateTest(2026, 2, 16),
            new DateTest(2026, 5, 25),
            new DateTest(2026, 6, 19),
            new DateTest(2026, 7, 3),
            new DateTest(2026, 9, 7),
            new DateTest(2026, 10, 12),
            new DateTest(2026, 11, 11),
            new DateTest(2026, 11, 26),
            new DateTest(2026, 12, 25)
        ];

        $this->testDatesForYear(2026, $allHolidays, true); 
    }

    /**
    *   @param int $year
    *   @param array $holidays
    *   @param bool $observed
    */
    private function testDatesForYear(int $year, array $holidays, bool $observed = false): void {
        $unitedStates = $this->loadUSNationalHolidays();
        $nationalHolidays = $unitedStates->getHolidays($year, observed: $observed);

        $mappedDates = array_map(fn($date) => date_format($date->date, "Y-m-d"), $holidays);
        $mappedNationalHolidays = array_map(fn($date) => date_format($date, "Y-m-d"), $nationalHolidays);
        $intersect = array_intersect($mappedDates, $mappedNationalHolidays);
        $this->assertEquals(count($intersect), count($mappedDates));
    }

    public function testInaugurationDaysInPast(): void {
        $unitedStates = $this->loadUSNationalHolidays();

        // January 20th, 2021 
        $inaugurationDay = $unitedStates->getHolidays(2021);
        $dateTest = new DateTest(2021, 1, 20);
        $this->assertDateTimeInArray($dateTest->date, $inaugurationDay);

        // January 20th, 2017
        $inaugurationDay = $unitedStates->getHolidays(2017);
        $dateTest = new DateTest(2017, 1, 20);
        $this->assertDateTimeInArray($dateTest->date, $inaugurationDay);
        
        // January 21st, 2013
        $inaugurationDay = $unitedStates->getHolidays(2013);
        $dateTest = new DateTest(2013, 1, 21);
        $this->assertDateTimeInArray($dateTest->date, $inaugurationDay);
        
        // January 20th, 2009
        $inaugurationDay = $unitedStates->getHolidays(2009);
        $dateTest = new DateTest(2009, 1, 20);
        $this->assertDateTimeInArray($dateTest->date, $inaugurationDay);
    }

    public function testInaugurationDaysInFuture(): void {
        $unitedStates = $this->loadUSNationalHolidays();
        
        // January 20th, 2025
        $inaugurationDay = $unitedStates->getHolidays(2025);
        $dateTest = new DateTest(2025, 1, 20);
        $this->assertDateTimeInArray($dateTest->date, $inaugurationDay);
        
        // January 20th, 2029
        $inaugurationDay = $unitedStates->getHolidays(2029);
        $dateTest = new DateTest(2029, 1, 20);
        $this->assertDateTimeInArray($dateTest->date, $inaugurationDay);
        
        // January 20th, 2033
        $inaugurationDay = $unitedStates->getHolidays(2033);
        $dateTest = new DateTest(2033, 1, 20);
        $this->assertDateTimeInArray($dateTest->date, $inaugurationDay);
        
        // January 21st, 2041
        $inaugurationDay = $unitedStates->getHolidays(2041);
        $dateTest = new DateTest(2041, 1, 21);
        $this->assertDateTimeInArray($dateTest->date, $inaugurationDay);

    }

    public function testIsNationalDate(): void {
        $unitedStates = $this->loadUSNationalHolidays();

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
        $unitedStates = $this->loadUSNationalHolidays();

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

    /**
     * Undocumented function
     *
     * @param DateTime $dateTime
     * @param DateTime[] $dates
     * @return void
     */
    private function assertDateTimeInArray(DateTime $dateTime, array $dates) {
        $result = false;
        foreach($dates as $date) {
            $result = $result || date_format($date, "Y-m-d") == date_format($dateTime, "Y-m-d");
        }
        $this->assertTrue($result);
    }

    private function loadUSNationalHolidays(): Holidays {
        $holidays = new Holidays();
        $holidays->addHolidays(UnitedStatesNationalHolidays::getNationalHolidays());
        return $holidays;
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
