<?php

namespace SysGESSI;

use Illuminate\Database\Eloquent\Model;

class Google extends Model
{
        public function getLocation($column)
    {
        return self::select(DB::Raw('ST_AsText('.$column.') AS '.$column))
            ->where('id', $this->id)
            ->first()
            ->$column;
    }

    /**
     * Format and return array of (lat,lng) pairs of points fetched from the database.
     *
     * @return array $coords
     */
    public function getCoordinates()
    {
        $coords = [];

        if (!empty($this->spatial)) {
            foreach ($this->spatial as $column) {
                $clear = trim(preg_replace('/[a-zA-Z\(\)]/', '', $this->getLocation($column)));
                if (!empty($clear)) {
                    foreach (explode(',', $clear) as $point) {
                        list($lat, $lng) = explode(' ', $point);
                        $coords[] = [
                            'lat' => $lat,
                            'lng' => $lng,
                        ];
                    }
                }
            }
        }

        return $coords;
    }
}
