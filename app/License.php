<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    protected $table = 'licenses';
    protected $fillable = ['license_no','license_name','image','cid','phone', 'status', 'location','license_type'];
}
