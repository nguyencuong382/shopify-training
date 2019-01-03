<template>
  <div class>
    <button
      type="button"
      class="btn btn-primary"
      data-toggle="modal"
      data-target="#modal-add-student"
    >Add more student</button>

    <pulse-loader :loading="loading" :color="color" :size="'20px'"></pulse-loader>
    <br>
    <div class="pagination">
      <button class="btn btn-warning" @click="prevPage" v-bind:disabled="disablePrev">Prev</button>
      <button class="btn btn-info btn-page"  v-for="page in pages" :key="page" @click="goToPage(page)">{{page}}</button>
      <button class="btn btn-warning" @click="nextPage" v-bind:disabled="disableNext">Next</button>
    </div>

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
                <input
                  type="text"
                  class="form-control"
                  v-model="newStudent.email"
                  name="email"
                  v-validate="'required|email'"
                >
                <p class="err" v-if="errors.has('email')">{{errors.first('email')}}</p>
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

    <div id="modal-add-student" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add student</h4>
          </div>
          <form @submit.prevent="addStudent">
            <div class="modal-body">
              <div class="form-group">
                <label for="first_name">First name :</label>
                <input
                  type="text"
                  class="form-control"
                  name="first_name"
                  placeholder="Enter first name"
                  v-model="newStudent.first_name"
                  v-validate.initial="'required|min:2'"
                >
                <p class="err" v-if="errors.has('first_name')">{{errors.first('first_name')}}</p>
              </div>
              <div class="form-group">
                <label for="last_name">Last name:</label>
                <input
                  type="text"
                  class="form-control"
                  name="last_name"
                  placeholder="Enter last name"
                  v-model="newStudent.last_name"
                  v-validate="'required'"
                >
                <p class="err" v-if="errors.has('last_name')">{{errors.first('last_name')}}</p>
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input
                  type="text"
                  class="form-control"
                  name="email"
                  placeholder="Enter email"
                  v-model="newStudent.email"
                  v-validate="'required|email'"
                >
                <p class="err" v-if="errors.has('email')">{{errors.first('email')}}</p>
              </div>
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-default">Add</button>
            </div>
          </form>
        </div>
      </div>
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
      errors_: [],
      prev: "",
      next: "",
      pages: [],
      currentPage: 1,
      disablePrev: true,
      disableNext: true,
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
    fetchStudents(page = 1) {
      this.api.axios_
        .get("students?page=" + page)
        .then(res => res.data)
        .then(res => {
          console.log(res);
          this.students = res.data;
          this.currentPage = res.meta.current_page;

          this.disablePrev = res.meta.current_page === 1;
          this.disableNext = res.meta.current_page === res.meta.last_page;

          this.pages = [];

          for(var i = 1; i <= res.meta.last_page; i++) {
            this.pages.push(i);
          }
        });
    },

    addStudent() {
      this.api.axios_
        .post("student", this.newStudent)
        .then(res => res.data)
        .then(res => {
          this.students.push(res.data);
          $("#modal-add-student").modal("hide");
        })
        .catch();
    },

    prevPage() {
      this.fetchStudents(this.currentPage - 1);
    },

    nextPage() {
      this.fetchStudents(this.currentPage + 1);
    },

    goToPage(page) {
      this.fetchStudents(page);
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

.err {
  color: tomato;
}

.table {
  background-color: white;
}

.btn-page {
  margin: 5px;
}
</style>

