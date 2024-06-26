<div class="pdf-file-input">
    <input type="file" accept="application/pdf" id="pdfInput" onchange="previewPdf(event)">
    <div id="pdfPreview" class="mt-2">
        @if($documentUrl)
            <embed src="{{ $documentUrl }}" type="application/pdf" width="100%" height="400px">
        @else
            <p>No File uploaded yet.</p>
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
            pdfPreview.innerHTML = `<embed src="${e.target.result}" type="application/pdf" width="100%" height="400px">`;
        };
        reader.readAsDataURL(file);
    }
</script>
