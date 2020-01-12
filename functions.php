<?php

const SALARY_LIMIT = 100000;

/**
 * Formar number (salary) in american format
 * @param $number
 * @return string
 */
function number_format_english($number) {
    $number = explode('-', $number);
    return implode('/', $number);
}

/**
 * Enhance (HTML) salaries lower than SALARY_LIMIT
 * @param $value
 * @return int|string
 */
function format_low_salary($value) {
    $value = (int) $value;
    if ($value < SALARY_LIMIT) {
        $value = '<span class="lowSalary">$' . number_format($value, 0, '.', ',') . '</span>';
    } else {
        $value = '$' . number_format($value, 0, '.', ',');
    }
    return $value;
}