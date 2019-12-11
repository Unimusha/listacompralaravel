<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoUser extends Model {
    //
    protected $table      = "productosuser";
    //protected $primaryKey = ['producto_id', 'user_id'];

    public function user() {
        return $this->belongsToMany('App\User')
            ->withTimestamps();
    }
    public function producto() {
        return $this->belongsToMany('App\Producto')
            ->withTimestamps();
    }
}
