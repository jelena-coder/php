<?php
    include 'heder.php';
?>

<div class='container mt-2 mb-5'>
    <h1 class='text-center text-dark'>
        Kreiraj novu narudzbinu
    </h1>
    <div class='row mt-2 d-flex justify-content-center'>
        <div class='col-7'>
            <form id='forma'>
                <div class='form-group'>
                    <label for="naziv">Naziv</label>
                    <input required name="naziv" class="form-control" type="text" id="naziv">
                </div>
                <div class='form-group'>
                    <label for="cena">Cena</label>
                    <input required name="cena" class="form-control" type="number" min="1" id="cena">
                </div>

                <div class='form-group'>
                    <label for="boja">Boja</label>
                    <select required name='boja' class="form-control" id="boja"></select>
                </div>
                <div class='form-group'>
                    <label for="kategorija">Kategorija</label>
                    <select required name="kategorija" class="form-control" id="kategorija"></select>
                </div>
                <div class='form-group'>
                    <label for="slika">Slika</label>
                    <input required name="slika" class="form-control-file" type="file" id="slika">
                </div>
                <div class='form-group'>
                    <label for="opis">Opis</label>
                    <textarea required name="opis" class="form-control" type="number" id="opis"></textarea>
                </div>
                <button type="submit" class="btn btn-primary form-control">Kreiraj</button>
            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    
    $(function () {
        ucitajOptions('server/boja/read.php', 'boja');
        ucitajOptions('server/kategorija/read.php', 'kategorija');
        $('#forma').submit(e => {

            e.preventDefault();

            const naziv = $('#naziv').val();
            const cena = $('#cena').val();
            const boja = $('#boja').val();
            const kategorija = $('#kategorija').val();
            const opis = $('#opis').val();
            const slika = $("#slika")[0].files[0];
            const fd = new FormData();
            fd.append("slika", slika);
            fd.append("naziv", naziv);
            fd.append("opis", opis);
            fd.append("cena", cena);
            fd.append("boja", boja);
            fd.append("kategorija", kategorija);
            $.ajax(
                {
                    url: "./server/porudzbina/create.php",
                    type: 'post',
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        data = JSON.parse(data);
                        if (!data.status) {
                            alert(data.error);
                        }

                    },

                }
            )
        })
    })
   

  

</script>