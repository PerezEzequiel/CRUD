<?php

require_once "./database.php";

$id = $_GET["id"];

echo $id;

$queryPrepare = $connection->prepare("SELECT * FROM contacts WHERE id = :id");
$queryPrepare->bindParam(":id", $id);
$queryPrepare->execute();

if ($queryPrepare->rowCount() == 0) {
  echo "ERROR 404";
} else {
  $contact = $queryPrepare->fetch(PDO::FETCH_ASSOC);
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = $_POST["name"];
  $phone_number = $_POST["phone_number"];
  $queryPrepare = $connection->prepare("UPDATE contacts set name = :name, phone_number = :phone_number WHERE id = :id");
  $queryPrepare->bindParam(":name",$name);
  $queryPrepare->bindParam(":phone_number",$phone_number);
  $queryPrepare->bindParam(":id", $id);
  $queryPrepare->execute();
  header("Location: home.php");
}

 


require "./partials/header.php";

?>
    <div class="container pt-5">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Edit Contact</div>
            <div class="card-body">
              <form method="POST" action="./edit.php?id=<?php echo $contact["id"]?>">
                <div class="mb-3 row">
                  <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                  <div class="col-md-6">
                    <input value = "<?php echo $contact["name"]?>"id="name" type="text" class="form-control" name="name" autocomplete="name" autofocus>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="phone_number" class="col-md-4 col-form-label text-md-end">Phone Number</label>

                  <div class="col-md-6">
                    <input id="phone_number" value = "<?php echo $contact["phone_number"]?>"type="tel" class="form-control" name="phone_number" autocomplete="phone_number" autofocus>
                  </div>
                </div>

                <div class="mb-3 row">
                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php require "./partials/footer.php"; ?>

</html>
