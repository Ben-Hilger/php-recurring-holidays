<?php

namespace Benhilger\NationalHolidays;

use Benhilger\NationalHolidays\HolidayDateType;

class HolidayDate {

    private $type;

    private $callback;

    private ?string $format;
    private ?int $month;

    function getTimestamp(int $year): ?int {
        $date = null;
        switch ($this->type) {
            case HolidayDateType::Simple:
                if (isset($this->format)) {
                    $convertedDate = str_replace("YYYY", $year, $this->format);
                    $date = strtotime($convertedDate);
                }
                break;
            case HolidayDateType::Complex:
                if (isset($this->format, $this->month)) {
                    $baseDate = strtotime("$year-$this->month-01");
                    $date = strtotime($this->format, $baseDate);
                }
                break;
            case HolidayDateType::Callback:
                if (isset($this->callback)) {
                    $func = $this->callback;
                    $date = $func($year);
                }
                break;
            default:
        }
        return $date;
    }

    /**
     * Sets a simple date with basic replacement for a given year
     * Year placeholder: YYYY
     * Example: YYYY-01-01
     * 
     * @param string $format
     * @return HolidayDate
     */
    public function setSimpleFormat(string $format): HolidayDate {
        $this->type = HolidayDateType::Simple;
        $this->format = $format;
        return $this;
    }
   
    /**
     * Sets a complex date that support PHP strtotime functionality
     *
     * @param string $complexFormat
     * @return HolidayDate
     */
    public function setComplexFormat(string $complexFormat, int $month): HolidayDate {
        $this->type = HolidayDateType::Complex;
        $this->month = $month;
        $this->format = $complexFormat;
        return $this;
    }

    /**
     * Sets the type of the date to fallback
     *
     * @param [type] $callback
     * @return HolidayDate
     */
    public function setCallback($callback): HolidayDate {
        $this->type = HolidayDateType::Callback;
        $this->callback = $callback;
        return $this;
    }

    /**
     * 
     * @param [type] $callback
     * @return HolidayDate
     */
    static function fromCallback($callback): HolidayDate {
        $newDate = new HolidayDate();
        return $newDate->setCallback($callback);
    }

    /**
     * 
     * @param string $format
     * @return HolidayDate
     */
    static function fromSimpleFormat(string $format): HolidayDate {
        $newDate = new HolidayDate();
        return $newDate->setSimpleFormat($format);
    }

    /**
     * @param string $format
     * @param integer $month
     * @return HolidayDate
     */
    static function fromComplexFormat(string $format, int $month): HolidayDate {
        $newDate = new HolidayDate();
        return $newDate->setComplexFormat($format, $month);
    }
}
