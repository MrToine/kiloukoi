@php
    $type ??= "text";
    $class ??= null;
    $style ??= null;
    $name ??= "";
    $label ??= null;
    $value ??= "";
    $message ??= "";
    $placeholder ??= "";
@endphp

<div @class(['form-group', $class])>
            @if ($label)
                <label for="{{ $name }}">{{ ucfirst($label) }}</label>
            @endif
            @if ($type == 'textarea')
                <textarea class="form-control @error($name) is-invalid @enderror" type="{{ $type }}" name="{{ $name }}" style="{{ $style }}">{{ old($name, $value) }}</textarea>

            @elseif ($type == "hidden")
                <input type="hidden" name="{{ $name }}" value="{{ $value }}">
            @else
                <input class="form-control @error($name) is-invalid @enderror" type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}" style="{{ $style }}" placeholder="{{ $placeholder }}">
            @endif
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
