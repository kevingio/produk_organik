<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'path', 'product_id',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'created_at', 'updated_at',
  ];

  public function product()
  {
    return $this->belongsTo('App\Product', 'id');
  }
}
