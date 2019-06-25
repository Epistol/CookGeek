<?php
/**
 * Created by PhpStorm.
 * User: epistol
 * Date: 24/02/19
 * Time: 21:34
 */

namespace App\Traits;

use Tightenco\Collect\Support\Collection;

trait HasTimes
{
    /**
     * @param $time
     *
     * @return int
     */
    public static function verifyTime($time)
    {
        if (!isset($time) || $time === null) {
            return 0;
        } else {
            return intval($time);
        }
    }

    /**
     * @param null $prepMinute
     * @param      $cookMinute
     * @param      $restMinute
     * @param      $prepHeure
     * @param      $cookHeure
     * @param      $restHeure
     *
     * @return \Illuminate\Support\Collection|Collection
     */
    public static function getTimes($prepMinute, $cookMinute, $restMinute, $prepHeure, $cookHeure, $restHeure)
    {
        $datas = collect([
            'prepM' => $prepMinute,
            'cookM' => $cookMinute,
            'restM' => $restMinute,
            'prepH' => $prepHeure,
            'cookH' => $cookHeure,
            'restH' => $restHeure
        ]);

        $filtered = $datas->filter(function ($value, $key) {
            if (!isset($value) || $value === null) {
                return $key;
            } else {
                return intval($value);
            }
        });

        $prep = self::returnTime($filtered->get('prepH'), $filtered->get('prepM'));
        $cook = self::returnTime($filtered->get('cookH'), $filtered->get('cookM'));
        $rest = self::returnTime($filtered->get('restH'), $filtered->get('restM'));

        return collect(['prep' => $prep, 'cook' => $cook, 'rest' => $rest]);
    }

    /**
     * @param $t_h
     * @param $time
     *
     * @return float|int
     */
    public static function returnTime($t_h, $time)
    {
        if ($t_h === null) {
            $t_h = 0;
        }
        if ($time === null) {
            $time = 0;
        }

        return intval(($t_h * 60) + $time);
    }

    /**
     * @param $minutes
     * @param $hours
     *
     * @return int
     */
    public function getUnifiedTime($minutes, $hours)
    {
        if ($minutes === 0) {
            $minutes = intval(0);
        }
        if ($hours === 0) {
            $minutes = intval(0);
        }

        return intval(($hours * 60) + intval($minutes));
    }
}
