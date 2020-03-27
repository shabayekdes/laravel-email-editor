<template>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <form @submit.prevent="createTemplate">
          <div class="form-group row">
            <label for="template_name" class="col-sm-4 col-form-label">Template Name</label>
            <div class="col-sm-8">
              <input
                type="text"
                class="form-control"
                v-model="form.template_name"
                id="template_name"
                placeholder="Enter name of template ..."
                aria-describedby="NameHelp"
              />
              <small
                id="NameHelp"
                class="form-text text-muted"
              >Template name sample not appear when send email.</small>
            </div>
          </div>
          <div class="form-group row">
            <label for="template_type" class="col-sm-4 col-form-label">Template Type</label>
            <div class="col-sm-8">
              <select class="custom-select" v-model="form.type">
                <option selected>Open this select menu</option>
                <option value="1">Invoice</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="subject">Subject</label>
            <input
              type="text"
              class="form-control"
              v-model="form.subject"
              placeholder="Subject of email ..."
              id="subject"
            />
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea
              class="form-control"
              v-model="form.message"
              placeholder="Enter body of message here ..."
            ></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="col-md-6">
        <div class="subject">Subject here</div>
        <div class="content mt-3">Body of message here</div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      form: {}
    };
  },
  methods: {
    createTemplate() {
      axios.post(`/api/template/store`, this.form).then(res => {
        this.$router.push({ path: "/app/templates" });
      });
    }
  }
};
</script>
