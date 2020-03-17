<?php $helper = new Helper;?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Balai Sadyaya</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="/reservation/validate_entry">
          @csrf

          <div class="form-group">
            <header><strong>Room Information</strong></header>
          </div>
          
          <div class="container">
            <div class="form-group">
              <label for="sel1">Select Room:</label>
            
              <select class="form-control" name="room" id="sel1">
              @foreach($helper::get_rooms() as $room)  
                <option value="{{ $room->room_id }}">{{ ucwords($room->room_name) }}</option>
              @endforeach  
              </select>
            
            </div>

            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Date Start</label>
              <input type="date" class="datee form-control" name="date_start" id="date_start"  required>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Date End</label>
              <input type="date" class="datee form-control" name="date_end" id="date_end" required>
            </div>
          </div>

          <div class="form-group">
            <header><strong>Personal Information</strong></header>
          </div>

          <div class="container">
            <div class="form-group">
              <label for="sel1">First Name:</label>
              <input type="text" class="datee form-control" placeholder="Enter First Name" name="firstname">
            </div>

            <div class="form-group">
              <label for="sel1">Last Name:</label>
              <input type="text" class="datee form-control" placeholder="Enter Last Name" name="lastname">
            </div>

            <div class="form-group">
              <label for="sel1">Email:</label>
              <input type="text" class="datee form-control" placeholder="Enter Email Address" name="email">
            </div>
          </div>

        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <!--<button type="button" id="" name="submit" class="btn btn-primary">Submit Plan</button>-->
          <input type="submit" class="btn btn-success" name="submit">
        </div>
        
        
      </form>
    </div>
  </div>
</div>