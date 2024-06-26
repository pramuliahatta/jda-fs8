<label for="{{ $id }}"
    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
<textarea id="{{ $id }}" rows="4" name="{{ $name }}">{!! $value !!}</textarea>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        CKEDITOR.replace('{{ $id }}');
    });
</script>
