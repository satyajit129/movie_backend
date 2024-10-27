
@if (session('error'))
    <div class="alert alert-danger solid alert-right-icon alert-dismissible fade show">
        <span><i class="mdi mdi-help"></i></span>
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Error!</strong> {{ session('error') }}
    </div>
@endif



@if (session('success'))
    <div class="alert alert-success solid alert-right-icon alert-dismissible fade show">
        <span><i class="mdi mdi-check"></i></span>
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Success!</strong> {{ session('success') }}
    </div>
@endif

@if (session('errors'))
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger solid alert-right-icon alert-dismissible fade show">
            <span><i class="mdi mdi-help"></i></span>
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
            </button>
            <strong>Error!</strong> {{ $error }}
        </div>
    @endforeach
@endif
