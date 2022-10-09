<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ProMena Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
    <body>
        @include('layouts.navbar')
            @if(session('success'))
                <div class="message alert alert-success" role="alert">
                {{ session('success') }}
                </div>
            @endif
        @yield('content')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script>
            $('.message').fadeOut(5000)
        </script>

        <script>
            let id ;
            function getId(albumId)
            {
            id = albumId;
            $('#deleteForm').submit(function(e)
            {
               console.log(id);
               let _token = $("input[name=_token]").val();

               $.ajax({
                url:"/album/delete",
                type:"DELETE",
                data:{
                    id:id,
                    _token:_token
                },
                success:function(response){
                    console.log(response)
                    // $("#editModal").modal('hide')
                    alert('Album Deleted')
                    //location.reload();
                },
                error:function(error){
                    console.log(error);
                    alert('Error')
                }

            });

            })
        }

        function moveAlbum()
                {
                    location.replace('http://localhost:8000/album/move/'+id)
                }
        </script>
    </body>
</html>
