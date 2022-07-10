@props(['options' => ['active' => 1, 'inactive' => 0], 'selected' => 1, 'name' => 'status'])

<select name="{{ $name }}" id="{{ $name }}" {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
    @foreach ($options as $option => $value)
        <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>{{ $option }}</option>
    @endforeach
</select>
