<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Joueur extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'joueurs';

    protected $dates = [
        'date_de_naissance',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nom_joueur',
        'prenom',
        'date_de_naissance',
        'email',
        'dossard',
        'poste',
        'age',
        'nom_equipe_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getDateDeNaissanceAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateDeNaissanceAttribute($value)
    {
        $this->attributes['date_de_naissance'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function nom_equipe()
    {
        return $this->belongsTo(Equipe::class, 'nom_equipe_id');
    }
}
