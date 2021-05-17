<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;


use \Esensi\Model\Model;
class Product extends Model
{
    public $table = 'products';
    public $primaryKey = 'id';
    public $fillable = ['name','barcode','description','imagepath','price','kCal','protein','fats','carbohydrates','created_at','updated_up'];

    protected $rules = ['name'=>['required','max: 128','unique'],'barcode'=>['required','max: 128','unique'],];
}
