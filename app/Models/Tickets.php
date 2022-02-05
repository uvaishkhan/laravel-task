<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;
    protected $casts = [
        'price' => 'float'
    ];

    public $sortable = ['id', 'name'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['event_management_id','name', 'price'];
    
}
