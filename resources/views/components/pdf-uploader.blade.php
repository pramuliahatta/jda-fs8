<div class="space-y-2">
    <label for="pdf-upload" class="block text-sm font-medium text-gray-700">Upload PDF</label>
    <input type="file" id="pdf-upload" name="pdf" accept="application/pdf">
    <div id="pdf-preview" class="mt-4" style="display: none;">
        <iframe id="pdf-frame" class="w-full h-screen" frameborder="0"></iframe>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const pdfUpload = document.getElementById('pdf-upload');
    const pdfPreview = document.getElementById('pdf-preview');
    const pdfFrame = document.getElementById('pdf-frame');

    pdfUpload.addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file && file.type === 'application/pdf') {
            const fileURL = URL.createObjectURL(file);
            pdfFrame.src = fileURL;
            pdfPreview.style.display = 'block';
        } else {
            alert('Please select a valid PDF file.');
            event.target.value = '';  // Reset the input
            pdfPreview.style.display = 'none';
            pdfFrame.src = '';
        }
    });
});
</script>
