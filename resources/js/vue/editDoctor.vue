<template>
  <div>
    <form @submi.prevent>
      <div class="row mb-3">
        <label for="name" class="col-10 col-form-label">Name:</label>
        <div class="col-sm-10">
          <input
            type="text"
            class="form-control"
            id="nameText"           
            :class="[this.errors.name  ? 'is-invalid' : '']"
            v-model="name"
            required
          />
          <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
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
            :class="[this.errors.speciality || this.speciality == '' ? 'is-invalid' : '']"
            id="nameText"
            v-model="speciality"
            requred            
          />
          <div v-if="errors && errors.speciality" class="text-danger">{{ errors.speciality[0] }}</div>
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
            :class="[this.errors.institution || this.institution == '' ? 'is-invalid' : '']"
            id="nameText"
            v-model="institution"
            required
          />
           <div v-if="errors && errors.institution" class="text-danger">{{ errors.institution[0] }}</div>
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
      <!-- <button type="submit" class="btn btn-primary" @click="updateDoctor"> -->
          <input type="text" class="btn btn-primary" @click="updateDoctor" placeholder="update a doctor"/>
        <!-- Edit a doctor -->
      <!-- </button> -->
    </form>
  </div>
</template>
<script>
export default {
  props: ["doctor"],

  data: function () {
    return {
      name: this.doctor.name,
      user_id: this.doctor.user_id,
      speciality: this.doctor.speciality,
      institution: this.doctor.institution,
      is_active: this.doctor.is_active,
      errors: {},
    };
  },

  methods: {
    updateDoctor() {
        axios.put('/api/doctor/update/' + this.doctor.id,{
          name: this.name, 
          user_id: this.user_id, 
          speciality: this.speciality, 
          institution: this.institution, 
          is_active: this.is_active 
        }).then( response => {
             if(response.status == 200) {
           console.log('update is successfull');
          }
        }).catch(error => {
            console.log(1, error.response.data.errors.name[0]);
            this.errors = error.response.data.errors;

        })
    },
  },

  mounted() {
    console.log(this.doctor,  '/api/doctor/update/' + this.doctor.id);
  },
};
</script>