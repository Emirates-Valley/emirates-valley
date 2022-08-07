        <!-- Footer -->
        <footer class="content-footer">
            <div>© <?php echo date('Y')?> - Emirates Valley</div>
        </footer>
        <!-- ./ Footer -->
        </div>
        <!-- ./ Content body -->
    </div>
    <!-- ./ Content wrapper -->
</div>
<!-- ./ Layout wrapper -->
<!-- Main scripts -->
<!-- App scripts -->
<script src="<?php echo base_url()?>resource/vendors/select2/js/select2.min.js"></script>
<?php if($this->uri->segment(3) == 'add' || $this->uri->segment(3) == 'edit') {?> 
<script src="<?php echo base_url()?>resource/vendors/ckeditor5/ckeditor.js"></script>
<script>
    let editor;
    ClassicEditor
    .create( document.querySelector( '#editor' ), {
        toolbar: { items: [
            'heading',
            '|',
            'alignment',
            'bold',
            'italic',
            'link',
            'bulletedList',
            'numberedList',
            'uploadImage',
            'blockQuote',
            'undo',
            'redo'
        ]},
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    }).then( newEditor => {
        editor = newEditor;
    } )
    .catch( error => {
        console.error( error );
    } );
</script>    
<?php } ?>
<script src="<?php echo base_url()?>assets/js/app.min.js"></script>
</body>
</html>