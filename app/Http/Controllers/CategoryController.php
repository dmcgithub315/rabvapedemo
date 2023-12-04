<?php

namespace App\Http\Controllers;

use App\Helpers\PostMetaHelper;
use App\Models\Post;
use App\Models\Terms;
use App\Models\TermTaxonomy;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class CategoryController extends BaseController
{
    function viewCategoryPage()
    {
//        return view('category');
    }

    function listCategories()
    {
        $terms = Terms::join(TABLE_TERM_TAXONOMY .' as term_tax', TABLE_TERMS.'.term_id', '=', 'term_tax.term_id')
        ->orderBy('count', 'DESC')
        ->where('term_tax.taxonomy', 'category')
        ->select(['term_tax.term_id as id', 'name', 'count'])
        ->get()->toArray();

        return view('category', compact('terms'));
    }

    function listItems(\Request $request)
    {
        $perPage = request('postPerPage', 12);
        $sortBy = request('sort', 'default');
        $page = request('page', 1);
        $offset = ($page - 1) * $perPage;

        $items = Post::query()
            ->join(TABLE_POSTMETA,  'ID', '=', TABLE_POSTMETA.'.post_id')
            ->where('post_type', 'post')
            ->where('post_status', 'publish')
            ->where(TABLE_POSTMETA.'.meta_key', 'price')
            ->select('ID', 'post_title', 'meta_value as price')
            ->orderBy('price', 'ASC') // Sắp xếp tăng dần theo giá
            ->skip($offset)
            ->take($perPage)
            ->get();

        $total_posts = Post::query()
            ->where('post_type', 'post')
            ->where('post_status', 'publish')
            ->count();
        $currentPage = $page;
        $totalPages = ceil($total_posts / $perPage);

        $product = [];
        foreach ($items as $key => $item) {
            $product[$key]['ID'] = $item['ID'];
            $product[$key]['post_title'] = $item['post_title'];
            $post_metas = PostMetaHelper::get_post_metas($item['ID']);
            $product[$key]['pre_price'] = !empty($post_metas['preprice']) ? number_format($post_metas['preprice']) : 0;
            $product[$key]['price'] = !empty($post_metas['price']) ? number_format($post_metas['price']) : 0;
            $product[$key]['quantity'] = !empty($post_metas['quantity']) ? number_format($post_metas['quantity']) : 0;
            $product[$key]['thumbnail'] = !empty($post_metas['_thumbnail_id']) ? PostMetaHelper::get_thumbnail_url_by_post_id($post_metas['_thumbnail_id']) : '';
        }

        return [
            'products' => $product,
            'page' => $currentPage,
            'totalPages' => $totalPages,
        ];
    }

}
