<?php

namespace Benhilger\NationalHolidays;

enum HolidayDateType {
  case Callback;
  case Simple;
  case Complex;
}