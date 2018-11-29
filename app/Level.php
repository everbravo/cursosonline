<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Level
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Level newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Level newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Level query()
 * @mixin \Eloquent
 * @property-read \App\Course $course
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Level whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Level whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Level whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Level whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Level whereUpdatedAt($value)
 */
class Level extends Model
{
    public function course(){
    	return $this->hasOne(Course::class);
    }
}
