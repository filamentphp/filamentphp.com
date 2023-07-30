<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Orbit\Concerns\Orbital;

class ArticleCategory extends Model
{
    use HasFactory;
    use Orbital;

    protected $primaryKey = 'slug';

    protected $keyType = 'string';

    public $incrementing = false;

    public static function schema(Blueprint $table)
    {
        $table->string('name');
        $table->string('slug');
    }

    public function getIcon(): ?string
    {
        return $this->content;
    }
}
