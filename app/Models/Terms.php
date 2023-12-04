<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Terms
 *
 * @property int $term_id
 * @property string $name
 * @property string $slug
 * @property int $term_group
 * @method static \Illuminate\Database\Eloquent\Builder|Terms newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Terms newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Terms query()
 * @method static \Illuminate\Database\Eloquent\Builder|Terms whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Terms whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Terms whereTermGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Terms whereTermId($value)
 * @mixin \Eloquent
 */
class Terms extends Model
{
    protected $table = TABLE_TERMS;
    use HasFactory;
    protected $guarded = [];
}
