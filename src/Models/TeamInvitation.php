<?php

namespace Sixincode\HiveCommunity\Models;

use Sixincode\HiveAlpha\Models\HiveModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Jetstream\Jetstream;
use Laravel\Jetstream\TeamInvitation as JetstreamTeamInvitation;

class TeamInvitation extends JetstreamTeamInvitation
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
      'email',
      'role',
      'description',
      'status',
  ];

  public function getTable()
  {
    return config('hive-community.table_names.team_invitation');
  }

  /**
   * Get the team that the invitation belongs to.
   */
  public function team(): BelongsTo
  {
      return $this->belongsTo(Team::class);
  }



}
