<template>
    <div class="control">
        <ckeditor :editor="editor" v-model="editorData" @ready="onReady" :config="editorConfig"></ckeditor>
        <input type="hidden" :name="editorModel" v-model="editorData">
    </div>
</template>
<script>
    import CKEditor from '@ckeditor/ckeditor5-vue';
    import DecoupledEditor from '@ckeditor/ckeditor5-build-decoupled-document';
    export default {
        name: "Editor",
        props: {
            content: {
                type: String,
                required: true
            },
            name: {
                type: String,
                required: true
            }
        },
        components: {
            ckeditor: CKEditor.component
        },
        data() {
            return {
                editor: DecoupledEditor,
                editorModel: this.name,
                editorData: this.content,
                editorConfig: {
                    language: {
                        ui: 'es',
                        content: 'es'
                    },
                }
            }
        },
        methods: {
            onReady(editor) {
                // Insert the toolbar before the editable area.
                editor.ui.getEditableElement().parentElement.insertBefore(
                    editor.ui.view.toolbar.element,
                    editor.ui.getEditableElement()
                );
            }
        }
    }
</script>

<style scoped>

</style>