@props(['id', 'name', 'altText', 'imagePaths' => []])
<div class="sm:col-span-2">
    <label for="{{ $id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        {{ $altText }}
    </label>
    <input type="file" name="{{ $name }}[]" id="{{ $id }}" accept="image/*" multiple
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        onchange="previewImages(event, '{{ $id }}-preview-container')">
    <x-error-message field="photos" />

    <div id="{{ $id }}-preview-container" class="mt-4 flex space-x-2">
        @foreach ($imagePaths as $imagePath)
            <img src="/{{ $imagePath }}" alt="{{ $altText }}" class="rounded-lg w-32 h-32 object-cover">
        @endforeach
    </div>
</div>

<script>
    function previewImages(event, previewContainerId) {
        const previewContainer = document.getElementById(previewContainerId);
        previewContainer.innerHTML = ''; // Clear previous previews
        const files = event.target.files;

        if (files.length > 3) {
            alert('Hanya bisa mengirim maksimal 3 foto');
            event.target.value = ''; // Clear the file input
            return;
        }

        Array.from(files).forEach(file => {
            const reader = new FileReader();
            const img = document.createElement('img');
            img.classList.add('rounded-lg', 'w-32', 'h-32', 'object-cover', 'mr-2');

            reader.onload = function(e) {
                img.src = e.target.result;
            }

            reader.readAsDataURL(file);
            previewContainer.appendChild(img);
        });
    }
</script>
