<?php

class Admin {

    public function OmezPristup() {
        if ($_SESSION['admin'] == false) {
            echo("<div class='alert-dismissible alert alert-danger fade show' role='alert'>Nemáte dostatečné oprávnění k přístupu<button type='button' class='close' data-dismiss='alert'>&times;</span></button></div>");
            echo('<a class="btn btn-primary m-3" role"link" href="admin/login.php">Nové přihlášení</a></button>');
            echo('<a class="btn btn-secondary m-3" role"link" href="index.php">Odejít</a></button>');
            die();
        }
    }

    public function VypisIndexPojisteni() {
        if ($_SESSION['admin'] == true) {
            echo ('<a class="btn btn-success d-flex justify-content-center m-4" role="link" href="createPojisteni.php">Vytvořit pojištění</a>
        <a class="btn btn-warning d-flex justify-content-center m-4" role="link" href="updatePojisteni.php">Upravit pojištění</a>
        <a class="btn btn-danger d-flex justify-content-center m-4" role="link" href="deletePojisteni.php">Odstranit pojištění</a>');
        }
    }

    public function VypisIndexUzivatele() {
        if ($_SESSION['admin'] == true) {
            echo('<div class="col alert-secondary m-1">
        <h3 class="text-center">Správa uživatelů</h3>
        <a class="btn btn-primary d-flex justify-content-center m-4" role="link" href="admin/DashboardAll.php">Výpis uživatelů</a>
        <a class="btn btn-success d-flex justify-content-center m-4" role="link" href="admin/create.php">Vytvořit uživatele</a>
    </div>');
        }
    }
    
    public function VypisOdstranit() {
        if ($_SESSION['admin'] == true) {
           echo '<button type = "button" class = "btn btn-secondary">
                                    <a style = "color: white;" href = "delete.php?id=<?php echo $rows["id"]; ?>">Odstranit</a></button>';
        }
    }
    
    public function Presmeruj() {
                    header("location:../index.php");

    }

}
