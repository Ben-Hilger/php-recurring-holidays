<?php

namespace Benhilger\NationalHolidays;

class HolidayDateSimple extends HolidayDate {


    function __construct(private string $dateFormat) {}

    /** 
    * Generates the timestamp of the date format. You can specify YYYY in the
    * format to have it replace that placeholder with the year given 
    *
    * @param int year
    * @return int|null
    * */
    function getTimestamp(int $year): ?int {
        $convertedDate = str_replace("YYYY", $year, $this->dateFormat);
        return strtotime($convertedDate);

    }
}
