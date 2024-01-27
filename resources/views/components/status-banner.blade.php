<div>
    @if ( session('success') )
    <div
      class="mb-2 rounded-lg bg-green-100 px-6 py-5 text-base text-success-700"
      role="alert">
        {{ session('success') }}
    </div>
    @endif

    @if (session("error"))
    <div
      class="mb-2 rounded-lg bg-red-100 px-6 py-5 text-base text-danger-700"
      role="alert">
        {{ session('error') }}
    </div>
    @endif
</div>
