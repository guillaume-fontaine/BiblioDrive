
<?php  
echo'  <div class="row">
   <div class="col-md-9">
    <div class="card bg-secondary">
     <div class="card-body">La bibliothèque de Moulinsart est fermé au public jusqu\'à nouvel ordre. Mais il vous est possible de réserver et retirer vos livres via notre service Biblio Drive !
     </div>
     </div>
     <div class="row">
      <div class="col-md-12">
       <div class="card bg-secondary">
        <div class="card-body">
         <div class="row">
          <div class="col-md-3">
           <a href="https://'.$_SERVER["HTTP_HOST"].'/addbook" class="text-dark">Ajouter un livre</a>
          </div>
          <div class="col-md-3">
           <a href="https://'.$_SERVER["HTTP_HOST"].'/adduser" class="text-dark">Ajouter un utilisateur</a>
          </div>
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>
    <div class="col-md-3">
     <a href="https://'.$_SERVER["HTTP_HOST"].'">
      <div class="card bg-secondary">
       <div class="card-body">
        <img class="card-img-top img-fluid" src="../res/moulinsart.jpg">
       </div>
      </div>
     </a>
    </div>
  </div>
';
?>
