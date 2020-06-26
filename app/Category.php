<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function getNameAttribute()
	{
		return $this->getTranslate('name');
	}
	public function getDescriptionAttribute()
	{
		return $this->getTranslate('description');
	}

    public function articles(){
       return $this->hasMany(Article::class, 'category_id');
    }
    public function author(){
        return $this->belongsTo(User::class,'created_by');
    }
    public function editor(){
        return $this->belongsTo(User::class,'updated_by');
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
