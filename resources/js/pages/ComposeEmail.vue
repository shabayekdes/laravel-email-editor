<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <form>
          <div class="form-group">
            <label>Email To</label>
            <input
              type="text"
              class="form-control"
              placeholder="Enter email to"
              v-model="template.email_to"
            />
          </div>
          <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" placeholder="Subject of email ..." id="subject" />
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" placeholder="Enter body of message here ..."></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
export default {};
</script>
