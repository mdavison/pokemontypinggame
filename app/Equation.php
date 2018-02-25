<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equation extends Model
{
    public function getNextEquationID()
    {
        $equation = self::where('id', '>', $this->id)->first();
        if (!empty($equation)) {
            return $equation->id;
        }

        // If there were none, loop back around and return the first one
        $equation = self::first();
        if (!empty($equation)) {
            return $equation->id;
        }

        return null;
    }
}
