<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Terms;
use App\Models\TermTaxonomy;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class SingleController extends BaseController
{
    function viewCategoryPage()
    {
//        return view('category');
    }

    function loadSinglePage(\Request $request, $productId)
    {
        $item = Post::query()->where('ID', $productId)->first();
        $terms = Terms::join(TABLE_TERM_TAXONOMY .' as term_tax', TABLE_TERMS.'.term_id', '=', 'term_tax.term_id')
            ->orderBy('count', 'DESC')
            ->where('term_tax.taxonomy', 'category')
            ->select(['term_tax.term_id as id', 'name', 'count'])
            ->get()->toArray();

        return view('single', compact('item', 'terms'));
    }

}
