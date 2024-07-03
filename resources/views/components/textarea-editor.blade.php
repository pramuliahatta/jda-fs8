<label for="{{ $id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
<textarea id="{{ $id }}" rows="4" name="{{ $name }}">{!! $value !!}</textarea>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // CKEDITOR.replace('{{ $id }}');
        CKEDITOR.replace('{{ $id }}', {
            // language: 'id',
            // uiColor: '#9AB8F3'
            toolbar: [{
                    name: 'clipboard'
                    , items: ['Undo', 'Redo']
                }
                , {
                    name: 'basicstyles'
                    , items: ['Bold', 'Italic', 'Underline']
                }
                , {
                    name: 'paragraph'
                    , items: ['NumberedList', 'BulletedList', '-', 'Blockquote']
                }
                , {
                    name: 'styles'
                    , items: ['Format']
                }
            ]
        });
    });

</script>
