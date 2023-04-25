<?php
declare(strict_types=1);

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class filme extends Model
{
    use HasFactory, HasUuid;

    protected $guarded = [];

    protected $fillable = ['f_capa', 'f_genero', 'f_classificacao', 'f_finalizou', 'f_nota'];
}
