<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Kurir</title>
</head>

<body>
    <h1 class="text-center mt-3">Data Kurir</h1>

    <div class="container">
        <a href="/tambahkurir" class="btn btn-success mt-2">Tambah Data</a>
        <div class="row align-items-center mt-2">

            <form action="/kurir" method="GET" class="row">
                <div class="col-sm-3">
                    <input type="search" id="inputPassword6" name="search" class="form-control float-right" placeholder="Cari" aria-describedby="passwordHelpInline">


                </div>
                <div class="col-sm">
                    <button type="submit" class="btn btn-secondary">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>

        </div>
        <div class="row">
            <div class="col">
                {{-- @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
            </div>
            @endif --}}
            <table class="table">
                <thead>
                    <tr align="center">
                        <th scope="col">No</th>
                        <!-- <th scope="col">Foto</th> -->
                        <th scope="col">NIK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">No Telepon</th>
                        <th scope="col">Alamat</th>
                        <!-- <th scope="col">Dibuat</th> -->
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                @php
                $no = 1;
                @endphp

                <tbody>
                    @foreach ($data as $index => $row)
                    <tr align="center">
                        <th scope="row">{{ $index + $data->firstItem() }}</th>
                        <!-- <td>
                            <img src="{{ asset('fotokurir/'.$row->foto) }}" alt="" style="width: 40px;">
                        </td> -->
                        <td>{{ $row->nik }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>0{{ $row->notelepon }}</td>
                        <td>{{ $row->alamat }}</td>
                        <!-- <td>{{ $row->created_at->format('d-M-Y H:i:s') }}</td> -->
                        <td>
                            <a href="/detailkankurir/{{ $row->id }}" class="btn btn-info"><i class="bi bi-eye-fill"></i></a>
                            <a href="/tampilkankurir/{{ $row->id }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                            <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}"><i class="bi bi-trash3"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="my-5">
                {{ $data->links() }}
            </div>

        </div>
    </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

<script>
    $('.delete').click(function() {
        var kuririd = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');


        swal({
                title: "Yakin ?",
                text: "Kamu akan menghapus data kurir dengan nama " + nama + " ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/deletekurir/" + kuririd + ""
                    swal("Data Berhasil Dihapus !", {
                        icon: "success",
                    });
                } else {
                    swal("Batal Menghapus Data !");
                }
            });
    });
</script>

<script>
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
    @endif
</script>


</html>
