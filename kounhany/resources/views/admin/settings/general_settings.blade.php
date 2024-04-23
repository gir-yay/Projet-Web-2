@if (session()->has('success-general-settings'))
    <div class="alert alert-success text-center p-2">
        {{ session('success-general-settings') }}
    </div>
@endif
<form action="{{ route('admin.general_settings.update') }}" method="post"   class="col-12">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label >Taux Payment(%)</label>
        <input type="text" class="form-control shadow-none"  name="taux_payment" value = "{{@$general_settings->taux_payment}}"
        placeholder="Taux Payment" id="">
        @error('taux_payment')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>


    <button class="btn btn-primary" type="submit">Save</button>
</form>
