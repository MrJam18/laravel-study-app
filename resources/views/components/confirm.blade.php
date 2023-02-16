<div class="modal fade" id="exampleModal" tabindex="100" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="exampleModalLabel">Подтвердите удаление</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <button type="button" id="modal-confirm-button" class="btn btn-danger">Подтвердить</button>
            </div>
        </div>
    </div>
</div>
@pushOnce('js')
    <script defer>
        let id = null;
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const idSetter = (ev)=> id = ev.currentTarget.getAttribute('data-id');
        document.querySelectorAll('#confirming-button').forEach((el)=> {
            el.addEventListener('click', idSetter);
        })
        const confirmHandler = async () => {
            const route = document.querySelector('#delete-route').innerText;
            let data = await fetch(`${route}/${id}`, {method: 'DELETE', headers: {'X-CSRF-TOKEN': token}});
            if(data.redirected) window.location.replace(data.url);
        }
        document.querySelector('#modal-confirm-button').addEventListener('click', confirmHandler);
    </script>
@endPushOnce
