@props([
    'itemName' => 'položku',
])

<div id="deleteModal" class="hidden fixed inset-0  bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-gray-200 p-6 rounded-md shadow-md space-y-4 w-96">
        <p class="mb-6">Naozaj chcete vymazať: <span id="deleteItemName" class="font-bold">{{ $itemName }}</span>?</p>
        <div class="flex justify-end gap-3">
            <button type="button" id="cancelDeleteBtn"
                    class="px-4 py-2 bg-white rounded-md hover:bg-gray-300">Zrušiť</button>

            {{-- Form pre server-side delete --}}
            <form id="deleteForm" action="#" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" id="formDeleteBtn"
                        class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Vymazať</button>
            </form>

            {{-- Button pre client-side delete (callback) --}}
            <button type="button" id="callbackDeleteBtn" class="hidden px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Vymazať</button>
        </div>
    </div>
</div>

<script>
    let deleteCallback = null;

    function openDeleteModal(itemName, urlOrCallback) {
        const modal = document.getElementById('deleteModal');
        const itemNameSpan = document.getElementById('deleteItemName');
        const deleteForm = document.getElementById('deleteForm');
        const formDeleteBtn = document.getElementById('formDeleteBtn');
        const callbackDeleteBtn = document.getElementById('callbackDeleteBtn');

        itemNameSpan.textContent = itemName;

        // Ak je to URL (string), použijeme form
        if (typeof urlOrCallback === 'string') {
            deleteForm.action = urlOrCallback;
            formDeleteBtn.classList.remove('hidden');
            callbackDeleteBtn.classList.add('hidden');
            deleteCallback = null;
        }
        // Ak je to funkcia, použijeme callback
        else if (typeof urlOrCallback === 'function') {
            deleteCallback = urlOrCallback;
            formDeleteBtn.classList.add('hidden');
            callbackDeleteBtn.classList.remove('hidden');
        }

        modal.classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
        deleteCallback = null;
    }

    // Event listeners
    document.getElementById('cancelDeleteBtn').addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        closeDeleteModal();
    });

    document.getElementById('callbackDeleteBtn').addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();

        if (deleteCallback) {
            deleteCallback();
            closeDeleteModal();
        }
    });
</script>
