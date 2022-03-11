<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contato;

class ContatoEmail extends Model
{
    use HasFactory;

    protected $table = 'contato_emails';
    protected $fillable = ['contato_id', 'email'];

     /**
     * Get the user that owns the phone.
     */
    public function contato()
    {
        return $this->belongsTo(Contato::class);
    }
}
