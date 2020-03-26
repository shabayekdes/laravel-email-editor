<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Subject</th>
              <th scope="col">Message</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="template in templates" :key="template.id">
              <td>{{ template.id }}</td>
              <td>{{ template.subject }}</td>
              <td>{{ template.message }}</td>
              <td>
                <router-link
                  :to="{ name: 'mail.editor' , params: { id: template.id } }"
                  class="btn btn-info float-right"
                >Edit</router-link>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      templates: {}
    };
  },
  methods: {
    fetch() {
      axios.get(`/api/emails`).then(res => {
        this.templates = res.data.templates;
      });
    }
  },
  mounted() {
    this.fetch();
  }
};
</script>

<style>
</style>
