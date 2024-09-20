<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';

    // praktikum 1 js 4

    // protected $fillable = ['level_id' , 'username' , 'nama' , 'password'];
    // protected $fillable = ['level_id', 'username', 'nama'];
    // protected $fillable = ['level_id' , 'username' , 'nama' , 'password'];

    // JS 4 PRAKTIKUM 2.7
    protected $fillable = ['level_id' , 'username' , 'nama' , 'password'];
    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }
}
