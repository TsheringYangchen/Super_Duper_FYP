<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bin extends Model
{
    protected $table='bins';
    protected $fillable=['license_no', 'violation_date', 'violation_type', 'user_id', 'image'];
}
