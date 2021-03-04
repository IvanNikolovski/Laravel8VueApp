<template>
    <div class="d-flex justify-content-center">
    <form >   
    <div class="row mb-3">
        <label for="name" class="col-10 col-form-label">Name:</label>
        <div class="col-sm-10">
        <label for="name" class=" form-control col-10 col-form-label">{{this.doctor.name}}</label>        
        </div>
    </div>
    <div class="row mb-3">
        <label for="speciality" class="col-10 col-form-label">Speciality:</label>
        <div class="col-sm-10">
        <label for="name" class=" form-control col-10 col-form-label">{{this.doctor.speciality}}</label>
        </div>
    </div>
    <div class="row mb-3">
        <label for="institutuion" class="col-10 col-form-label">Institution:</label>
        <div class="col-sm-10">
        <label for="name" class=" form-control col-10 col-form-label">{{this.doctor.institution}}</label>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-10 offset-sm-2">
        <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck1" name="is_active" v-model="this.doctor.is_active" disabled>
            <label class="form-check-label" for="gridCheck1">
            </label>
        </div>
        </div>
    </div>
    <input type="text" class="btn btn-primary" @click="deleteDoctor" placeholder="delete a doctor"/>
    <!-- <button type="submit" class="btn btn-danger">Delete this doctor</button> -->
    </form>
</div>
</template>

<script>
export default {
    props: ['doctor'],
    methods: {
    deleteDoctor() {
        axios.delete('/api/doctor/delete/' + this.doctor.id)
        .then( response => {
             if(response.status == 200) {
           console.log('delete is successfull');
           window.location.href = '/doctor/create';
          }
        }).catch(error => {
            console.log(error.response.data.errors);
            this.errors = error.response.data.errors;

        })
    },
  },
    mounted() {
    console.log('/api/doctor/delete/' + this.doctor.id);
  },
}
</script>