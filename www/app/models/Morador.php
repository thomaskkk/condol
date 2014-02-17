<?php

class Morador extends Eloquent
{
    protected $table = 'moradores';

    /**
     * Change the aniversario attr to display correctly
     *
     * @param $value
     * @return mixed
     */
    public function getAniversarioAttribute($value)
    {
        return $this->dateToHuman($value);
    }

    /**
     * Convert a date to human redable dd/mm/yyyy format
     *
     * @param $date
     * @return mixed
     */
    public function dateToHuman($date)
    {

        //$date = date("d/m/Y", strtotime($date));
        $date = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3/$2/$1",$date);

        return($date);
    }

    /**
     * Change the aniversario attr to be stored correctly on database
     *
     * @param $value
     * @return mixed
     */
    public function setAniversarioAttribute($value)
    {
        return $this->attributes['aniversario'] = $this->dateToDb($value);
    }

    /**
     * Convert a date to database storage yyyy-mm-dd format
     *
     * @param $date
     * @return mixed
     */
    public function dateToDb($date)
    {
        $date = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3-$2-$1", $date);

        return($date);
    }
}