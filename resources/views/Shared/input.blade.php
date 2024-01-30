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
    <label for="{{ $name }}">{{ $label }}</label>

    @if ($type == 'textarea')

        <textarea class="form-control @error($name) is-invalid @enderror" type="{{ $type }}" name="{{ $name }}" style="{{ $style }}">{{ old($name, $value) }}</textarea>

    @else

        <input class="form-control @error($name) is-invalid @enderror" type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}" style="{{ $style }}">

    @endif

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
