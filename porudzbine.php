<?php
    include 'heder.php';
?>

<div class='container mt-2'>
    <h1 class='text-center text-dark'>
        Torte i kolaci 
    </h1>
    <div class="row mt-2">
        <div class="col-3">
            <select onchange="render()" class="form-control" id="sort">
                <option value="1">Po ceni rastuce</option>
                <option value="-1">Po ceni opadajuce</option>
            </select>
        </div>
        <div class="col-6">
            <input onchange="render()" class="form-control" type="text" id="search" placeholder="search...">
        </div>
        <div class="col-3">
            <select onchange="render()" class="form-control" id="kategorije">
                <option value="0">Sve kategorije</option>
            </select>
        </div>
    </div>
    <div id='podaci'>

    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    let proizvodi = [];
    let kategorije = [];
    let boje = [];
    $(function () {
        $.getJSON('server/kategorija/read.php').then((res => {
            if (!res.status) {
                alert(res.error);
                return;
            }
            kategorije = res.kolekcija;
            for (let kat of kategorije) {
                $('#kategorije').append(`
                <option value="${kat.id}"> ${kat.naziv}</option>
                `)
            }
        }))
            .then(() => {
                return $.getJSON('server/boja/read.php')

            }).then((res => {
                if (!res.status) {
                    alert(res.error);
                    return;
                }
                boje = res.kolekcija;

            }))
            .then(ucitajProizvode)


    })
    }
    function obrisi(id) {
        id = Number(id);
        $.post('server/proizvod/delete.php', { id }).then(res => {
            res = JSON.parse(res);
            if (!res.status) {
                alert(res.error);
                return;
            }

            proizvodi = proizvodi.filter(element => element.id != id);
            render();
        })
    }
</script>

<?php
    include 'futer.php';
?>