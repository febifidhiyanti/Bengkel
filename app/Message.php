<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Message extends Model
{
    protected $table = "messages";
    protected $fillable = ['user_id','message','read_at'];
    protected $primaryKey = 'id';
  
    public function user()
    {
        //KITA GUNAKAN BELONGSTO KARENA USER BERTINDAK SEBAGAI DATA INDUK
        return $this->belongsTo(User::class);
    }

}
