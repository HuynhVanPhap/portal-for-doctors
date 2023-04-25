@php
    $label = $label ?? '';
    $required = $required ?? false;
    $disabled = $disabled ?? false;
    $data = $data ?? []; // [ id, name ]
    $name = $name ?? '';
    $defaultValue = $defaultValue ?? '';
    $default = $default ?? true;
    $id = $id ?? '';
    $class = $class ?? '';
    $multiple = ($multiple) ?? false;
@endphp

    <select
        {{ ($required) ? 'required' : '' }}
        {{ ($multiple) ? 'multiple' : '' }}
        id="{{ $id }}"
        class="{{ $class }} form-control {{ $errors->has($name) ? 'is-invalid' : '' }}"
        name="{{ $name }}"
        @if($disabled)
            {{'disabled'}}
        @endif
    >
        @if(isset($data))
            @if($default)
                <option value="">
                    Select your's option
                </option>
            @endif
        @foreach($data as $key => $value)
        <option
            value="{{ $value }}"
            {{ (old($name, $defaultValue) === $value) ? 'selected' : '' }}
        >
            {{ $key }}
        </option>
        @endforeach
        @else
            <option value="">
                Select your's option
            </option>
        @endif
    </select>

@if ($errors->has($name))
    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first($name) }}</span>
@endif
