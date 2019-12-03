<?php

function kobo_conversion($amount)
{
    return (int)$amount * 100;
}

function naira_conversion($amount_kobo)
{
    return (int)$amount_kobo / 100;
}