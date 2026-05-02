import Quill from 'quill';
import 'quill/dist/quill.snow.css';
import '../css/app.css';

const AlignStyle = Quill.import('attributors/style/align');
Quill.register(AlignStyle, true);

document.addEventListener('DOMContentLoaded', () => {
    const editorEl = document.getElementById('quill-editor');
    if (!editorEl) return;

    const quill = new Quill(editorEl, {
        theme: 'snow',
        modules: {
            toolbar: '#quill-toolbar',
        },
        placeholder: 'Tulis isi artikel di sini...',
    });

    const oldContent = editorEl.dataset.old ?? '';
    if (oldContent.trim() !== '') {
        quill.root.innerHTML = oldContent;
    }

    const form = editorEl.closest('form');
    form.addEventListener('submit', () => {
        document.getElementById('description').value = quill.root.innerHTML;
    });
});
