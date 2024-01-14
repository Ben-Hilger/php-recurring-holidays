<?php

namespace Benhilger\NationalHolidays;

use DateTime;

abstract class HolidayCalendarGroup {

    /** 
    * Generates the holidays for the given year. 
    * If observed is true, it will return the observed dates based on
    * the following rules:
    * If the date falls on Saturday, the observed date will be the Friday before
    * If the date falls on Sunday, the observed date will be the Monday after
    *
    * @param int $year
    * @param bool $observed
    * @return array
    * */ 
    function getHolidays(int $year, bool $observed = false): array {
        $nationalHolidays = [];
        $nationalHolidayFormats = $this->getHolidayFormats($year); 
        foreach($nationalHolidayFormats as $holiday => $dateFormat) {

            if (!isset($dateFormat)) {
                error_log("No format was given for holiday: $holiday, ignoring.");
                continue;
            }

            $timestamp = $dateFormat->getTimestamp($year);
            if (!isset($timestamp)) {
                error_log("Unable to get the timestamp of the date for holiday: $holiday, ignoring.");
                continue;
            } 
            $dateToAdd = new DateTime();
            $dateToAdd->setTimestamp($timestamp);
            $dateToAdd->setTime(0, 0, 0, 0);

            if ($observed) {
                $dateToAdd = $this->convertToObservedHoliday($dateToAdd);
            }
            $nationalHolidays[$holiday] = $dateToAdd;
        }

        return $nationalHolidays;
    }
    
    /**
    * It will adjust the given date to the observed date given the following rules:
    * If the date falls on Saturday, the observed date will be the Friday before
    * If the date falls on Sunday, the observed date will be the Monday after
    * Otherwise, the date stays the same
    *
    * @param DateTimne $date  
    * @return DateTime
    * */
    private function convertToObservedHoliday(DateTime $date): DateTime {
        $dayOfWeek = date("w", $date->getTimestamp());
        $sunday = "0";
        $saturday = "6";

        $convertedDate = new DateTime($date->format("Y-m-d"));

        if ($dayOfWeek === $saturday) {
            $newTimeStamp = strtotime("-1 day", $date->getTimestamp());
            $convertedDate->setTimestamp($newTimeStamp);
        } else if ($dayOfWeek === $sunday) {
            $newTimeStamp = strtotime("+1 day", $date->getTimestamp());
            $convertedDate->setTimestamp($newTimeStamp);
        }
        
        return $convertedDate;
    }

    /** 
    * Checks if the given date is a national holiday
    * If observed is true, it will check against the observed holidays
    *
    * @param DateTime $date
    * @param bool $observed
    *
    * @return bool
    * */
    function isHoliday(DateTime $date, bool $observed = false): bool {
        $year = intval(date("Y", $date->getTimestamp()));
        $date->setTime(0, 0, 0, 0);
        
        $nationalHolidays = $this->getHolidays($year, 
                                                    observed: $observed);
        $matchedDates = array_filter($nationalHolidays, 
            function (DateTime $value) use ($date) {
                return $value == $date;
            }, ARRAY_FILTER_USE_BOTH);
        return count($matchedDates) > 0;
    }

    /**
    * Defined the formats of the holiday dates.
    *
    * @param int $year  
    * 
    * @return array
    * 
    * Expected Format: Map<string, T extends HolidayDate>
    * Example:
    *   [
    *       "day1" => new HolidayDateSimple("YYYY-01-01"),
    *       "day2" => new HolidayDateComplex(1, "first day of this month")
    *   ]
    *
    */
    abstract protected function getHolidayFormats(int $year): array;

}
