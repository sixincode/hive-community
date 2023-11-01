<div>
   <x-hive-display-section component='boxedSection' class="p-0">
    <x-hive-display-section component='dividedSection' class='p-0'>
     <x-slot name="mainSec">
       <x-hive-display-form-layout route="createTeam" type="livewire">
         <x-slot name="title">
             {{ __('Team Details') }}
         </x-slot>
         <x-slot name="description">
             {{ __('Create a new team to collaborate with others on projects.') }}
         </x-slot>
         <x-slot name="form">
             <div class="col-span-6">
                 <x-label value="{{ __('Team Owner') }}" />

                 <div class="flex items-center mt-2">
                     <img class="w-12 h-12 rounded-full object-cover" src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}">

                     <div class="ml-4 leading-tight">
                         <div class="text-gray-900 dark:text-white">{{ $this->user->name }}</div>
                         <div class="text-gray-700 dark:text-gray-300 text-sm">{{ $this->user->email }}</div>
                     </div>
                 </div>
             </div>

             <div class="col-span-6 sm:col-span-4">
               <x-hive-form-input
                 component="winny"
                 name="name"
                 type="name"
                 placeholder="{{__('Team Name')}}"
                 required="true"
                 value="{{ old('name', '') }}"
                 wire:model="state.name" autofocus
                 id="name"/>

                 <!-- <x-label for="name" value="{{ __('Team Name') }}" />
                 <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" autofocus />
                 <x-input-error for="name" class="mt-2" /> -->
             </div>

             <div class="col-span-6 sm:col-span-4">
               <x-hive-form-text
                 name="description"
                 type="description"
                 placeholder="{{__('Description')}}"
                 required="true"
                 value="{{ old('description', '') }}"
                 wire:model="state.description" autofocus
                 id="description"/>
             </div>
         </x-slot>
         <x-slot name="actions">
             <x-button>
                 {{ __('Create') }}
             </x-button>
         </x-slot>
      </x-hive-display-form-layout>
     </x-slot>
     <x-slot name="secondSec">

     </x-slot>
   </x-hive-display-section>
  </x-hive-display-section>
</div>
