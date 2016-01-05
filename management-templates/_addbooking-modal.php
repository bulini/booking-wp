<div id="addbooking" class="modal fade">
  <form>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                <h4 id="bookingTitle" class="modal-title">Nuovo Booking</h4>
            </div>
            <div id="modalBody" class="modal-body">
                <div class="form-group">
                  <label for="checkin">checkin</label>
                  <input type="text" class="form-control" id="checkin" name="checkin">
                </div>

                <div class="form-group">
                  <label for="checkin">checkout</label>
                  <input type="text" class="form-control" id="checkout" name="checkout">
                  <input type="hidden" class="form-control" id="room_id" name="room_id" value="<?php echo $_GET['room_id']; ?>">
                </div>

                <div class="form-group">
                  <label for="booking-name">Booking Resource (Expedia, Airbnb, Closed etc..)</label>
                  <input type="text" class="form-control" id="booking-name">
                </div>
                <div id="booking-response">

                </div>
          </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                <button class="btn btn-primary" id="insert-booking">Inserisci</a></button>
            </div>
        </div>
    </div>
  </form>
</div>
