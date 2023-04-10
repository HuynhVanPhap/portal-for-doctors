@if (session()->has('fail'))
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert">x</button>

        {{ session()->get('fail') }}
    </div>
@endif
