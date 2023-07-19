<?php
namespace App\Helpers;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Front
{
    /**
     * Formatea la fecha para entregar el día en formato 00
     * @param $date
     * @return string
     */
    public static function get_day($date): string
    {
        return str_pad(
                Carbon::parse($date) -> day
            ,   2
            ,   '0'
            ,   STR_PAD_LEFT
        );
    }

    /**
     * Formatea la fecha para entregarnos un nombre corto en español del mes
     * @param $date
     * @return string
     */
    public static function get_month($date): string
    {
        $meses = [
                1 => 'ENE'
            ,   2 => 'FEB'
            ,   3 => 'MAR'
            ,   4 => 'ABR'
            ,   5 => 'MAY'
            ,   6 => 'JUN'
            ,   7 => 'JUL'
            ,   8 => 'AGO'
            ,   9 => 'SEP'
            ,   10 => 'OCT'
            ,   11 => 'NOV'
            ,   12 => 'DIC'
        ];
        return $meses[Carbon::parse($date) -> month];
    }

    /**
     * Formatea la fecha para entregarnos el formato en español dd mm... YYYY
     * @param $date
     * @return string
     */
    public static function format_date($date): string
    {
        $meses = [
                1 => 'enero'
            ,   2 => 'febrero'
            ,   3 => 'marzo'
            ,   4 => 'abril'
            ,   5 => 'mayo'
            ,   6 => 'junio'
            ,   7 => 'julio'
            ,   8 => 'agosto'
            ,   9 => 'septiembre'
            ,   10 => 'octubre'
            ,   11 => 'noviembre'
            ,   12 => 'diciembre'
        ];

        $dt = Carbon::parse($date);

        $day = str_pad(
                $dt -> day
            ,   2
            ,   '0'
            ,   STR_PAD_LEFT
        );
        $month = $meses[$dt -> month];

        return "$day $month {$dt -> year}";
    }

    public static function get_yutup_code($url): ?string
    {
        if( Str::contains($url, ['youtube.com', 'youtu.be']) )
        {
            if( Str::contains($url, ['youtu.be', 'embed/']) )
            {
                $code = Str::afterLast($url, '/');
            }
            else{
                $code = Str::afterLast($url, '?v=');
            }
            return $code;
        }
        return NULL;
    }
}
