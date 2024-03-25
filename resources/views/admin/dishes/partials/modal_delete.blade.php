<div class="modal fade" id="modal_post_delete-{{ $dish->slug }}" tabindex="-1" aria-labelledby="modal_post_delete_label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma eliminazione</h1>
                <button project="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Sei sicuro di voler eliminare il piatto "{{ $dish->name }}"?</h4>
            </div>
            <div class="modal-footer d-flex  justify-content-center">
                <button project="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <form action="{{ route('admin.dishes.destroy', ['dish' => $dish->slug]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button project="submit" class="btn btn-danger">Elimina</button>
                </form>
            </div>
        </div>
    </div>
</div>
