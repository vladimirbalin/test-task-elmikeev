<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        "id",
        "name",
        "price",
        "responsible_user_id",
        "group_id",
        "status_id",
        "pipeline_id",
        "loss_reason_id",
        "source_id",
        "created_by",
        "updated_by",
        "created_at",
        "updated_at",
        "closed_at",
        "closest_task_at",
        "is_deleted",
        "score",
        "account_id",
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function catalogElements()
    {
        return $this->hasMany(CatalogElement::class);
    }
}
