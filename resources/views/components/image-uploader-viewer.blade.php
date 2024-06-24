<div class="sm:col-span-2">
    <label for="{{ $id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        {{ $altText }}
    </label>
    <input type="file" name="{{ $name }}" id="{{ $id }}" accept="image/*"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        onchange="previewImage(event, '{{ $id }}-preview')">

    <div class="mt-4">
        @if ($imagePath)
            <img id="{{ $id }}-preview" src="{{ asset($imagePath) }}" alt="{{ $altText }}"
                class="rounded-lg w-full h-auto">
        @else
            <img id="{{ $id }}-preview" alt="{{ $altText }}" class="rounded-lg w-full h-auto hidden">
        @endif
    </div>
</div>

<script>
    function previewImage(event, previewId) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById(previewId);
            output.src = reader.result;
            output.classList.remove('hidden');
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
