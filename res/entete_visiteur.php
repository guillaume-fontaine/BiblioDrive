
<?php  
echo'  <div class="row">
   <div class="col-md-9">
    <div class="card bg-secondary">
     <div class="card-body">La bibliothèque de Moulinsart est fermé au public jusqu\'à nouvel ordre. Mais il vous est possible de réserver et retirer vos livres via notre service Biblio Drive !
     </div>
     </div>
     <div class="row">
      <div class="col-md-9">
       <div class="card bg-secondary">
        <div class="card-body">
         <form action="../searchbook/" class="form-row" method="get">
          <div class="col-md-11">
           <input type="text" class="form-control bg-light" id="booksearch" placeholder="Rechercher dans le catalogue (saisie du nom de l\'auteur)" name="booksearch" required>
          </div>
          <div class="col-md-1">
           <button type="submit" class="btn btn-dark mb-2">
            <i class=\'fas fa-search\'></i>
           </button>
          </div>
         </form> 
        </div>
       </div>
      </div>
      <div class="col-md-3">
       <a href="http://'.$_SERVER["HTTP_HOST"].'/BiblioDrive/shop" class="text-dark">
        <div class="card bg-secondary">
         <div class="card-body">
          <h2 class="text-center">Panier</h2>
         </div>
        </div>
       </a>
      </div>
     </div>
    </div>
    <div class="col-md-3">
     <a href="http://'.$_SERVER["HTTP_HOST"].'/BiblioDrive">
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