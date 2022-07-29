<x-dropdown>
  
  <x-slot name="trigger">
      <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:flex-inline">
          Categories
          
          <x-down-arrow style="right: 12px;" class="absolute pointer-events-none"/>
      </button>
  </x-slot>

  <x-dropdown-item 
      :active="!request('category')"
      href="/" >
      
      All
  
  </x-dropdown-item>

  @foreach ($categories as $category)
      <x-dropdown-item 
          :active="request('category') == $category->slug"
          href="/?category={{ $category->slug }}" >
          {{ $category->name }}
      </x-dropdown-item>
  @endforeach

</x-dropdown>