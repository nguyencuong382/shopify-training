<template>
  <div class="container">
    <pulse-loader :loading="loading" :color="color" :size="'20px'"></pulse-loader>
    <div class="table-responsive">
      <table class="table no-margin">
        <thead>
          <tr>
            <th>Student Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(student, index) in students" :key="index">
            <td>{{student.id}}</td>
            <template v-if="student.id !== newStudent.id">
              <td>{{student.first_name}}</td>
              <td>{{student.last_name}}</td>
              <td>{{student.email}}</td>
              <td>
                <button class="btn btn-warning" @click="editStudent(student)">Edit</button>
              </td>
              <td>
                <button class="btn btn-danger" @click="deleteStudent(student.id)">Delete</button>
              </td>
            </template>
            <template v-else>
              <td>
                <input
                  type="text"
                  class="form-control"
                  name="first name"
                  placeholder="Enter first name"
                  v-model="newStudent.first_name"
                  v-validate.initial="'required|min:2'"
                >
                <p class="err" v-if="errors.has('first name')">{{errors.first('first name')}}</p>
              </td>
              <td>
                <input
                  type="text"
                  class="form-control"
                  name="last name"
                  placeholder="Enter last name"
                  v-model="newStudent.last_name"
                  v-validate="'required'"
                >
                <p class="err" v-if="errors.has('last name')">{{errors.first('last name')}}</p>
              </td>
              <td>
                <input type="text" class="form-control" v-model="newStudent.email" name="email">
              </td>
              <td>
                <button class="btn btn-primary" v-on:click="updateStudent()">Update</button>
              </td>
              <td>
                <button class="btn btn-secondary" @click="cancelEditStudent(student.id)">Cancel</button>
              </td>
            </template>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import Api from "./api.js";
import PulseLoader from "vue-spinner/src/PulseLoader.vue";

export default {
  components: {
    PulseLoader
  },
  data() {
    return {
      loading: false,
      color: "#42BF94",
      students: [],
      newStudent: {
        id: "",
        first_name: "",
        last_name: "",
        email: ""
      }
    };
  },
  beforeCreate() {
    this.api = new Api();

    // set up loading animation when load data
    this.api.whenRequest(
      () => {
        this.loading = true;
      },
      () => {
        this.loading = false;
      }
    );

    this.api.whenDone(
      () => {
        this.loading = false;
      },
      () => {
        this.loading = false;
      }
    );
    // end of set up loading
  },

  created() {
    // get students data when component has been created
    this.fetchStudents();
  },

  methods: {
    fetchStudents() {
      this.api.axios_
        .get("students")
        .then(res => res.data)
        .then(res => {
          this.students = res.data;
        });
    },

    editStudent(student) {
      this.newStudent = { ...student };
    },

    async updateStudent() {
      // replace new student into old student
      await this.api.axios_
        .put(`student/${this.newStudent.id}`, this.newStudent)
        .then(res => res.data)
        .then(res => {
          var newStudent = res.data;
          this.students = this.students.map(student => {
            if (student.id === newStudent.id) {
              return newStudent;
            } else {
              return student;
            }
          });
        })
        .catch(e => {
          alert("Can't update student with id = " + this.newStudent.id);
        });
      // remove editing state
      this.newStudent = { ...this.newStudent, id: "" };
    },

    cancelEditStudent(student_id) {
      // remove editint state
      this.newStudent = { ...this.newStudent, id: "" };
    },

    deleteStudent(student_id) {
      this.api.axios_
        .delete(`student/${student_id}`)
        .then(res => res.data)
        .then(res => {
          this.students = this.students.filter(
            student => student.id !== student_id
          );
        })
        .catch(e => {
          alert("Can't delete student with id = " + student_id);
        });
    }
  }
};
</script>

<style scoped>
.v-spinner,
.container {
  width: 100%;
  height: 100%;
}

.v-spinner {
  text-align: center;
}
</style>

