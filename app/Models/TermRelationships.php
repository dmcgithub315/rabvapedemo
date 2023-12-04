<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TermRelationships
 *
 * @property int $object_id
 * @property int $term_taxonomy_id
 * @property int $term_order
 * @method static \Illuminate\Database\Eloquent\Builder|TermRelationships newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TermRelationships newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TermRelationships query()
 * @method static \Illuminate\Database\Eloquent\Builder|TermRelationships whereObjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TermRelationships whereTermOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TermRelationships whereTermTaxonomyId($value)
 * @mixin \Eloquent
 */
class TermRelationships extends Model
{
    protected $table = 'dv_term_relationships';
    use HasFactory;
    protected $guarded = [];
}
