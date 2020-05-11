<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('assets/library/dropzone-5.7.0/dropzone.min.css')}}">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h2>Masukan Data Psikiater</h2>
    <form action="{{url('/admin/add_psikiater/save')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama">
        </div>
        <br>
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Masukan Username">
        </div>
        <br>
        <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="Masukan Email">
        </div>
        <br>
        <div class="form-group">
            <input type="text" name="password" class="form-control" placeholder="Masukan Password">
        </div>
        <br>
        <div class="form-group">
            <input type="text" name="telepon" class="form-control" placeholder="Masukan Telepon">
        </div>
        <br>
        <div class="form-group">
            <input type="text" name="tarif" class="form-control" placeholder="Masukan Tarif">
        </div>
        <br>
        <div class="form-group">
            <input type="file" class="form-control" name="file" multiple="multiple">
        </div>
        <input type="submit" value="Simpan" class="btn btn-success"/>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script src="{{url('assets/library/dropzone-5.7.0/dropzone.min.js')}}"></script>
</body>
</html>
