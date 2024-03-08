<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $table = 'events';

    protected $fillable = ['titulo','descricao','cidade','privado'];
    protected $casts = [
        'items' => 'array'
    ];
    protected $dates = ['date'];

    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function users(){
        return $this->belongsToMany(User::class,'event_user','event_id','user_id');
    }
}
