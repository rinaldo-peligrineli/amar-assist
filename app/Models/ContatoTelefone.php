<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contato;


class ContatoTelefone extends Model
{
    use HasFactory;

    protected $table = 'contato_telefones';
    protected $fillable = ['contato_id', 'tipo_telefone_id', 'telefone'];
    protected $guarded = ['tipo_telefone_id']; 

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contato()
    {
        return $this->belongsTo('App\Models\Contato');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function tipoTelefone()
    {
        return $this->belongsTo('App\Models\TipoTelefone');
    }
}
