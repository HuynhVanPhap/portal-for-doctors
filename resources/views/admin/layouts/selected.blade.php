@php
    $label = $label ?? '';
    $required = $required ?? false;
    $disabled = $disabled ?? false;
    $data = $data ?? []; // [ id, name ]
    $name = $name ?? '';
    $defaultValue = $defaultValue ?? '';
    $defaultArray = $defaultArray ?? [];
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
        @foreach($data as $key => $item)
        <option
            value="{{$item['id']}}"
            @if ($multiple)
                {{ (in_array($item['id'], old($name, $defaultArray))) ? 'selected' : '' }}
            @else
                {{ (old($name, $defaultValue) === $item['id']) ? 'selected' : '' }}
            @endif
        >
            {{ __($item['name']) }}
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
