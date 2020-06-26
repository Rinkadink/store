<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	public function getNameAttribute()
	{
		return $this->getTranslate('name');
	}
	public function getDescriptionAttribute()
	{
		return $this->getTranslate('description');
	}



    const UNITS=[
        1=>'kg',
        2=>'L',
        3=>'piece'
    ];
    public function getUnitAttribute($value){
        if($value==NULL){
            return NULL;
        }
        return self::UNITS[$value];
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id')->withDefault();
    }
    public function author(){
        return $this->belongsTo(User::class,'created_by');
    }
    public function editor(){
        return $this->belongsTo(User::class,'updated_by');
    }
    public function images(){
        return $this->hasMany(ArticleImage::class);
    }
    public function image(){
        return $this->belongsTo(ArticleImage::class,'featured_image');
    }
    public function image_path(){
        return 'uploads/articles/'.$this->featured_image.'.jpg';
    }
    public function thumbnail_path(){
        return 'uploads/articles/thumbnails/'.$this->featured_image.'.jpg';
    }
    public function getTranslate($attribute)
    {
        $attribute_en=$attribute."_en";
        $attribute_al=$attribute."_al";
        $attribute_sr=$attribute."_sr";
        $locale=app()->getLocale();

        if($locale=='en'&&!is_null($this->attributes[$attribute_en]))
        {
        	return $this->attributes[$attribute_en];
        }
        elseif($locale=='al'&&!is_null($this->attributes[$attribute_al]))
        {
        	return $this->attributes[$attribute_al];
        }
        else{
        	return $this->attributes[$attribute_sr];
        }
    }
}
