<div>
  <x-hive-display-section component='boxedSection' class="py-2">
    <x-hive-display-section component='dividedSection' class='py-2'>
     <x-slot name="mainSec">
       <div class="px-2 sm:px-4">
         <div class="grid sm:grid-cols-2 ">
       <div class="flex space-x-4">
           <div class="bg-gray-300 rounded-lg h-16 w-16">
            </div>
           <div>
             <h4 class="text-xl lg:text-2xl font-bold text-gray-900">
              {{$team->name}}
             </h4>
             <p class="text-sm text-gray-400 -mt-1">{{'@'.$team->slug}}</p>
            </div>
          </div>
          <div class="mt-4 flex items-center justify-end sm:mt-0 ml-auto">
            <x-hive-display-card
            component='users.inviteUsertoGroup'
            name="inviteUser"
            identification="inviteUser"
            />
      </div>

</div>

       <x-hive-display-tabs :tabs='["channel","members","invitations","posts","events"]' class='mt-4' component='darkyTab'>
         <x-slot name="tabsContent">
           <div x-cloak x-show="{{$active}} === 'channel'">
            HelloTimeline
          </div>
          <div x-cloak x-show="{{$active}} === 'posts'">
           HelloPosts
         </div>
         <div x-cloak x-show="{{$active}} === 'about'">
          HelloAbout
        </div>
        <div x-cloak x-show="{{$active}} === 'members'">
          <x-hive-display-tabs :tabs='["list","invitations"]' active='list' component='bibiBu'>
            <x-slot name="tabsContent">
             <div x-cloak x-show="{{$active}} === 'invitations'">

             </div>
            </x-slot>

          </x-hive-display-tabs>
         </div>
         </x-slot>
       </x-hive-display-tabs>
     </div>
     </x-slot>
     <x-slot name="secondSec">
       <div class="px-2 sm:px-4">
     <!-- <div class="sticky min-h-96 grid rounded-lg border border-gray-200">
       <div class="h-16 w-full bg-gray-300 rounded-t-lg"></div>
       <div class="h-48">
       </div>
     </div> -->
     <div class="overflow-hidden bg-white shadow sm:rounded-lg">
       <div class="px-4 py-5 sm:px-6 bg-gray-300 h-16">
               </div>
       <div class="border-t border-gray-200 px-4 py-5 sm:px-6 max-h-96 overflo-y-auto">
         <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">

           <div class="sm:col-span-2">
             <dt class="text-sm font-medium text-gray-500">About</dt>
             <dd class="mt-1 text-sm text-gray-900">Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu.</dd>
           </div>
           <div class="sm:col-span-2">

           </div>
         </dl>
       </div>
     </div>

   </div>

     </x-slot>
   </x-hive-display-section>
  </x-hive-display-section>
</div>
