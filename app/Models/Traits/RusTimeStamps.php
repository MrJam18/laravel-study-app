<?php

namespace App\Models\Traits;

use DateTime;

trait RusTimeStamps
{
    public function getCreatedAtAttribute(string $date): string
    {
        return $this->getRusDateTime($date);
    }
    public function getUpdatedAtAttribute(string $date): string
    {
        return $this->getRusDateTime($date);
    }
    private function getRusDateTime(string $date): string
    {
        $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        if($dateTime) return $dateTime->format('d.m.Y H:i:s');
        else return $date;
    }

}
