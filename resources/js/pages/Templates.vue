<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="d-flex justify-content-between bd-highlight mb-3">
          <div class="p-2 bd-highlight">
            <h5 class="card-title">List Templates</h5>
          </div>
          <div class="p-2 bd-highlight">
            <router-link :to="{ name: 'template.create'}" class="btn btn-success">
              <i class="fas fa-plus"></i> Add New
            </router-link>
          </div>
        </div>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Template Name</th>
              <th scope="col">Subject</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="template in templates" :key="template.id">
              <td>{{ template.id }}</td>
              <td>{{ template.template_name }}</td>
              <td>{{ template.subject }}</td>
              <td>
                <router-link
                  :to="{ name: 'template.edit' , params: { id: template.id } }"
                  class="btn btn-primary float-right"
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
      axios.get(`/api/templates`).then(res => {
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
