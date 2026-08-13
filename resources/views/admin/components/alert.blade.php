@section('js')
<script>
    @if (Session::has('success'))
            showToast('success', '{{ Session::get('success') }}');
            {{ session()->forget('success') }}
        @endif

        @if (Session::has('error'))
            showToast('error', '{{ Session::get('error') }}');
            {{ session()->forget('error') }}
        @endif

        @if (Session::has('failed'))
            showToast('failed', '{{ Session::get('failed') }}');
            {{ session()->forget('failed') }}
        @endif

        @if (Session::has('warning'))
            showToast('warning', '{{ Session::get('warning') }}');
            {{ session()->forget('warning') }}
        @endif

        @if (Session::has('info'))
            showToast('info', '{{ Session::get('info') }}');
            {{ session()->forget('info') }}
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                showToast('error', '{{ $error }}');
            @endforeach
        @endif
</script>
@endsection