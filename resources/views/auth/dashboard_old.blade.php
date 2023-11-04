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
    </style>
<body>

        <h1 class="check">Welcome to Admin</h1>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>{{Auth::user()->name}}</td>
                <td>Otto</td>
                <td>@mdo</td>
                </tr>
            </tbody>
        </table>
        <table class="table">  
            @if(isset($all_post))
                @if (count($all_post) > 0)
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">File Name </th>
                    <th scope="col">Image </th>
                    <th scope="col">Add Post Images</th>
                    <th scope="col">Edit Post Images</th>
                    <th scope="col">Delete Post Images</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($all_post as $post)
                        <tr scope="row">>
                            <td>
                                {{ $post['name'] }}
                            </td>   
                            <td>
                                <a href="{{ route('post.create') }}">Add Post</a>   
                            </td>
                            <td>
                                <img src="" width="50px" height="50px" alt="image"></img>
                            </td>
                            <td>
                                <button type="button" value="" class="edit_btn btn btn-success btn-sm" alt="Image">Edit</button>
                            </td>
                            <td>
                                <button type="button" value="" class="delete_btn btn btn-danger btn-sm" alt="Image">Delete</button>
                            </td>
                        </tr>
                    @endforeach

                @else
                    <p>No posts found.</p>
                @endif
                @endif
            </tbody>
        </table>
        <!-- <script>
            $(document).ready(function () {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            // function fetchEmployee()
            // {
            //     $.ajax({
            //         type: "GET",
            //         url: "/list",
            //         dataType: "json",
            //         success: function (response) {
            //             // console.log(response.posts);

            //             $('table').html("");
            //             $.each(response.posts, function (key, item)){
            //                 $('tbody').append('<tr>\
            //                     <td>' + item.id + '</td>\
            //                     <td>' + item.name + '</td>\

            //                     <td><button type="button" value="' + item.id + '" class="btn btn-primary editbtn btn-sm">Edit</button></td>\
            //                     <td><button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
            //                 \</tr>');
            //             }
            //         }
            //     })
            // }
        </script> -->
</body>
</html>
