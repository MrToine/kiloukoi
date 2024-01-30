@php
    $type ??= "text";
    $class ??= null;
    $style ??= null;
    $name ??= "";
    $label ??= ucfirst($name);
    $value ??= "";
    $message ??= "";
@endphp

<div @class(['form-group', $class])>
    @if ($type == 'textarea')
        <label for="{{ $name }}">{{ $label }}</label>
        <textarea class="form-control @error($name) is-invalid @enderror" type="{{ $type }}" name="{{ $name }}" style="{{ $style }}">{{ old($name, $value) }}</textarea>

    @elseif ($type == "hidden")
        <input type="hidden" name="{{ $name }}" value="{{ $value }}">
    @else
        <label for="{{ $name }}">{{ $label }}</label>
        <input class="form-control @error($name) is-invalid @enderror" type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}" style="{{ $style }}">
    @endif

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
