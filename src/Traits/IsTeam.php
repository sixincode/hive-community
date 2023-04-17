<?php

namespace Sixincode\HiveCommunity\Traits;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Sixincode\HiveAlpha\Models\HiveModel;
use Sixincode\HiveHelpers\Traits\IsActiveTrait;
use Sixincode\HiveHelpers\Traits\IsDefaultTrait;
use Sixincode\HiveHelpers\Traits\IsFeaturedTrait;
use Sixincode\HiveHelpers\Traits\IsPrivateTrait;
use Sixincode\HiveHelpers\Traits\SortOrderTrait;
use Sixincode\HiveHelpers\Traits\HasOwnerTrait;
use Sixincode\HiveHelpers\Traits\HasSlugTrait;
use Sixincode\HiveHelpers\Events\TeamCreated;
use Sixincode\HiveHelpers\Events\TeamDeleted;
use Sixincode\HiveHelpers\Events\TeamUpdated;
use Sixincode\HiveCommunity\Models\TeamMembership;

abstract class IsTeam extends HiveModel
{
    use HasOwnerTrait;
    use IsActiveTrait;
    use IsDefaultTrait;
    use IsFeaturedTrait;
    use IsPrivateTrait;
    use SortOrderTrait;
    use HasSlugTrait;

    public static function getTableAttribute()
    {
      return config('hive-community.table_names.teams');
    }

    /**
     * Get the owner of the team.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userOwner()
    {
        return $this->belongsTo(config('hive-alpha.models.user'), 'user_id');
    }

    /**
     * Get all of the team's users including its user owner.
     *
     * @return \Illuminate\Support\Collection
     */
    public function allUsers()
    {
        return $this->users->merge([$this->userOwner]);
    }

    /**
     * Get all of the users that belong to the team.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(config('hive-alpha.models.user'),
                                    config('hive-community.table_names.team_user'),
                                    // TeamMembership::class,
                                    // config('hive-community.models.team_membership')
                                    )
                        ->withPivot('role')
                        ->withTimestamps()
                        ->as('membership');
    }

    /**
     * Determine if the given user belongs to the team.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function hasUser($user)
    {
        return $this->users->contains($user) || $user->ownsTeam($this);
    }

    /**
     * Determine if the given email address belongs to a user on the team.
     *
     * @param  string  $email
     * @return bool
     */
    public function hasUserWithEmail(string $email)
    {
        return $this->allUsers()->contains(function ($user) use ($email) {
            return $user->email === $email;
        });
    }

    /**
     * Determine if the given user has the given permission on the team.
     *
     * @param  \App\Models\User  $user
     * @param  string  $permission
     * @return bool
     */
    public function userHasPermission($user, $permission)
    {
        return $user->hasTeamPermission($this, $permission);
    }

    /**
     * Get all of the pending user invitations for the team.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teamInvitations()
    {
        return $this->hasMany(config('hive-community.models.team_invitation'));
    }

    /**
     * Remove the given user from the team.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function removeUser($user)
    {
        if ($user->current_team_id === $this->id) {
            $user->forceFill([
                'current_team_id' => null,
            ])->save();
        }

        $this->users()->detach($user);
    }

    /**
     * Purge all of the team's resources.
     *
     * @return void
     */
    public function purge()
    {
        $this->userOwner()->where('current_team_id', $this->id)
                ->update(['current_team_id' => null]);

        $this->users()->where('current_team_id', $this->id)
                ->update(['current_team_id' => null]);

        $this->users()->detach();

        $this->delete();
    }
}
