<?php 


function form_time($name) {
    $hours = array();
    $hours[''] = '';
    $minutes = array();
    $minutes[''] = '';
    $ampm = array('', 'AM' => 'AM', 'PM' => 'PM');

    for ($i = 1; $i <= 12; $i++) {
        if ($i < 10)
            $hours['0' . $i] = '0' . $i;
        else
            $hours[$i] = $i;
    }

    for ($i = 0; $i <= 59; $i++) {
        if ($i < 10)
            $minutes['0' . $i] = '0' . $i;
        else
            $minutes[$i] = $i;
    }

    return form_dropdown($name . 'Hours', $hours) . ' : ' . form_dropdown($name . 'Minutes', $minutes) . ' ' . form_dropdown($name . 'AMPM', $ampm);
}

function form_date($name) {
    $days = array();
    $days[''] = '';
    $months = array();
    $months[''] = '';

    for ($i = 1; $i <= 31; $i++) {
        if ($i < 10)
            $days['0' . $i] = '0' . $i;
        else
            $days[$i] = $i;
    }

    for ($i = 1; $i <= 12; $i++) {
        if ($i < 10)
            $months['0' . $i] = '0' . $i;
        else
            $months[$i] = $i;
    }

    return form_dropdown($name . 'Month', $months) . ' / ' .form_dropdown($name . 'Day', $days);
}
