@if ($paginator->hasPages())
    <div class="tj-pagination">
        {!! $paginator->links() !!}
    </div>
@endif
