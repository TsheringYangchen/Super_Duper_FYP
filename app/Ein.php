<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ein extends Model
{
    protected $table='eins';
    protected $fillable=['license_no', 'violation_date', 'violation_type', 'user_id', 'image'];
}
