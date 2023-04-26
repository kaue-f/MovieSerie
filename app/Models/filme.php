<?php
declare(strict_types=1);

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class filme extends Model
{
    use HasFactory, HasUuid;

    protected $guarded = ['id'];

    protected $fillable = ['capa', 'genero', 'classificacao', 'finalizou', 'nota'];
}
