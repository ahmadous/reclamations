<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class demande extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'status',
    ];

   /**
    * Get the user that owns the demande
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function user(): BelongsTo
   {
       return $this->belongsTo(User::class, 'foreign_key', 'other_key');
   }

}
