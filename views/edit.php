<?php include('includes/header.html'); ?>
<h3 class="text-center">Labot</h3>

<div class="container">
    <form method ="post" action ="/">
        <div class="form-group">
            <label for="title" class="h5">Virsrakts</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Virsraksts" required oninvalid="this.setCustomValidity('Lūdzu, pievieno virsrakstu!')"
                oninput="this.setCustomValidity('')" value="<?php echo $model->getTitle(); ?>">
        </div>
        <div class="form-group">
            <label for="text" class="h5">Apraksts</label>
            <textarea class="form-control" id="text" name="text" rows="5" placeholder="Apraksts"><?php echo $model->getText(); ?></textarea>
        </div>

        <div>
            <a class="btn btn-outline-primary" href="/">Doties atpakaļ</a>
            <!-- <input type="submit" name="save" value="Click here to save" />
            <input type="submit" name="delete" value="Click here to delete" /> -->
            <div class="btn-toolbar float-right">
                <a href="#" class="btn btn-outline-danger mr-4" onclick="document.getElementById('delete-form').submit()">Dzēst</a>  
                <input type="hidden" name="action" value="update"> 
                <input type="hidden" name="id" value="<?php echo $model->getId(); ?>">     
                <button type="submit" class="btn btn-outline-success">Saglabāt</button>
            </div>
        </div>
    </form>

    <form method="post" action="/" id="delete-form">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="id" value="<?php echo $model->getId(); ?>">
    </form>
</div>

<?php include('includes/footer.html'); ?>