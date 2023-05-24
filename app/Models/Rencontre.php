<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rencontre extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'rencontres';

    protected $dates = [
        'date_et_heure',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'equipe_1_id',
        'equipe_2_id',
        'date_et_heure',
        'resultat_1',
        'resultat_2',
        'arbitre_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function equipe_1()
    {
        return $this->belongsTo(Equipe::class, 'equipe_1_id');
    }

    public function equipe_2()
    {
        return $this->belongsTo(Equipe::class, 'equipe_2_id');
    }

    public function getDateEtHeureAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDateEtHeureAttribute($value)
    {
        $this->attributes['date_et_heure'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function arbitre()
    {
        return $this->belongsTo(User::class, 'arbitre_id');
    }
}
