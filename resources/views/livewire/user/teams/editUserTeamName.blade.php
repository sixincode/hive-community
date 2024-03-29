<div>
  <x-hive-display-form-layout route="updateTeamName">
      <x-slot name="title">
          {{ __('Team Name') }}
      </x-slot>

      <x-slot name="description">
          {{ __('The team\'s name and owner information.') }}
      </x-slot>

      <x-slot name="form">
          <!-- Team Owner Information -->
          <div class="col-span-6">
              <x-label value="{{ __('Team Owner') }}" />

              <div class="flex items-center mt-2">
                  <img class="w-12 h-12 rounded-full object-cover" src="{{ $team->owner->profile_photo_url }}" alt="{{ $team->owner->name }}">

                  <div class="ml-4 leading-tight">
                      <div class="text-gray-900 dark:text-white">{{ $team->owner->name }}</div>
                      <div class="text-gray-700 dark:text-gray-300 text-sm">{{ $team->owner->email }}</div>
                  </div>
              </div>
          </div>

          <!-- Team Name -->
          <div class="col-span-6 sm:col-span-4">
              <x-label for="name" value="{{ __('Team Name') }}" />

              <x-input id="name"
                          type="text"
                          class="mt-1 block w-full"
                          wire:model="state.name"
                            />

                  <x-hive-form-text
                    name="description"
                    type="description"
                    placeholder="{{__('Description')}}"
                    required="true"
                    value="{{ old('description', '') }}"
                    wire:model="state.description" autofocus
                    id="description"/>

              <x-input-error for="state.name" class="mt-2" />
          </div>
      </x-slot>

      @if (Gate::check('update', $team))
          <x-slot name="actions">
              <x-hive-display-action-message class="mr-3" on="saved">
                  {{ __('Saved.') }}
              </x-hive-display-action-message>

              <x-hive-form-button tag="button" type="submit">
                  {{ __('Save') }}
              </x-hive-form-button>

          </x-slot>
      @endif
  </x-hive-display-form-layout>
</div>
