<script>
    function imageData() {
        return {
            previewUrl: "",
            updatePreview() {
                var reader,
                    files = document.getElementById("image").files;

                reader = new FileReader();

                reader.onload = e => {
                    this.previewUrl = e.target.result;
                };

                reader.readAsDataURL(files[0]);
            },
            clearPreview() {
                document.getElementById("image").value = null;
                this.previewUrl = "";
            }
        };
    }
</script>
