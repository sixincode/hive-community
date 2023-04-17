<div>
  <x-hive-display-section component='boxedSection' padding='false'>
    <x-hive-display-section component='dividedSection'>
     <x-slot name="mainSec">
       <div class="grid sm:grid-cols-2 gap-2 divide">
         @foreach($teams as $team)
         <div class="border rounded hover:shadow-sm hover:bg-slate-50/40 p-2 sm:p-4 grid space-y-4">
           <div class="flex-1">
             <div class="flex items-center space-x-4">
               <div class="avatar bg-gray-300 rounded-lg h-10 w-10">
                </div>
               <div>
                 <h4 class="mb-1 text-lg font-semibold text-gray-900">
                   {{$team->name}}
                 </h4>
                </div>
             </div>
             <div class="flex py-2 my-4 text-center border-t border-b border-gray-200 divide-x divide-gray-200">
               <div class="flex-1">
                 <h5 class="text-sm font-bold text-gray-900">2500</h5>
                 <p class="text-xs font-medium leading-none text-gray-600">Members</p>
               </div>
               <div class="flex-1">
                 <h5 class="text-sm font-bold text-gray-900">46</h5>
                 <p class="text-xs font-medium leading-none text-gray-600">New posts</p>
               </div>

             </div>
             <p class="text-sm text-gray-800">Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis laboriosam tempore eveniet.</p>
           </div>
          <div>
           <x-hive-form-button
             id='view-{{$team->slug}}'
             name='view-{{$team->slug}}'
             tag='a'
             color='white'
             title='{{__("View")}}'
             href='{{route("user.teams.show", $team->slug)}}'
             />
           </div>

          </div>
         @endforeach
       </div>

     </x-slot>
     <x-slot name="secondSec">

     </x-slot>
   </x-hive-display-section>
  </x-hive-display-section>
</div>
