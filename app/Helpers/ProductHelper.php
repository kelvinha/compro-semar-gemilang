<?php

namespace App\Helpers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Cache;

class ProductHelper
{
    /**
     * Get all active products
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getAll()
    {
        return Cache::remember('products_all', 60 * 10, function () {
            return Product::where('status', 'active')
                ->orderBy('order')
                ->orderBy('created_at', 'desc')
                ->get();
        });
    }
    
    /**
     * Get featured products
     *
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getFeatured($limit = 6)
    {
        return Cache::remember('products_featured_' . $limit, 60 * 10, function () use ($limit) {
            return Product::where('status', 'active')
                ->where('featured', true)
                ->orderBy('order')
                ->orderBy('created_at', 'desc')
                ->take($limit)
                ->get();
        });
    }
    
    /**
     * Get a specific number of products
     *
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getLimit($limit = 6)
    {
        return Cache::remember('products_limit_' . $limit, 60 * 10, function () use ($limit) {
            return Product::where('status', 'active')
                ->orderBy('order')
                ->orderBy('created_at', 'desc')
                ->take($limit)
                ->get();
        });
    }
    
    /**
     * Get products by category
     *
     * @param ProductCategory $category
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getByCategory(ProductCategory $category, $limit = null)
    {
        $query = Product::where('status', 'active')
            ->where('category_id', $category->id)
            ->orderBy('order')
            ->orderBy('created_at', 'desc');
            
        if ($limit) {
            $query->take($limit);
        }
        
        return $query->get();
    }
    
    /**
     * Get related products
     *
     * @param Product $product
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getRelated(Product $product, $limit = 4)
    {
        $query = Product::where('status', 'active')
            ->where('id', '!=', $product->id);
            
        if ($product->category_id) {
            $query->where('category_id', $product->category_id);
        }
        
        return $query->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->take($limit)
            ->get();
    }
    
    /**
     * Get all active product categories
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getAllCategories()
    {
        return Cache::remember('product_categories_all', 60 * 10, function () {
            return ProductCategory::where('status', 'active')
                ->orderBy('order')
                ->orderBy('created_at', 'desc')
                ->get();
        });
    }
    
    /**
     * Clear product cache
     *
     * @return void
     */
    public static function clearCache()
    {
        Cache::forget('products_all');
        Cache::forget('products_featured');
        Cache::forget('product_categories_all');
        
        for ($i = 1; $i <= 12; $i++) {
            Cache::forget('products_limit_' . $i);
            Cache::forget('products_featured_' . $i);
        }
    }
}
