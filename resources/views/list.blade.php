<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <style>
            table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            }

            tr:nth-child(even) {
            background-color: rgba(150, 212, 212, 0.4);
            }

            th:nth-child(even),td:nth-child(even) {
            background-color: rgba(150, 212, 212, 0.4);
            }
            h1{
                text-align:center;
                margin-top:60px;
                margin-bottom: 40px;
            }
            body{
                padding:100px;
            }
            table{
                padding:100px;

            }

            .style-array_img{
                position:relative;float:left;margin-right:5px;
            }
    </style>
<body>

        <h1 class="check">Welcome to Admin</h1>

        </table>
        <table class="table">  
            
            <thead>
                <button type="button" value="" class="delete_btn btn btn-success btn-sm float-right" alt="Image" onclick="process();">Add</button>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">File Name </th>
                    <th scope="col">Image </th>
                    <th scope="col">Edit Post Images</th>
                    <th scope="col">Delete Post Images</th>
                </tr>
            </thead>
            <tbody>
                  
                @if($posts)
                    @foreach($posts as $post)
                                
                        <tr scope="row">
                            <td>
                                {{$post->id}}
                            </td>   
                            <td>
                                {{$post->doc_name}}
                            </td>
                            <td>
                                <img src="" width="50px" height="50px" alt="image"></img>
                            </td>
                            <td>
                            <button type="button" data-id="{{ $post->id }}"  value="{{$post->id}}" class="edit_btn btn btn-success btn-sm" alt="Image" onclick=" check();"> Edit </button>

                                <!-- <button type="button" data-id="{{ $post->id }}"  value="{{$post->id}}" class="edit_btn btn btn-success btn-sm" alt="Image" onclick=" editProcess(); " > Edit </button> -->
                            </td>
                            <td>
                                <button type="button" value="{{$post->id}}" class="delete_btn btn btn-danger btn-sm" alt="Image">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                @endif 
            </tbody>
        </table>

        <div class="modal fade" id="ajaxModel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelHeading"></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

        <div class="modal fade" id=" " aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelHeading"></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form id="toEditDelectFile" method="POST" data-action="" accept-charset="utf-8"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">

    

                            <!---To show Model -->
                                <div class="modal fade" id="ajaxModelForPhoto" role="dialog">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title" id="modelHeading">Modal Header</h4>
                                    </div>
                                    <div class="modal-body" id="dataPhotoElement">
                                        <p>Some text in the modal.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
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
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script>
            // var editProcess; 
          
            var process;
            var check;
            $(document).ready(function (e) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });
                    
                process = function (selectedItem) {
                    $('#ajaxModel').modal('show')
                    document.getElementById('#ajaxModel')                   
                }

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
             
                // editProcess = function (selectedItem) {
                // $('#ajaxEditModel').modal('show')
                // document.getElementById('#ajaxEditModel') 



                // $('body').on('click', '.showModalPhoto', function(e) {
                //     e.preventDefault();
                //     $('.alert-danger').html('');
                //     $('.alert-danger').hide();
                //     //get src of image 
                //     src = $(this).find('img').attr('src');
                //     //add that inside modal
                //     $('#dataPhotoElement').html(`<div class="row">
                //             <div class="col-md-4">
                //             <img src="${src}" style="height:500px;width:465px;margin-bottom:10px;top:0;right:0;"/>
                //             </div>
                //         </div>`);
                //     $('#modelHeading').html("Show Photo");
                //     $('#ajaxModelForPhoto').modal('show'); //show modal

                //     });   
                // }
                    check = function()
                    {
                     
                    $('body').on('click', '.edit_btn', function () {         
                        
                    $.ajax({    
                        type:'POST',
                        url: "{{ route('post.edit') }}",
                        dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": $(this).data('id')
                        },
                        success: function(data) {   
                            // alert(data);
                            
                                
                               
                            // $('#ajaxEditModel').modal('show')
                            // document.getElementById('#ajaxEditModel') 
                            // $('.img_arr').html;

                            
                            ////    SHOULD WATCH THIS LINK
                            // https://stackoverflow.com/questions/67297514/show-specific-array-images-in-modal-using-laravel-jquery-ajax
                            
                            // LOOP THROUGH IMAGES BY DATA.STORGAE AND SHOW IN MODEL 

                            // THEN DELETE FUNCTION
                                
                            // FONT AWESOME

                            //SHOW POST IN USER INDEX FILE
                            
                            
                            // // Append the img element to the col-md-4 div
                            // $imageDiv.append($image);

                            // // Append the col-md-4 div to the container
                            // $imageContainer.append($imageDiv);
                        

                        // Show the modal with the images
                        // $('#modelHeading').html("Show Photos");
                        // $('#ajaxModelForPhoto').modal('show');
                                },
                        
                        error: function(ts) { alert("check");

                        }

                    });
                    });
                }
                    
            
            


   


            

        });


    </script>
</body>
</html>
