<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Coordinate extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'coordinate';

    protected $hidden = ['id', 'created_at', 'updated_at'];
}