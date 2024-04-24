@if (session()->has('success-email-settings'))
    <div class="alert alert-success text-center p-2">
        {{ session('success-email-settings') }}
    </div>
@endif
<form action="{{ route('admin.email_settings.update') }}" method="post" class="col-12">

    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Host</label>
        <input type="text" class="form-control shadow-none" name="host" value="{{ @$email_settings->host }}"
            placeholder="Host" id="">
        @error('host')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label>Port</label>
        <input type="number" class="form-control shadow-none" name="port" value="{{ @$email_settings->port }}"
            placeholder="Port" id="">
        @error('port')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label>Encryption</label>
        <input type="text" class="form-control shadow-none" name="encryption"
            value="{{ @$email_settings->encryption }}" placeholder="Encryption" id="">
        @error('encryption')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label>Username</label>
        <input type="text" class="form-control shadow-none" name="username" value="{{ @$email_settings->username }}"
            placeholder="Username" id="">
        @error('username')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="text" class="form-control shadow-none" name="password" placeholder="Password" id="">
        @error('password')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <button class="btn btn-primary" type="submit">Save</button>
</form>
