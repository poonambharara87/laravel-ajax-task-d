<!DOCTYPE html>
<html>

<head>
    <title>Laravel Ajax Multiple File Upload</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.js"></script> 
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


</head>


<body>


    <div class="container mt-5">
    <div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
            <form id="selectFile" method="POST" action="javascript:void(0)" accept-charset="utf-8"
                enctype="multipart/form-data">
                @csrf
                <div class="row">

                        <div class="mb-3">
                            <label  for="files" class="form-label" >Upload Documents</label>
                            <input type="file" id="files" name="files[]" class="form-control" id="files" placeholder="Choose files" multiple>
                        </div>


                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                    </div>
                </div>
            </form>
    </div>
        </div>
        </div>
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
        
            let TotalFiles = $('#files')[0].files.length; 
            console.log($('#files')[0].files.length);
            let files = $('#files')[0];
            for (let i = 0; i < TotalFiles; i++) {
                formData.append('files' + i, files.files[i]);
            }
            formData.append('TotalFiles', TotalFiles);
        
            $.ajax({
                type:'POST',
                url: "{{ route('post.store')}}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: (data) => {
                this.reset();
                alert('Files has been uploaded using jQuery ajax');
                },
                error: function(ts) { alert(ts.responseText)
                 }
            });
        });
        });
 
    </script>
    
</body>

</html>
