<?php

namespace Sixincode\HiveCommunity\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Jetstream\Events\TeamCreated;
use Laravel\Jetstream\Events\TeamDeleted;
use Laravel\Jetstream\Events\TeamUpdated;
use Laravel\Jetstream\Team as JetstreamTeam;
use Sixincode\HiveAlpha\Traits\HiveModelTraits;
use Sixincode\HiveHelpers\Traits as HelperTraits;
use Sixincode\HiveCommunity\Database\Factories\TeamFactory;

class Team extends JetstreamTeam
{
    use HiveModelTraits;
    use HelperTraits\HasCodeTrait;
    use HelperTraits\HasOwnerTrait;
    use HelperTraits\HasReferenceTrait;
    use HelperTraits\IsActiveTrait;
    use HelperTraits\IsDefaultTrait;
    use HelperTraits\IsFeaturedTrait;
    use HelperTraits\IsPrivateTrait;
    use HelperTraits\SortOrderTrait;
    use HasFactory;

    // public function __construct()
    // {
    //   parent::__construct();
    //   $this->translatable[] = 'name';
    //   $this->translatable[] = 'description';
    //
    //   $this->casts['name'] = 'array';
    //   $this->casts['description'] = 'array';
    //   $this->casts['personal_team'] = 'boolean';
    //
    //   $this->orderable[] = 'id';
    //   $this->orderable[] = 'name';
    //   $this->orderable[] = 'type';
    //
    //   $this->fillable[] = 'name';
    //   $this->fillable[] = 'description';
    //   $this->fillable[] = 'personal_team';
    //   $this->fillable[] = 'type';
    //   $this->fillable[] = 'user_id';
    // }

    public $guarded = [];
    public $fillable = ['personal_team'];
    // public $fillable[] = 'personal_team';

    /**
     * The event map for the model.
     *
     * @var array<string, class-string>
     */
    protected $dispatchesEvents = [
        'created' => TeamCreated::class,
        'updated' => TeamUpdated::class,
        'deleted' => TeamDeleted::class,
    ];

    public function getTable()
    {
      return config('hive-community.table_names.teams');
    }

    public static function slugOriginElement()
    {
      return 'name';
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function newFactory(): TeamFactory
    {
        return TeamFactory::new();
    }

    public function getDetailsAttributes()
    {
      return [
        'name'         => $this->name,
        'description'  => $this->description,
        'code'         => $this->code,
        'slug'         => $this->slug,
      ];
    }

}
