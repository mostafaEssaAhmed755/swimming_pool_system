<?php

namespace App;
use App\Gymnastic;
use App\Trainingsession;
use App\Preparingsession;
use Illuminate\Database\Eloquent\Model;

class Trainingdate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "date" ,
        "from",
        "to",
        "gymnastic_id",
        "status",
    ];

       /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'trainingdates';
    /**
     * Get the user that owns the Trainingdate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gymnastic()
    {
        return $this->belongsTo(Gymnastic::class);
    }
    public function trainingsessions()
    {
        return $this->hasMany(Trainingsession::class);
    }
    public function preparingsession()
    {
        return $this->hasOne(Preparingsession::class);
    }
}
