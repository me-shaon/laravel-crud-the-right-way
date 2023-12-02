<script>
    $(document).ready(()=>{
        $('.image-upload-input').change(function(){
            const file = this.files[0];
            const previewer = $(this).closest('.image-preview').find('img');

            if (file){
                let reader = new FileReader();
                reader.onload = function(event){
                    previewer.attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        });
    });
</script>
