<?php

namespace App\Helpers;

use App\Models\Post;
use App\Models\PostMeta;

class PostMetaHelper
{
    static function get_field($post_id, $field)
    {
        if (!$post_id || !$field) return '';
       $post_meta = PostMeta::query()->where('post_id', $post_id)->where('meta_key', $field)->select(['meta_value'])->first();
       if (!$post_meta) return '';
       return $post_meta->meta_value;
    }

    static function get_post_metas($post_id): array
    {
        if (!$post_id) return [];
        $post_metas = PostMeta::query()->where('post_id', $post_id)->select(['meta_key', 'meta_value'])->get();
        $return = [];
        foreach ($post_metas as $post_meta) {
            $return[$post_meta->meta_key] = $post_meta->meta_value;
        }
        unset($post_metas);
        return $return;
    }

    static function get_thumbnail_url($post_id)
    {
        if (!$post_id) return '';
        $post_thumbnail_id = PostMeta::query()->where('post_id', $post_id)->where('meta_key', '_thumbnail_id ')->select(['meta_value'])->first();
        $post_thumbnail_url = Post::query()->where('ID', $post_thumbnail_id->meta_value)->select(['guid'])->first();
        return $post_thumbnail_url->guid;
    }
    static function get_thumbnail_url_by_post_id($post_id)
    {
        if (!$post_id) return '';
        $post_thumbnail_url = Post::query()->where('ID', $post_id)->select(['guid'])->first();
        return $post_thumbnail_url->guid;
    }
    static function get_album($post_id)
    {
        if (!$post_id) return '';
        $album_ids = PostMeta::query()->where('post_id', $post_id)->where('meta_key', 'album')->pluck('meta_value')->toArray();
        $numbersArray = [];
        foreach ($album_ids as $serializedData) {
            // Sử dụng hàm unserialize để lấy mảng từ chuỗi serialized
            $arrayData = unserialize($serializedData);

            // Trích xuất các số từ mảng
            $numbers = array_values(array_filter($arrayData, 'is_numeric'));

            $image_url = Post::query()->whereIn('ID', $numbers)->pluck('guid')->toArray();

            // Thêm mảng số vào mảng kết quả
            $numbersArray = array_merge($numbersArray, $image_url);
        }
        return $numbersArray;
    }
}
