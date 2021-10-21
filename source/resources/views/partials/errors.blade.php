<div id="errors" style="display: none;">
    @if($errors->any())
        @foreach($errors->all() as $message)
            <input type="hidden" value="{{ $message }}">
        @endforeach
    @endif
</div>

@push('base-scripts')
    <script type="text/javascript">
        $(function() {
            $('#errors > input:hidden').each(function() {
                var message = $(this).val();
                alert(message);
            });
        });
    </script>
@endpush
