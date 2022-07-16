<x-guest-layout>
    <x-form-card>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <p class="form-heading">Uređivanje podataka korisnika<p>
        <form method="POST" action="">
            @method('PATCH')
            @include('admin.users.partials.form')
        </form>
    </x-form-card>
</x-guest-layout>
