<div class="wrapper d-flex align-items-stretch">
@include('pasien_index')
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
<h2 class="mb-4">{{$title}}</h2>
    <form action="{{url('/tanyadok')}}" method="post" enctype="multipart/form-data">
        <table border="0" cellspacing="10" width="1100" align="center">
            <tbody>
                <tr>
                    <td>Subjek</td>
                    <td>:</td>
                    <td><input type="text" name="subjek" placeholder="Subjek" size="50" maxlength="30" autocomplete="off" autofocus/>
                    </td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td><input type="text" name="nama" placeholder="Nama Lengkap" size="50" maxlength="30" autocomplete="off" autofocus/>
                    </td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td>:</td>
                    <td><input type="text" name="stok" placeholder="Umur" size="20" maxlength="10"/></td>
                </tr>
                <tr>
                    <td>Keluhan yang dialami</td>
                    <td>:</td>
                    <td><textarea name="keluhan" placeholder="Tulis Keluhan" rows="3" cols="50"></textarea></td>
                </tr>
                <tr>
                    <td colspan="3"><button class="btn btn-success mt-5" name="kirim">Kirim</button</td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
</div>  