<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TermMeta
 *
 * @property int $meta_id
 * @property int $term_id
 * @property string|null $meta_key
 * @property string|null $meta_value
 * @method static \Illuminate\Database\Eloquent\Builder|TermMeta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TermMeta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TermMeta query()
 * @method static \Illuminate\Database\Eloquent\Builder|TermMeta whereMetaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TermMeta whereMetaKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TermMeta whereMetaValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TermMeta whereTermId($value)
 * @mixin \Eloquent
 */
class TermMeta extends Model
{
    protected $table = 'dv_termmeta';
    use HasFactory;
    protected $guarded = [];
}
