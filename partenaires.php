<?php 
   require('./actions/securityAction.php');
   require('./actions/entities/addPartnerAction.php');
   require('./actions/entities/getPartnerAction.php');
?>

<?php include './pages/base.php'; ?>

      <div class="section partenaires" id="partenaires">

         <h2>Partenaires</h2>
         <div class="section-content">
            <ul class="list">
               <div class="create-partner open-modal" id="create-partner"><i class="fas fa-plus"></i> Ajouter un partenaire</div>
               <?php 
                  if(isset($errorMsg)){ echo "<p class='errorMsg'>" . $errorMsg . '</p>'; } 
                  if(isset($successMsg)){ echo "<p class='successMsg'>".$successMsg.'</p>'; } 

                  while($partner = $getPartners->fetch()){
                  ?>
                     <li class="list-item">
                        <div class="name"><a href="partenaire-details.php?id=<?= $partner['id']; ?>"><?= $partner['name']; ?></a></div>
                        <div class="status">
                        <?php 
                        if($partner['enable'] == 1){ 
                           echo "<i class='fas fa-circle active'></i>Actif</div>";
                        } else {
                           echo "<i class='fas fa-circle inactive'></i>Inactif</div>";
                        }
                        ?>
                     </li>
                  <?php
                  }
               ?>
            </ul>
         </div>
         
         <!--- MODAL --->
         <div class="modal">
            <div class="modal-content">
               <div class="modal-header">
                  <h4>Ajouter un partenaire</h4>
                  <span class="close-modal"><i class="fas fa-times" id="close"></i></span>
               </div>
               <form class="add-modal" method="POST">
                  <label for="partnerName" class="modal-label">Nom du partenaire</label>
                  <input type="text" class="modal-input" name="partnerName" value="MB - ">
                  <label for="partnerEmail" class="modal-label">Adresse mail du contact</label>
                  <input type="email" class="modal-input" name="partnerEmail">
                  <div class="checkbox">
                     <input type="checkbox" class="check" name="enablePartner" id="enablePartner" value="1" />
                     <label for="enablePartner" class="check-label">Activer ce partenaire ?</label>
                  </div>
                  <button class="btn-add-modal" type="submit" name="createPartner">Ajouter</button>
               </form>
            </div>
         </div>
      </div>

<?php include './pages/include/foot.php'; ?>
