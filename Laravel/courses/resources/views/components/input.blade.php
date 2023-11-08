@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-gray-200 rounded border border-gray-300 leading-tight focus:outline-none focus:bg-white focus:border-gray-500']) !!}>