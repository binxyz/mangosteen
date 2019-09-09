<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class CarBrand extends Model
{
    use Searchable;
    protected $fillable = ['name', 'story', 'photos', 'tags'];
    public function searchableAs()
    {
        return '_doc';
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->name,
            'content' => $this->story
        ];
    }
}