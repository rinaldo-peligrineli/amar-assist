<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ContatoTelefone;
use App\Models\ContatoEmail;

class Contato extends Model
{
    use HasFactory;

    protected $table = 'contatos';
    protected $fillable = ['nome', 'endereco', 'cidade', 'estado', 'bairro' , 'cep'];
  
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function telefones()
    {
        return $this->hasMany(ContatoTelefone::class);
    }

      /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function emails()
    {
        return $this->hasMany(ContatoEmail::class);
    }
}
