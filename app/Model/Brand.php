<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table='brand';
    protected $primaryKey='brand_id';
    //protected $fillable=['brand_name','brand_url','brand_logo','brand_desc'];
    protected $guarded=[];
}
