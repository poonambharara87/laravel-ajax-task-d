<!DOCTYPE html>
<html>

<head>
    <title>Laravel 10 Ajax Multiple File Upload</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.js"></script> 
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


</head>


<body>
    <div class="container mt-5">

        <div class="text-center">
            <form id="selectFile" method="POST" action="{{ route('post.update') }}" accept-charset="utf-8"
                enctype="multipart/form-data">
                @csrf
                <div class="row">

                <div class="form-group">
                        <input type="hidden" name="id" id="id">
                    </div>

                    <div class="form-group">
                        <input type="file" name="files[]" id="files" placeholder="Choose files" multiple>
                    </div>


                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
      
        $(document).ready(function (e) {
            
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
            
        
        $('#selectFile').submit(function(e) {
        
            e.preventDefault();
        
            var formData = new FormData(this);
            var id = $('#id').val();
           

            let TotalFiles = $('#files')[0].files.length; //Total files
            let files = $('#files')[0];
            for (let i = 0; i < TotalFiles; i++) {
                formData.append('files' + i, files.files[i]);
            }
            formData.append('TotalFiles', TotalFiles);
        
            $.ajax({
                type:'POST',
                
                url: $(this).attr('action')
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: (data) => {
                this.reset();
                alert('Files has been uploaded using jQuery ajax');
                },
                error: function(data){
                alert(data.responseJSON.error.files[0]);
                console.log(data.responseJSON.error);
                }
            });
        });
        });
 
</script>
    
</body>

</html>
