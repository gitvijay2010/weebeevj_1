<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{

  //protected $table = 'menu_items';
  
	public function parent() {

        return $this->hasOne(MenuItem::class, 'id', 'parent_id');
    }

    public function children() {

        return $this->hasMany(MenuItem::class, 'parent_id', 'id');
    }  

    public static function tree() {

        return static::with(implode('.', array_fill(0, 4, 'children')))->where('parent_id', '=', NULL)->get();
    }
}
