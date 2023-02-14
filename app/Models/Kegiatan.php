<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kegiatan extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];
    protected $primaryKey = 'id_kegiatan';

    protected static function boot(){
      parent::boot();

      static::creating(function($model){
        if($model->getKey() == null){
          $model->setAttribute($model->getKeyName(), Str::uuid()->toString());
        }
      });
    }

    // public function scopeNik($query)
    // {
    //   if(request('nik')){
    //     return $query->participants->where('nik', 'like', request('nik'));
    //   }
    // }

    public function participants()
    {
      return $this->belongsToMany(Participant::class, 'kehadiran')->as('participants');
    }
}
