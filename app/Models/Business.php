<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Business extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'business';

    protected $casts = ['id'=> 'string']; 

    protected $keyType = 'string';
    public $incrementing = false;

    // protected $hidden = ['created_at', 'updated_at', 'coordinate_id'];

    public function setDisplayPhoneAttribute($value)
    {
        $this->attributes['display_phone'] = strtolower($value);
    }

    public function categorie()
    {
        return $this->belongsToMany(Categorie::class, 'business_categories');
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function coordinate()
    {
        return $this->belongsTo(Coordinate::class);
    }

    public function photo()
    {
        return $this->belongsToMany(Photo::class, 'business_categories');
    }
}