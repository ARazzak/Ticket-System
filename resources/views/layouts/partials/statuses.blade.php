
    <div class="form-group">
      <label for="status">Status</label>
      <select class="form-control" id="status" name="status" value="{{ !empty($tickets) ? $tickets->status :''}}">
       @foreach($statuses as $status)
        <option value = "{{ $status->name}}" {{ !empty($tickets) && $tickets->status =$status->name ? "Selected" : "" }} >{{ $status->name}}</option>
       @endforeach

     </select>
   </div>
