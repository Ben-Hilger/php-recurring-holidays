<?php

namespace Benhilger\NationalHolidays;

use DateTime;
use UnitedStatesHolidays;

class UnitedStatesNationalHolidays extends HolidayCalendarGroup {


    private array $holidays = [];

    function __construct() {
        $this->holidays = [
            UnitedStatesHolidays::NewYears->name => 
                new HolidayDateSimple("YYYY-01-01"),
            UnitedStatesHolidays::MartinLutherKingBirthday->name => 
                new HolidayDateComplex(1, 'third monday of this month'),
            UnitedStatesHolidays::WashingtonBirthday->name => 
                new HolidayDateComplex(2, 'third monday of this month'),
            UnitedStatesHolidays::MemorialDay->name =>
                new HolidayDateComplex(5, 'last monday of this month'),
            UnitedStatesHolidays::Juneteenth->name =>
                new HolidayDateSimple("YYYY-06-19"),
            UnitedStatesHolidays::IndependenceDay->name => 
                new HolidayDateSimple("YYYY-07-04"),
            UnitedStatesHolidays::LaborDay->name =>
                new HolidayDateComplex(9, 'first monday of this month'),
            UnitedStatesHolidays::ColumbusDay->name =>
                new HolidayDateComplex(10, 'second monday of this month'),
            UnitedStatesHolidays::VeteransDay->name => 
                new HolidayDateSimple("YYYY-11-11"),
            UnitedStatesHolidays::ThanksgivingDay->name =>
                new HolidayDateComplex(11, 'fourth thursday of this month'),
            UnitedStatesHolidays::ChristmasDay->name => 
                new HolidayDateSimple("YYYY-12-25")
        ];
    }
    
    function getHolidayFormats(int $year): array {
        $allHolidays = $this->holidays;
        if ($this->isInaugurationYear($year)) {
            $allHolidays[UnitedStatesHolidays::InaugurationDay->name] = $this->getInaugurationDate($year); 
        }
        return $allHolidays;
    }
    
    /**
    * Gets the inauguration date format (YYYY-MM-DD) based on the given year
    * The inauguration date is calculated as follows:
    * January 20th, unless it falls on a Sunday, then it's the 21st
    *
    * @param int $year
    * @return HolidayDateSimple
    */
    private function getInaugurationDate(int $year): HolidayDateSimple {
        $date = new DateTime();
        $date->setDate($year, 1, 20);
        $dayOfWeek = date("w", $date->getTimestamp());   
        $sunday = "0";
        
        $dateFormat = "YYYY-01-20";
        if ($dayOfWeek === $sunday) {
            $dateFormat = "YYYY-01-21";    
        } 
        return new HolidayDateSimple($dateFormat);
    }

    /**
    * Checks if the given year is a US inauguration year. The US inauguration
    * happens every 4 years. This uses the 2025 inauguration as the base year
    *
    * @param int $year
    */
    private function isInaugurationYear(int $year): bool {
        $baseYear = 2025;
        return ($year - $baseYear) % 4 == 0;
    } 

}

