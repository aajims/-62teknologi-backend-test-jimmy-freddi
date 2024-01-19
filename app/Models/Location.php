<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Location extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'location';

    protected $hidden = ['id', 'created_at', 'updated_at'];
}