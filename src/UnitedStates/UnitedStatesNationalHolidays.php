<?php

namespace Benhilger\NationalHolidays\UnitedStates;

use Benhilger\NationalHolidays\HolidayCalendarGroup;
use DateTime;
use Benhilger\NationalHolidays\HolidayDate;
use Benhilger\NationalHolidays\UnitedStates\UnitedStatesHolidays;
use Exception;

class UnitedStatesNationalHolidays {


    private array $holidays = [];

    /**
     * Returns the US national holidays for the given year
     *
     * @param integer $year
     * @param bool $observed
     * @return HolidayDate[]
     */
    static function getNationalHolidays(): array {
        $holidays = [
            HolidayDate::fromSimpleFormat("YYYY-01-01"), // New Years
            HolidayDate::fromComplexFormat('third monday of this month', 1), // Martin Luther King Birthday
            HolidayDate::fromComplexFormat('third monday of this month', 2), // Washington Birthday
            HolidayDate::fromComplexFormat('last monday of this month', 5), // Memorial Day
            HolidayDate::fromSimpleFormat("YYYY-06-19"), // Juneteenth
            HolidayDate::fromSimpleFormat("YYYY-07-04"), // Independence Day
            HolidayDate::fromComplexFormat("first monday of this month", 9), // Labor Day
            HolidayDate::fromComplexFormat('second monday of this month', 10), // Columbus Day
            HolidayDate::fromSimpleFormat("YYYY-11-11"), // Veterans Day
            HolidayDate::fromComplexFormat('fourth thursday of this month', 11), // Thanksgiving Day
            HolidayDate::fromSimpleFormat("YYYY-12-25"), // Chirstmas Day
            HolidayDate::fromCallback(function ($year) {
                $date = null;
                if (UnitedStatesNationalHolidays::isInaugurationYear($year)) {
                    $date = UnitedStatesNationalHolidays::getInaugurationDate($year);
                }
                return isset($date) ? $date->getTimestamp($year) : null;
            }),
        ];
        return $holidays;
    }

    /**
    * Gets the inauguration date format (YYYY-MM-DD) based on the given year
    * The inauguration date is calculated as follows:
    * January 20th, unless it falls on a Sunday, then it's the 21st
    *
    * @param int $year
    * @return HolidayDate
    */
    private static function getInaugurationDate(int $year): HolidayDate {
        $date = new DateTime();
        $date->setDate($year, 1, 20);
        $dayOfWeek = date("w", $date->getTimestamp());   
        $sunday = "0";
        
        $dateFormat = "YYYY-01-20";
        if ($dayOfWeek === $sunday) {
            $dateFormat = "YYYY-01-21";    
        } 
        return HolidayDate::fromSimpleFormat($dateFormat);
    }

    /**
    * Checks if the given year is a US inauguration year. The US inauguration
    * happens every 4 years. This uses the 2025 inauguration as the base year
    *
    * @param int $year
    */
    private static function isInaugurationYear(int $year): bool {
        $baseYear = 2025;
        return ($year - $baseYear) % 4 == 0;
    } 

}

