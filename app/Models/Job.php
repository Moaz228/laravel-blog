<?php

namespace App\Models;


class Job
{
    public static function all()
    {
        return[
        ['title' => 'SW Engineer', 'salary' => '5000$'],
        ['title' => 'SW Developer', 'salary' => '100$']
        ];
    }
}
