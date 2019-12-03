<?php

function get_friendly_date($date){
    return DateTime::createFromFormat('Y-m-d', $date)->format('d M, Y ');
}

