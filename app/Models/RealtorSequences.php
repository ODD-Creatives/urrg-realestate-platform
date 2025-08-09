<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Realtor extends Model
{
    protected $primaryKey = 'realtor_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->realtor_id = $model->generateRealtorId();
        });
    }

    protected function generateRealtorId(): string
    {
        $date = now();
        $datePrefix = $date->format('Ymd'); // For sequence tracking
        $displayDate = $date->format('mdy'); // For the ID (month, day, 2-digit year)

        // Use database transaction to prevent race conditions
        return DB::transaction(function () use ($datePrefix, $displayDate) {
            $sequence = DB::table('realtor_sequences')
                ->where('date_prefix', $datePrefix)
                ->lockForUpdate()
                ->first();

            if ($sequence) {
                $newSequence = $sequence->last_sequence + 1;
                DB::table('realtor_sequences')
                    ->where('date_prefix', $datePrefix)
                    ->update(['last_sequence' => $newSequence]);
            } else {
                $newSequence = 1;
                DB::table('realtor_sequences')->insert([
                    'date_prefix' => $datePrefix,
                    'last_sequence' => $newSequence,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            return 'URR' . $displayDate . str_pad($newSequence, 2, '0', STR_PAD_LEFT);
        });
    }
}