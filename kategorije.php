<?php
    include 'heder.php';
?>

<div class='container mt-2'>
    <h1 class='text-center text-dark'>
        Kategorije torti i kolaca
    </h1>
</div>

<div class='container'>
    <div class='row mt-2'>
        <div class='col-6'>
            <table class='table table-dark'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Naziv</th>
                        <th>Izmeni</th>
                        <th>Obrisi</th>
                    </tr>
                </thead>
                <tbody id='kategorije'>

                </tbody>
            </table>


        </div>
        <div class='col-6'>
            <h3 class="text-dark text-centar" id='naslov'>Kreiraj kategoriju</h3>
            <form id='forma'>
                <div class='form-group'>
                    <label for="naziv">Naziv</label>
                    <input required class="form-control" type="text" id="naziv">
                </div>
                <button class="btn btn-dark form-control" type="submit">Sacuvaj</button>

            </form>
            <button id="vrati" hidden class="btn btn-secondary form-control mt-2" onclick="setIndex(-1)">Vrati se
            </button>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<?php
    include 'futer.php';
?>