<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $fillable = ['title','piece','format','recommendation','description','price','category_id'];
    protected $appends = ['image_url'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function image(){
        return $this->morphOne(File::class,'fileable');
    }
    public function getImageUrlAttribute(){
        if($this->image){
            return asset('storage/'.$this->image->url);
        }else{
            return 'https://randomuser.me/api/portraits/men/85.jpg';
        }
    }
}
