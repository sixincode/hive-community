<div>
  <x-hive-display-section component='boxedSection' class="py-2">
    <div>
     <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
       <livewire:hive-community-user-teams-edit-name :team='$team'/>
       <livewire:hive-community-user-teams-member-manage :team='$team'/>
 
         @if (Gate::check('delete', $team) && ! $team->personal_team)
             <x-hive-display-section-border />

             <div class="mt-10 sm:mt-0">
                 @livewire('teams.delete-team-form', ['team' => $team])
             </div>
         @endif
     </div>
   </div>
  </x-hive-display-section>
</div>
