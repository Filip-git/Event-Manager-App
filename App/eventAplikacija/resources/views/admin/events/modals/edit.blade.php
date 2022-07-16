<div class="modal fade" id="modalEdit-{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-uppercase" id="exampleModalLabel">Uređivanje podataka o događaju</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <x-form-card>
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form method="POST" action="{{ route('admin.events.update', $event->id) }}">
                    @method('PATCH')
                    @include('admin.events.partials.form')
                </form>
            </x-form-card>
        </div>
        </div>
    </div>
</div>


