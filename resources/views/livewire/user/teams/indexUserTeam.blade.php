<div>
  <x-hive-display-section component='boxedSection' class="py-2">
    <x-hive-display-section component='dividedSection' class='py-2'>
     <x-slot name="mainSec">
       <div class="grid grid-cols-2 lg:grid-cols-3 gap-2 divide">
         @foreach($teams as $team)
         <div class="card">
           <div class="flex-1 p-6">
             <div class="flex items-center space-x-2">
               <div class="avatar bg-gray-300 rounded-lg h-10 w-10">
                </div>
               <div>
                 <h4 class="mb-1 text-sm font-semibold text-gray-900">
                   {{$team->name}}
                 </h4>
                 <p class="text-sm font-medium leading-none text-gray-600">CEO of Birds</p>
               </div>
             </div>
             <div class="flex py-2 my-4 text-center border-t border-b border-gray-200 divide-x divide-gray-200">
               <div class="flex-1 p-2">
                 <h5 class="text-sm font-bold text-gray-900">200</h5>
                 <p class="text-sm font-medium leading-none text-gray-600">Posts</p>
               </div>
               <div class="flex-1 p-2">
                 <h5 class="text-sm font-bold text-gray-900">46</h5>
                 <p class="text-sm font-medium leading-none text-gray-600">Comments</p>
               </div>
               <div class="flex-1 p-2">
                 <h5 class="text-sm font-bold text-gray-900">12,340</h5>
                 <p class="text-sm font-medium leading-none text-gray-600">Likes</p>
               </div>
             </div>
             <p class="text-sm text-gray-800">Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis laboriosam tempore eveniet consequatur impedit dolorem asperiores alias ex consectetur.</p>
           </div>
           <a href="#" class="justify-center px-4 py-3 text-sm font-medium text-purple-700 hover:text-purple-900 card-footer">View Full Profile</a>
         </div>
         @endforeach
       </div>

     </x-slot>
     <x-slot name="secondSec">

     </x-slot>
   </x-hive-display-section>
  </x-hive-display-section>
</div>
