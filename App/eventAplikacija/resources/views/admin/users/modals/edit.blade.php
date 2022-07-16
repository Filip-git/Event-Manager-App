<div class="modal fade" id="modalEdit-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-uppercase" id="exampleModalLabel">Uređivanje podataka korisnika</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <x-form-card>
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                    @method('PATCH')
                    @include('admin.users.partials.form')
                </form>
            </x-form-card>
        </div>
        </div>
    </div>
</div>


