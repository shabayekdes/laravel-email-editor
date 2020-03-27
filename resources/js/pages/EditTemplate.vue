<template>
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <div class="form-group row">
          <label for="template_name" class="col-sm-4 col-form-label">Template Name</label>
          <div class="col-sm-8">
            <input
              type="text"
              class="form-control"
              v-model="template.template_name"
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
            <select class="custom-select" v-model="template.type">
              <option selected>Open this select menu</option>
              <option value="1">Invoice</option>
            </select>
          </div>
        </div>
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
          <label>Subject</label>
          <div class="form-lookup">
            <input
              type="text"
              class="form-control"
              v-model="template.subject"
              placeholder="Enter subject"
            />
          </div>
        </div>
        <div class="form-group">
          <label>
            Message
            <small>(MARKDOWN)</small>
          </label>
          <div class="form-lookup">
            <textarea class="form-control" v-model="template.message"></textarea>
            <ul class="form-list">
              <li
                v-for="(value, key) in activeOptions"
                :key="key"
                draggable="true"
                @dragstart="onDrag(key, $event)"
              >{{value}}</li>
            </ul>
          </div>
        </div>
        <div class="md-btn">
          <button class="btn btn-success" @click="send">Send</button>
          <button class="btn btn-dark" @click="update">Save</button>
        </div>
      </div>
      <div class="col-md-5">
        <div class="md-subject">{{ replacedSubject }}</div>
        <div class="md-content" v-html="compiledMarkdown"></div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      template: {},
      options: {}
    };
  },
  methods: {
    fetch() {
      axios.get(`/api/template/${this.$route.params.id}/show`).then(res => {
        this.template = res.data.template;
        this.options = res.data.options;
      });
    },
    replaceVariables(input) {
      let lookup = this.options.replaceable || {};
      let updated = input;

      Object.keys(lookup).forEach(key => {
        updated = updated.replace(new RegExp(key, "g"), lookup[key]);
      });

      return updated;
    },
    onDrag(value, e) {
      e.dataTransfer.setData("text/plain", value);
    },
    send() {
      axios.post(`/api/template/create`, this.template).then(res => {
        alert("Done!");
      });
    },
    update() {
      axios
        .put(`/api/template/${this.$route.params.id}/update`, this.template)
        .then(res => {
          this.$router.push({ path: "/app/templates" });
        });
    }
  },
  mounted() {
    this.fetch();
  },
  computed: {
    replacedSubject() {
      return this.replaceVariables(this.template.subject || "");
    },
    compiledMarkdown() {
      const input = this.replaceVariables(this.template.message || "");
      return md.render(input);
    },
    activeOptions() {
      const active = {};
      Object.keys(this.options).forEach(key => {
        if (this.template.message.indexOf(key) <= 0) {
          active[key] = this.options[key];
        }
      });

      return active;
    }
  }
};
</script>
