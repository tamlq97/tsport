<template>
  <v-layout row wrap>
    <v-flex>
      <v-list max-width="500" class="m-auto">
        <div>
          <span class="mr-2 flex-grow-0 flex-shink-0">
            <v-btn
              color="primary"
              v-if="$can('create_category')"
              block
              @click="parentClick=true"
            >New Item</v-btn>
          </span>
          <span class="flex-grow-1 flex-shink-1">
            <v-text-field
              style="200px"
              :autofocus="parentClick ? true : false"
              v-model="item.name"
              @keypress.enter="saveCateParent"
              label="Name"
              @blur="parentClick = false"
              v-if="parentClick"
            />
          </span>
        </div>
        <div v-for="(c,k) in categories" :key="k">
          <div class="d-flex">
            <v-list-group class="flex-grow-1 flex-shink-1">
              <template #activator>
                <span>{{c.name}}</span>
              </template>
              <v-list max-width="760">
                <v-list-group class="pl-5" v-for="(c1,k1) in c.group" :key="k1">
                  <template #activator>
                    <v-list-item-title>{{c1.name}}</v-list-item-title>
                  </template>
                  <v-list class="pl-5">
                    <v-list-item>
                      <span class="mr-2 flex-grow-0 flex-shink-0">
                        <v-btn
                          color="primary"
                          block
                          v-if="$can('create_subcategory')"
                          @click="subCateClick=true"
                        >New Item</v-btn>
                      </span>
                      <span class="flex-grow-1 flex-shink-1">
                        <v-text-field
                          :autofocus="subCateClick ? true : false"
                          style="200px"
                          v-model="item.name"
                          @keypress.enter="save(c1)"
                          label="Name"
                          @blur="subCateClick = false"
                          v-if="subCateClick"
                        />
                      </span>
                    </v-list-item>
                    <v-list-item v-for="(c2,k2) in c1.descendants" :key="k2">
                      <div class="d-flex">
                        <v-list-item-title class="flex-grow-1 flex-shink-1">{{c2.name}}</v-list-item-title>
                        <v-list-item-action>
                          <div class="d-flex">
                            <v-btn
                              color="primary"
                              v-if="$can('edit_subcategory')"
                              x-small
                              @click="editChildren(c2)"
                            >
                              <v-icon>mdi-pen</v-icon>
                            </v-btn>

                            <v-btn
                              @click="deleteItem(c2)"
                              v-if="$can('delete_subcategory')"
                              x-small
                              color="red"
                            >
                              <v-icon>mdi-delete</v-icon>
                            </v-btn>
                          </div>
                        </v-list-item-action>
                      </div>
                    </v-list-item>
                  </v-list>
                </v-list-group>
              </v-list>
            </v-list-group>
            <v-btn
              color="primary"
              class="ml-2 flex-grow-0 flex-shink-0"
              v-if="$can('edit_category')"
              @click="editParent(c)"
            >Edit</v-btn>
            <v-btn
              color="red"
              class="ml-2 flex-grow-0 flex-shink-0"
              v-if="$can('delete_category')"
              @click="deleteItem(c)"
            >Remove</v-btn>
          </div>
        </div>
      </v-list>
    </v-flex>
    <v-dialog v-model="dialog" max-width="500">
      <v-card>
        <v-card-text>Edit Item</v-card-text>
        <v-card-text>
          <v-form ref="form" v-model="valid" lazy-validation>
            <v-text-field v-model="item.name" :rules="[rules.required]" />
            <div v-if="isEditParent == false">
              <v-select
                :items="item.group"
                v-model="item.groupName"
                return-object
                item-text="name"
                item-value="id"
              />
              <v-select
                :items="categories"
                v-model="item.parentName"
                return-object
                @input="filterGroupByParent(item.parentName)"
                item-text="name"
                item-value="parent_id"
              />
            </div>
            <v-btn :disabled="!valid" color="success" class="mr-4" @click="validate">Save</v-btn>

            <v-btn color="error" class="mr-4" @click="reset">Reset Form</v-btn>

            <v-btn color="warning" @click="resetValidation">Reset Validation</v-btn>
          </v-form>
        </v-card-text>
      </v-card>
    </v-dialog>
  </v-layout>
</template>

<script>
import { apiURL } from "@/utils";
export default {
  data: () => ({
    parentClick: false,
    subCateClick: false,
    item: {},
    valid: true,
    isEditParent: true,
    dialog: false,
    rules: {
      required: v => !!v || "This field is required."
    },
    headers: [
      {
        text: "Name",
        align: "start",
        sortable: false,
        value: "categoryName"
      },
      { text: "Parent Name", value: "parentName", sortable: true },
      { text: "Group", value: "group", sortable: true },
      { text: "Actions", value: "actions", sortable: false }
    ],
    categories: []
  }),

  watch: {
    dialog(val) {
      val || this.close();
    }
  },

  created() {
    this.fetchData();
  },

  methods: {
    filterGroupByParent(parent) {
      this.item.groupName = {};
      this.item.group = parent.group;
    },
    reset() {
      this.$refs.form.reset();
    },
    validate() {
      if (this.$refs.form.validate()) {
        if (this.isEditParent) {
          apiURL
            .put(`categoriesM/${this.item.parent_id}`, { name: this.item.name })
            .then(({ data: { message } }) => this.$awn.success(message))
            .catch(({ response }) => console.log(response));
          this.close();
        } else {
          let {
            childID,
            name,
            groupName: { id },
            parentName: { parent_id }
          } = this.item;
          apiURL
            .put(`subcategories/${childID}`, { name, groupID: id, parent_id })
            .then(({ data: { message } }) => this.$awn.success(message))
            .catch(({ response }) => console.log(response));
          this.fetchData();
          this.close();
        }
      }
    },
    resetValidation() {
      this.$refs.form.resetValidation();
    },
    parentIndex(id) {
      return this.categories.findIndex(c => c.parent_id == id);
    },
    groupIndex(id, group) {
      return group.findIndex(g => g.id == id);
    },
    deleteItem(item) {
      this.$swal({
        title: "Are you sure?",
        text: `You won't be able to revert this!`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Delete",
        confirmButtonColor: "#dd4b39",
        focusCancel: true,
        reverseButtons: true
      }).then(result => {
        if (result.value) {
          if (item.id) {
            apiURL
              .delete(`subcategories/${item.id}`)
              .then(({ data: { message } }) => {
                this.$awn.success(message);
                this.fetchData();
              })
              .catch(({ response }) => console.log(response));
            this.fetchData();
          } else {
            apiURL
              .delete(`categoriesM/${item.parent_id}`)
              .then(({ data: { message } }) => {
                this.$awn.success(message);
                this.fetchData();
              })
              .catch(({ response }) => console.log(response));
            this.fetchData();
          }
        }
      });
    },
    editParent(item) {
      this.dialog = true;
      this.item = item;
      console.log(item);
    },
    editChildren(item) {
      this.isEditParent = false;
      this.dialog = true;
      let parent = this.categories[this.parentIndex(item.category_id)];
      this.item = {
        childID: item.id,
        name: item.name,
        group: parent.group,
        groupName: parent.group[this.groupIndex(item.parent_id, parent.group)],
        parentName: parent
      };
      console.log(item);
    },

    close() {
      this.dialog = false;
      this.parentClick = false;
      this.item = {};
      this.isEditParent = true;
    },
    saveCateParent() {
      console.log(this.item);
      apiURL
        .post("categoriesM", { parent_name: this.item.name })
        .then(({ data: { message } }) => {
          this.$awn.success(message);
          this.fetchData();
        })
        .catch(({ response }) => console.log(response));
      this.close();
    },
    fetchData() {
      apiURL
        .get("categoriesM")
        .then(({ data }) => (this.categories = data))
        .catch(response => console.log(response));
    },
    save(item) {
      let data = {
        parent_id: item.category_id,
        name: this.item.name,
        group_id: item.id
      };
      apiURL
        .post("categoriesM", data)
        .then(({ data: { message } }) => this.$awn.success(message))
        .catch(({ response }) => console.log(response));
      this.fetchData();
      this.close();
    }
  }
};
</script>