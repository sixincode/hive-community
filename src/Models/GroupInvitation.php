<?php

namespace Sixincode\HiveCommunity\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Sixincode\HiveAlpha\Models\HiveModel;
use Sixincode\HiveHelpers\Traits\IsActiveTrait;
use Sixincode\HiveHelpers\Traits\IsDefaultTrait;
use Sixincode\HiveHelpers\Traits\IsPrivateTrait;

class GroupInvitation extends HiveModel
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'role',
        'code',
        'type',
        'status',
    ];

    /**
     * Get the team that the invitation belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
         return $this->group();
    }

    public function group()
    {
        return $this->belongsTo(config('hive-community.models.group'));
    }
}
