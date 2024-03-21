<div class="modal fade" id="newsletterModal" tabindex="-1" aria-labelledby="newsletterModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-light">
        <h5 class="modal-title" id="confirmationModalLabel">Confirmation d'inscription</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Cher(e) abonné(e),</p>
        <p>Nous sommes ravis de vous compter parmi les membres de notre communauté. Votre inscription à notre newsletter a bien été confirmée.</p>

        <p>Dorénavant, vous recevrez régulièrement des mises à jour, des offres exclusives et des informations pertinentes directement dans votre boîte de réception.</p>

        <p>N'hésitez pas à nous contacter si vous avez des questions ou des commentaires. Notre équipe est à votre disposition pour vous aider dans toutes vos démarches.</p>

        <p>Merci encore de votre confiance.</p>

        <p>Cordialement,</p>

        <p>Kiloukoi.be</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

@if(session('success-newsletter'))
    <!-- Appel de la modale de confirmation -->
    <script>
        $(document).ready(function() {
            $('#newsletterModal').modal('show');
        });
    </script>
@endif