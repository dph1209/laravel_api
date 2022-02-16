
<template>
  <div class="wrap">
    <div class="header">
      <h1>Your Profile</h1>
      <p>Enter your profile down here!</p>
    </div>
    <div class="content" id="content">
      <div class="name">
        <label for="name">
          Name:
          <input v-model="form.name" type="text" name="name" id="name" />
        </label>
      </div>
      <div class="email">
        <label for="email">
          Email Address:
          <input v-model="form.email" type="email" name="email" id="email" />
        </label>
      </div>
      <div class="username">
        <label for="username">
          UserName:
          <input
            v-model="form.username"
            type="text"
            name="username"
            id="username"
          />
        </label>
      </div>
      <div class="password">
        <label for="password">
          Password:
          <input
            v-model="form.password"
            type="password"
            name="password"
            id="password"
          />
        </label>
      </div>
      <div class="confirm">
        <label for="confirmPass">
          Confrim Password:
          <input
            v-model="form.confirmPass"
            type="password"
            name="confirmPass"
            id="confirmPass"
          />
        </label>
      </div>
      <div class="country">
        <label for="">
          Country:
          <input
            v-model="form.country"
            type="text"
            name="country"
            id="country"
          />
        </label>
      </div>
      <div class="btn">
        <button @click="onclickSubmit()" id="btn-submit">Submit</button>
      </div>
      <div class="show">
        <button @click="onclickShow()" id="btn-show">Show</button>
        <!-- <button @click="onclickEdit()" id="btn-edit">Edit</button> -->
      </div>
      <div style="overflow-x: auto">
        <table>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Password</th>
            <th>Country</th>
          </tr>
          <tr v-for="show of shows" :key="show.profile">
            <td>{{ show.id }}</td>
            <td>{{ show.name }}</td>
            <td>{{ show.email }}</td>
            <td>{{ show.username }}</td>
            <td>{{ show.password }}</td>
            <td>{{ show.country }}</td>
          </tr>
        </table>
      </div>
      <div class="search-update">
        <div>
          <label for="search">Input ID: </label>
          <input type="text" name="search" id="search">
          <div class="search">
            <button @click="onclickSearch()" id="btn-search">Search</button>
          </div>
          <br>
          <label for="name">Name Update: </label>
          <input v-model="formUpdate.nameUpdate" type="text" name="name" id="nameU">
          <label for="email">Email Update: </label>
          <input v-model="formUpdate.emailUpdate" type="email" name="email" id="emailU">
          <label for="username">Username Update: </label>
          <input v-model="formUpdate.usernameUpdate" type="text" name="username" id="usernameU">
          <label for="password">Password Update:</label>
          <input v-model="formUpdate.passwordUpdate" type="password" name="password" id="passwordU">
          <label for="country">Country Update:</label>
          <input v-model="formUpdate.countryUpdate" type="text" name="country" id="countryU">
          <div class="update">
            <button @click="onclickUpdate()" id="btn-update">Update</button>
            <button @click="onclickDelete()" id="btn-delete">Delete</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        name: "",
        email: "",
        username: "",
        password: "",
        country: "",
      },
      formUpdate:{
        nameUpdate:"",
        emailUpdate:"",
        usernameUpdate:"",
        passwordUpdate:"",
        countryUpdate:"",
      },
      shows: [],
    };
  },
  methods: {
    //Creative
    onclickSubmit() {
      axios
        .post("http://127.0.0.1:8000/api/profile/", {
          name: this.form.name,
          email: this.form.email,
          username: this.form.username,
          password: this.form.password,
          country: this.form.country,
        })
        .then((res) => {
          console.log(res.data);
        });
    },
    //Read
    onclickShow() {
      axios.get("http://127.0.0.1:8000/api/profile/").then((res) => {
        this.shows = res.data;
        console.log(res.status);
      });
    },
    //Update
    onclickSearch(){
      const id = document.getElementById("search").value;
      axios.get("http://127.0.0.1:8000/api/profile/" + id).then((res) => {
        this.formUpdate.nameUpdate = res.data.name;
        this.formUpdate.emailUpdate = res.data.email;
        this.formUpdate.usernameUpdate = res.data.username;
        this.formUpdate.passwordUpdate = res.data.password;
        this.formUpdate.countryUpdate = res.data.country;
      });
    },
    onclickUpdate(){
      const id = document.getElementById("search").value;
      axios.put("http://127.0.0.1:8000/api/profile/" + id, {
        name: this.formUpdate.nameUpdate,
        email: this.formUpdate.emailUpdate,
        username: this.formUpdate.usernameUpdate,
        password: this.formUpdate.passwordUpdate,
        country: this.formUpdate.countryUpdate,
      }).then((res) => {
        console.log(res.data);
      });
    },
    //Delete
    onclickDelete(){
      const id = document.getElementById("search").value;
      axios.delete("http://127.0.0.1:8000/api/profile/" + id).then((res) => {
        console.log(res.data);
      });
    },
  },
};
</script>

<style>
* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

.header {
  text-align: center;
  background-color: #a3a3a3;
  padding: 0.3em 1em;
  font-size: 150%;
}

.content {
  background-color: lightblue;
  padding: 0.5em 1em;
  padding-left: 2em;
  font-size: 120%;
}

.content input {
  width: 100%;
  padding: 15px 20px;
  margin: 10px 0;
  border: 2px solid #000;
  border-radius: 5px;
  outline: none;
}

.content input:focus {
  background-color: #e9d8f4;
}

.content button {
  /* align-items: center; */
  width: 100%;
  cursor: pointer;
  border: none;
  border-radius: 5px;
  padding: 15px 10px;
  margin-top: 10px;
}

.content button:hover {
  background-color: #58257b;
  color: #fff;
}

table {
  border-collapse: collapse;
}

table, th, td {
  border: 1px solid #000;
}

th, td {
  padding: 5px;
}

/* Responsive */
/* Desktop */
@media screen and (min-width: 1200px) {
  .wrap {
    border: 2px solid #000;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    margin: auto;
    width: 980px;
    margin-top: 10px;
  }
  .header {
    font-size: 2em;
  }
  .content {
    font-size: 1.3em;
  }
  .content input {
    padding: 10px 15px;
    margin: 5px 0;
  }
  .content .btn {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .content .show, .content .search, .content .update {
    display: flex;
    justify-content: center;
  }
  .content button {
    width: 10%;
    padding: 10px 5px;
  }
  .content .search-update #btn-update{
      margin-right: 5px;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    padding-bottom: 20px;
  }
  table, th, td {
    border: 1px solid #000;
  }
  th, td {
    padding: 5px;
  }
}
</style>
