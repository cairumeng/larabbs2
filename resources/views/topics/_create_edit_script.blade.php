<script src="https://cdn.quilljs.com/1.3.0/quill.min.js"></script>
<script>
    function imageHandler() {
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.click();

        input.onchange = function () {
            var data = new FormData();
            data.append('file', input.files[0]);
            data.append('folder', 'topics');
            axios.post("{{route('images.store')}}", data)
                .then(function (response) {
                    console.log(response.data)
                    insertToEditor(response.data.path);
                })
                .catch(function (error) {
                    console.log('upload failed', error)
                })
        }
    }

    var quill = new Quill('#editor', {
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline', 'strike'],
                ['image', 'video', 'link', 'code-block']
            ],
        },
        placeholder: 'please enter your body here!',
        theme: 'snow',
    });
    quill.getModule("toolbar").addHandler("image", imageHandler);

    function insertToEditor(url) {
        // push image url to rich editor.
        const range = quill.getSelection();
        quill.insertEmbed(range.index, 'image', url);
    }

    var bodyInput = $('#body')

    quill.on('text-change', function (delta, oldDelta, source) {
        bodyInput.val($('.ql-editor').html())
        console.log(bodyInput.val())
    });

</script>