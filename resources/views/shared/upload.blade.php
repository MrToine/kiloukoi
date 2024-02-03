@php
    $class ??= null;
    $multiple ??= false;
    $name ??= "";
    $label ??= null;
@endphp

<div @class(['form-group', $class])>
    @if ($label)
        <label for="{{ $name }}">{{ ucfirst($label) }}</label>
    @endif
    <input @if($multiple) multiple @endif class="form-control @error($name) is-invalid @enderror" type="file" name="{{ $name . ($multiple ? '[]' : '') }}">
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
