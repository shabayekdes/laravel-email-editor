<template>
  <div class="container">
    <div class="row">
      <div class="col-md-7">
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
          </div>
        </div>
        <div class="md-btn">
          <button class="btn btn-success" @click="send">Send</button>
          <button class="btn btn-success">Save</button>
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
      options: {
        variables: {
          subject: {},
          message: {}
        },
        replaceable: {}
      }
    };
  },
  methods: {
    fetch() {
      axios.get(`/api/email/${this.$route.params.id}/show`).then(res => {
        this.template = res.data.template;
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
    send() {
      axios.post(`/api/email/create`, this.template).then(res => {
        alert("Done!");
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
    }
  }
};
</script>
