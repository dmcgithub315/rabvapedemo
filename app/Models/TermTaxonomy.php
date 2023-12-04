<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TermTaxonomy
 *
 * @property int $term_taxonomy_id
 * @property int $term_id
 * @property string $taxonomy
 * @property string $description
 * @property int $parent
 * @property int $count
 * @method static \Illuminate\Database\Eloquent\Builder|TermTaxonomy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TermTaxonomy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TermTaxonomy query()
 * @method static \Illuminate\Database\Eloquent\Builder|TermTaxonomy whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TermTaxonomy whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TermTaxonomy whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TermTaxonomy whereTaxonomy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TermTaxonomy whereTermId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TermTaxonomy whereTermTaxonomyId($value)
 * @mixin \Eloquent
 */
class TermTaxonomy extends Model
{
    protected $table = 'dv_term_taxonomy';
    use HasFactory;
    protected $guarded = [];
}
