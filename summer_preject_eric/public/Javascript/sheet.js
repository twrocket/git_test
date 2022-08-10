document.write('/editor/ckeditor.js');





ClassicEditor.create(document.querySelector('#editor'))
            .then(editor => {
            console.log(editor);
            })