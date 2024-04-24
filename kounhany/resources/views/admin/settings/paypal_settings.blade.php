@if (session()->has('success-paypal-settings'))
    <div class="alert alert-success text-center p-2">
        {{ session('success-paypal-settings') }}
    </div>
@endif
<form action="{{ route('admin.paypal_settings.update') }}" method="post" class="col-12">

    @csrf
    @method('put')

    <div class="mb-3">
        <label class="d-block" for="client_id">PayPal Client ID</label>
        <input type="text" class="form-control shadow-none" name="client_id" placeholder="Client ID" id="client_id"
            value="{{ @$paypal_settings->client_id }}">
        @error('client_id')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label class="d-block" for="client_secret">PayPal Secret Key</label>
        <input type="text" class="form-control shadow-none" name="client_secret" placeholder="Secret Key"
            id="client_secret" value="{{ @$paypal_settings->client_secret }}">
        @error('client_secret')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label class="d-block" for="mode">Mode</label>
        <select class="form-select  form-control shadow-none" name="mode" aria-label="Default select example">
            <option value="sandbox" @if (@$paypal_settings->mode == 'sandbox') selected @endif>Sandbox</option>
            <option value="live" @if (@$paypal_settings->mode == 'live') selected @endif>Live</option>
        </select>
        @error('mode')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <button class="btn btn-primary" type="submit">Save Settings</button>
</form>
