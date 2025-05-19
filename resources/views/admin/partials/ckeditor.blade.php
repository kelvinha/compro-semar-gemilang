<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const textareas = document.querySelectorAll('.ckeditor');
        
        textareas.forEach(textarea => {
            ClassicEditor
                .create(textarea, {
                    toolbar: {
                        items: [
                            'undo', 'redo',
                            '|', 'heading',
                            '|', 'bold', 'italic',
                            '|', 'link', 'uploadImage', 'blockQuote', 'insertTable',
                            '|', 'bulletedList', 'numberedList',
                            '|', 'outdent', 'indent',
                            '|', 'alignment'
                        ]
                    },
                    language: 'en',
                    image: {
                        toolbar: [
                            'imageTextAlternative',
                            'imageStyle:inline',
                            'imageStyle:block',
                            'imageStyle:side'
                        ]
                    },
                    table: {
                        contentToolbar: [
                            'tableColumn',
                            'tableRow',
                            'mergeTableCells',
                            'tableCellProperties',
                            'tableProperties'
                        ]
                    },
                })
                .then(editor => {
                    // Store the editor instance
                    textarea.editor = editor;
                    
                    // Update the textarea value on editor change
                    editor.model.document.on('change:data', () => {
                        textarea.value = editor.getData();
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        });
    });
</script>
