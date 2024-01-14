<?php

namespace Benhilger\NationalHolidays;

abstract class HolidayDate {

    abstract function getTimestamp(int $year): ?int;

}
