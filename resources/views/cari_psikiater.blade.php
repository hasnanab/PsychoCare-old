<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="_token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<input class="form-control mr-sm-3" type="search" placeholder="Cari Psikiater" aria-label="Search"
       name="search" id="search">
@foreach($user as $u)
    <div class="card mb-3" style="max-width:700px" id="item" user="{{$u->nama}}">
        <div class="row no-gutters">
            @csrf
            <div class="col-md-4">
                <img src="{{url($u->foto)}}" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body item">
                    <h5 class="card-title" id="name"> {{$u->nama}}</h5>
                    <p>{{$u->email}}</p>
                    <p>{{$u->tarif}}</p>
                    <input type="button" class="btn-success" value="chat">
                </div>
            </div>
        </div>
    </div>
@endforeach
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

<script type="text/javascript">
    let dataListId = [];
    $(document).ready(() => {
        $("#item").each(function (index, e) {
            dataListId.push(e.getAttribute("user").toLowerCase());
        })
    });

    $("#search").keyup((e) => {
        let searchText = e.target.value;
        $(".card").each(function (index, e) {
            e.style.display="none";
            console.log(e.getAttribute("user").toLowerCase(), searchText, e.getAttribute("user").toLowerCase().includes(searchText.toLowerCase()));
            if(e.getAttribute("user").toLowerCase().includes(searchText.toLowerCase())) {
                e.style.display="block";
            }
        })
        console.log(e.target.value);
    })
</script>
</body>
</html>
