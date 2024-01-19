<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Categorie extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categorie';

    protected $hidden = ['id', 'created_at', 'updated_at', 'pivot'];
}