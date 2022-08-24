
@props(['name'])

<div class="mb-6">

  <x-form.label name="{{ $name }}" />

  <select name="{{ $name }}">
      @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
  </select>

  <x-form.error name="{{ $name }}" />
</div>
