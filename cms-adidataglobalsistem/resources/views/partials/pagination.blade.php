@if ($emails->hasPages())
<div class="d-flex justify-content-between align-items-center">
    <small>
        Showing {{ $emails->firstItem() }}-{{ $emails->lastItem() }} 
        of {{ $emails->total() }}
    </small>
    <div>
        {{ $emails->appends(request()->query())->links() }}
    </div>
</div>
@endif