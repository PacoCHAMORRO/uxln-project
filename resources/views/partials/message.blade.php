@if (session()->has('message'))
<div class="sufee-alert alert with-close {{ session('alert-type', 'alert-info') }} alert-dismissible fade show">
    <span class="badge badge-pill {{ session('badge-type', 'badge-info') }}">'{{ session('message-title', 'info') }}'</span>
    {{ session('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif
