<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    use HasFactory;

    /**
     * get validation errors and show them
     *
     * @param $title
     * @param $errors
     * @return array
     */
    public static function error($title , $errors): array
    {
        return [
            "title"     =>  $title ,
            "errors"    =>  $errors ,
        ];
    }

    private function showErrors($errors)
    {
        foreach ($errors as $error)
        {
            return $error;
        }
    }
}
