<?php

namespace Benhilger\NationalHolidays;

class HolidayDateComplex extends HolidayDate {

    function __construct(private int $month, private string $dateOperation) {}

    /**
    * Generates the date based on the special date operation in the given year
    * Returns the timestamp representation of the date
    * @param int $year
    * @return int
    */    
    function getTimestamp(int $year): int {
        $baseDate = strtotime("$year-$this->month-01");
        return strtotime($this->dateOperation, $baseDate);
    }

}
