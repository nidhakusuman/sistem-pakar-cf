@if (session('status'))
<div class="alert alert-success alert-left-bordered border-success alert-dismissible d-flex align-items-center p-md-4 mb-2 fade show" role="alert">
    <i class="gd-check-box icon-text text-success mr-2"></i>
    <p class="mb-0">
        <strong>Success!</strong> {{ session('status') }}
    </p>
    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
      <i class="gd-close icon-text icon-text-xs" aria-hidden="true"></i>
    </button>
</div>
@endif

@if (session('error'))
<div class="alert alert-danger alert-left-bordered border-danger alert-dismissible d-flex align-items-center p-md-4 mb-2 fade show" role="alert">
    <i class="gd-alert icon-text text-danger mr-2"></i>
    <p class="mb-0">
        <strong>Error!</strong> {{ session('error') }}.
    </p>
    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
      <i class="gd-close icon-text icon-text-xs" aria-hidden="true"></i>
    </button>
</div>

@endif
