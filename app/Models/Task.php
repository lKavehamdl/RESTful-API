<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => "boolean"
    ];

    protected $hidden = [
        "updated_at"
    ];

    protected $fillable = [
        'title', 'status'
    ];

    public function publisher(){
        return $this->BelongsTo(User::class, "publisher_id");
    }
}
