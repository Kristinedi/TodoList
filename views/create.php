<?php include('includes/header.html'); ?>

<h3 class="text-center">Pievienot jaunu</h3>

<div class="container">
    <form method ="post" action ="/">
        <div class="form-group">
            <label for="title" class="h5">Virsrakts</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Virsraksts" required oninvalid="this.setCustomValidity('Lūdzu, pievieno virsrakstu!')"
        oninput="this.setCustomValidity('')">
        </div>

        <div class="form-group">
            <label for="text" class="h5">Apraksts</label>
            <textarea class="form-control" id="text" name="text" rows="5" placeholder="Apraksts"></textarea>
        </div>

        <input type="hidden" name="action" value="store">
        <a class="btn btn-outline-primary" href="/">Doties atpakaļ</a>
        <button type="submit" class="btn btn-outline-success float-right">Pievienot</button>
    </form>
</div>



<?php include('includes/footer.html'); ?>