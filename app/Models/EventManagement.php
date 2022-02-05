<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventManagement extends Model
{
    use HasFactory;
    public $sortable = ['id', 'name'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'start_date',
        'end_date', 'organizer', 'description'];

   
}
