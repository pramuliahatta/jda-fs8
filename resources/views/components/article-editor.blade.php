<div>
    <div id="toolbar">
        <button type="button" onclick="execCmd('bold')" id="boldBtn">Bold</button>
        <button type="button" onclick="execCmd('italic')" id="italicBtn">Italic</button>
        <button type="button" onclick="execCmd('formatBlock', 'blockquote')" id="blockquoteBtn">Blockquote</button>
        <button type="button" onclick="execCmd('formatBlock', 'H2')" id="h2Btn">H2</button>
        <button type="button" onclick="execCmd('insertParagraph')" id="paragraphBtn">Paragraph</button>
        <button type="button" onclick="execCmd('insertParagraphWithClass', 'lead')" id="leadParagraphBtn">Lead
            Paragraph</button>
        <button type="button" onclick="execCmd('insertUnorderedList')" id="ulBtn">UL</button>
        <button type="button" onclick="execCmd('insertOrderedList')" id="olBtn">OL</button>
    </div>
    <div id="editor" contenteditable="true"></div>
    <input type="hidden" id="articleContent" name="articleContent">
</div>
<script>
    function execCmd(command, value = null) {
        if (command === 'bold') {
            document.execCommand('bold', false, null);
        } else if (command === 'italic') {
            document.execCommand('italic', false, null);
        } else if (command === 'insertParagraphWithClass') {
            let paragraph = `<p class="${value}">${document.getSelection()}</p>`;
            insertHTML(paragraph);
        } else if (command === 'formatBlock' && value !== '') {
            document.execCommand(command, false, value);
        } else {
            document.execCommand(command, false, value);
        }
        updateButtonState(command);
    }

    function insertHTML(html) {
        let sel, range;
        if (window.getSelection) {
            sel = window.getSelection();
            if (sel.getRangeAt && sel.rangeCount) {
                range = sel.getRangeAt(0);
                range.deleteContents();
                var el = document.createElement("div");
                el.innerHTML = html;
                var frag = document.createDocumentFragment(),
                    node, lastNode;
                while ((node = el.firstChild)) {
                    lastNode = frag.appendChild(node);
                }
                range.insertNode(frag);
                if (lastNode) {
                    range = range.cloneRange();
                    range.setStartAfter(lastNode);
                    range.collapse(true);
                    sel.removeAllRanges();
                    sel.addRange(range);
                }
            }
        } else if (document.selection && document.selection.type != "Control") {
            document.selection.createRange().pasteHTML(html);
        }
    }

    function updateButtonState(command) {
        let buttonId;
        switch (command) {
            case 'bold':
                buttonId = 'boldBtn';
                break;
            case 'italic':
                buttonId = 'italicBtn';
                break;
            case 'formatBlock':
                buttonId = command === 'blockquote' ? 'blockquoteBtn' : 'h2Btn';
                break;
            case 'insertParagraph':
                buttonId = 'paragraphBtn';
                break;
            case 'insertUnorderedList':
                buttonId = 'ulBtn';
                break;
            case 'insertOrderedList':
                buttonId = 'olBtn';
                break;
            default:
                return;
        }
        let button = document.getElementById(buttonId);
        if (document.queryCommandState(command)) {
            button.classList.add('active');
        } else {
            button.classList.remove('active');
        }
    }

    function submitForm(event) {
        event.preventDefault();
        const editorContent = document.getElementById('editor').innerHTML;
        document.getElementById('articleContent').value = editorContent;
        document.getElementById('articleForm').submit();
    }

    document.getElementById('editor').addEventListener('input', function() {
        console.log(this.innerHTML);
    });
</script>
