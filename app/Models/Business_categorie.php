<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Business_categorie extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'business_categories';

    public function categorie()
    {
        return $this->belongsToMany(Categorie::class, 'categorie_id');
    }

    public function photo()
    {
        return $this->belongsToMany(Photo::class, 'photo_id');
    }
}