<template>
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <div class="form-group">
          <label>Email To</label>
          <input type="text" class="form-control" placeholder="Send mail to" />
        </div>
        <div class="form-group">
          <label>Subject</label>
          <div class="form-lookup">
            <input type="text" class="form-control" placeholder="Enter subject" />
          </div>
        </div>
        <div class="form-group">
          <label>
            Message
            <small>(MARKDOWN)</small>
          </label>
          <div class="form-lookup">
            <textarea class="form-control"></textarea>
          </div>
        </div>
        <div class="md-btn">
          <button class="btn btn-success">Send</button>
          <button class="btn btn-success">Save</button>
        </div>
      </div>
      <div class="col-md-5">
        <div class="md-subject"></div>
        <div class="md-content"></div>
      </div>
    </div>
  </div>
</template>
<script>
export default {};
</script>
