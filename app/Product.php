<?php

namespace CodeCommerce;


use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $fillable = ['category_id', 'name', 'description', 'price', 'featured', 'recommend'];

    public function category()
    {
        return $this->belongsTo('CodeCommerce\Category');
    }

    public function images()
    {
        return $this->hasMany('CodeCommerce\ProductImage');
    }

    public function tags()
    {
        return $this->belongsToMany('CodeCommerce\Tag');
    }

    public function getTagStringAttribute()
    {
        return implode(',', $this->tags()->lists('name'));
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', '=', 1);
    }
    public function scopeRecommend($query)
    {
        return $query->where('recommend', '=', 1);
    }

    public function scopeOfCategory($query, $type)
    {
        return $query->where('category_id', '=', $type);
    }
}