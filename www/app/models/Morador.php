<?php

class Morador extends Eloquent
{
    protected $table = 'moradores';

    public function getAniversarioAttribute($value)
    {
        return $this->dateToHuman($value);
    }
    public function dateToHuman($date)
    {

        //$date = date("d/m/Y", strtotime($date));
        $date = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3/$2/$1",$date);

        return($date);
    }
}