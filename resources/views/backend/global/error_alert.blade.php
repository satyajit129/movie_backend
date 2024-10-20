
@if (session()->has('error'))
<div class="alert alert-danger solid alert-right-icon alert-dismissible fade show">
    <span><i class="mdi mdi-help"></i></span>
    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
    </button>
    <strong>Error!</strong> {{ session()->get('error') }}
</div>
@endif
