<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'imagem'];

    public function rules()
    {
        return [
            'nome' => 'required|unique:marcas,nome,'.$this->id.'|min:3',
            //'imagem' => 'required|file|mimes:png,docx,xlsx,pdf,ppt,jpeg,mp3',
            'imagem' => 'required|file|mimes:png',
        ];
    }

    public function feedback()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'nome.unique' => 'O nome da marca já existe',
            'nome.min' => 'O nome deve ter no mínimo 3 caracteres',
            'imagem.mimes' => 'O arquivo precisa ter a extensão .png',
        ];
    }

    public function modelos()
    {
        //uma marca contém vários modelos

        return $this->hasMany('App\Models\Modelo');
    }
}
