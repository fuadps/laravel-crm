<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    protected $guarded = [];

    public function employees() {

        return $this->hasMany(Employee::class);

    }

    public function getUrlPath() {
        return Storage::url($this->logo);
    }
}
