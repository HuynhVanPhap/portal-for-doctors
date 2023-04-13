@if (session()->has('fail'))
    <div class="alert alert-warning">
        {{ session()->get('fail') }}
    </div>
@endif
