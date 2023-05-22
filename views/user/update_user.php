<div class="login_box">
    <div class="login">
        <h2 class="text-center">Choix du rôle : </h2>
    
        <form action="" method="post" class="needs-validated">
        

            <?php
                if(isset($users)){
                    echo '<h3 class="text-center">'.$users['user'].'</h3>';
                    }
                ?>
            <br>
            <div class="form-group">
                <label class="form-label" for="role">Rôle : </label>
                <select name="role" id="role"  class="form-control">
                    <option value="default"
                    <?php
                        if(isset($users) && $users['role'] == 'default'){
                            echo 'selected';
                        }
                    ?>
                    >Defaut</option>
                    <option value="admin"
                    <?php
                        if(isset($users) && $users['role'] == 'admin'){
                            echo 'selected';
                        }
                    ?>
                    >Admin</option>
                </select>
                </div>
            <div class="form-group">
            <input type="submit" name="ajouter" value="Modifier" class="btn btn-success w-100">
            </div>
        </form>
    </div>
</div>