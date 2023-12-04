<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Options
 *
 * @property int $option_id
 * @property string $option_name
 * @property string $option_value
 * @property string $autoload
 * @method static \Illuminate\Database\Eloquent\Builder|Options newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Options newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Options query()
 * @method static \Illuminate\Database\Eloquent\Builder|Options whereAutoload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Options whereOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Options whereOptionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Options whereOptionValue($value)
 * @mixin \Eloquent
 */
class Options extends Model
{
    protected $table = 'dv_options';
    use HasFactory;
    protected $guarded = [];
}
