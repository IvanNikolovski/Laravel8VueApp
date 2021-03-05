<template>
  <div class="d-flex justify-content-center">
    <form @submit.prevent="addDoctor">
      <!-- <h3>Enter a new doctor:</h3> -->
      <h3>{{ trans("messages.welcome") }}</h3>
      <div class="row mb-3 has-validation">
        <label for="name" class="col-10 col-form-label">Name:</label>
        <div class="col-sm-10">
          <input
            type="text"
            class="form-control"
            id="nameText"
            v-model="name"
            :class="[this.errors.name ? 'is-invalid' : '']"
            required
          />
          <div v-if="errors && errors.name" class="text-danger">
            {{ errors.name[0] }}
          </div>
        </div>
        <div class="row mb-3">
          <label for="speciality" class="col-10 col-form-label"
            >Speciality:</label
          >
          <div class="col-sm-10">
            <input
              type="text"
              class="form-control"
              :class="[this.errors.speciality ? 'is-invalid' : '']"
              id="specId"
              v-model="speciality"
            />
            <div v-if="errors && errors.speciality" class="text-danger">
              {{ errors.speciality[0] }}
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <label for="institutuion" class="col-10 col-form-label"
            >Institution:</label
          >
          <div class="col-sm-10">
            <input
              type="text"
              class="form-control"
              :class="[this.errors.institution ? 'is-invalid' : '']"
              id="inst"
              v-model="institution"
            />
            <div v-if="errors && errors.institution" class="text-danger">
              {{ errors.institution[0] }}
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-10 offset-sm-2">
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                id="gridCheck1"
                v-model="is_active"
              />
              <label class="form-check-label" for="gridCheck1"> Active </label>
            </div>
          </div>
        </div>
      </div>
      <input
        type="text"
        class="btn btn-primary"
        @click="addDoctor"
        placeholder="add"
      />
      <!-- <button type="submit" class="btn btn-primary"  @click="addDoctor">Add</button> -->
    </form>
  </div>
</template>

<script>
// import i18n from "./lang.js";
// import .lodash
export default {
  props: ["user"],

  data: function () {
    return {
      name: "",
      user_id: "",
      speciality: "",
      institution: "",
      is_active: "",
      errors: {},
    };
  },
  methods: {
    // mounted (){
    //   console.log(i18n.auth.email, 'hello');
    // },

    addDoctor() {
      axios
        .post("/api/doctor/store", {
          name: this.name,
          user_id: this.user,
          speciality: this.speciality,
          institution: this.institution,
          is_active: this.is_active,
        })
        .then((response) => {
          if (response.status == 200) {
            (this.name = ""),
              (this.user_id = ""),
              (this.speciality = ""),
              (this.institution = ""),
              (this.is_active = "");
            window.location.href = "/doctor/create";
          }
        })
        .catch((error) => {
          console.log(error);
          this.errors = error.response.data.errors;
        });
    },
  },
  // mounted(){
  //   console.log(i18n.messages.newDoctor, 'hello');
  // },
};
</script>