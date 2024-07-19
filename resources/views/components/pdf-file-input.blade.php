<div class="pdf-file-input">
    <input type="file" name="file"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        accept="application/pdf" id="pdfInput" onchange="previewPdf(event)">
    <div id="pdfPreview" class="mt-2">
        @if ($pdfUrl)
            <embed src="{{ $pdfUrl }}" type="application/pdf" width="100%" height="400px">
        @else
            <p class="text-sm">Dokumen belum diupload</p>
        @endif
    </div>
</div>

<script>
    function previewPdf(event) {
        const file = event.target.files[0];
        if (file.type !== 'application/pdf') {
            alert('Please upload a PDF file.');
            return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
            const pdfPreview = document.getElementById('pdfPreview');
            pdfPreview.innerHTML =
                `<embed src="${e.target.result}" type="application/pdf" width="100%" height="400px">`;
        };
        reader.readAsDataURL(file);
    }
</script>
