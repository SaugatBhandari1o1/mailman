<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    use HasFactory;
    protected $table= 'tbl_city';
    protected $fillable = [
        'name',
        'province_id'
    ] ;

    public function Province(){
        return $this->belongsTo(Province::class, 'province_id');
    }
}
