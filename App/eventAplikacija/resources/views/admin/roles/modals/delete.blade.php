<div class="modal fade" id="modalDelete-{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-uppercase" id="exampleModalLabel">Brisanje uloge</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p class="text-center modal-delete-text">Jeste li sigurni da želite obrisati ulogu?</p>
            <button type="button" class="btn btn-danger modal-delete-btn" onclick="event.preventDefault();
            document.getElementById('delete-role-form-{{ $role->id }}').submit()">Da</button>
            <button type="button" class="btn btn-primary modal-delete-btn" data-dismiss="modal" aria-label="Close">Ne</button>
        </div>
        </div>
    </div>
</div>

