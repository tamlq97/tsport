<template>
  <v-layout row wrap>
    <v-flex>
      <v-data-table :headers="headers" :items="orders.data" sort-by="calories" class="elevation-1">
        <template v-slot:top>
          <v-toolbar flat color="white">
            <v-toolbar-title>Manager Orders</v-toolbar-title>
            <v-divider class="mx-4" inset vertical></v-divider>
            <v-spacer></v-spacer>
            <v-dialog v-model="dialog" max-width="1680">
              <!-- <template v-slot:activator="{ on }">
                <v-btn color="primary" dark class="mb-2" v-on="on">New Item</v-btn>
              </template>-->
              <v-card>
                <v-toolbar flat>
                  <v-toolbar-title class="headline">Order Detail</v-toolbar-title>
                  <v-spacer></v-spacer>
                  <v-btn icon @click="close">
                    <v-icon>mdi-close</v-icon>
                  </v-btn>
                </v-toolbar>
                <v-card-text>
                  <v-container>
                    <v-row>
                      <v-col sm="12" md="6" lg="6" class="font-weight-bold">
                        <p>Order Code : {{viewedItem.madh}}</p>
                        <p v-if="viewedItem.customer">
                          <!-- Customer: {{viewedItem.customer.contact_fname+' '+ viewedItem.customer.contact_lname}} -->
                          Customer: {{viewedItem.customer.email}}
                        </p>
                        <p>Payment type: {{viewedItem.payment.payment_type}}</p>
                        <p>Order date: {{viewedItem.order_date}}</p>
                      </v-col>
                    </v-row>
                    <v-row>
                      <v-col sm="12">
                        <v-simple-table>
                          <template v-slot:default>
                            <thead>
                              <th>STT</th>
                              <th>Product Code</th>
                              <th>Product Name</th>
                              <th>Supplier</th>
                              <th>Quantity</th>
                              <th>Price</th>
                              <th>Size</th>
                              <th>Color</th>
                              <th>Unit</th>
                              <th>Total</th>
                            </thead>
                            <tbody>
                              <tr v-for="(prod,i) in viewedItem.detail" :key="i">
                                <td>{{i}}</td>
                                <td>{{prod.product.masp}}</td>
                                <td v-html="prod.product.product_name"></td>
                                <td>{{prod.product.supplier.company_name}}</td>
                                <td>{{prod.quantity}}</td>
                                <td>${{prod.price}} USD</td>
                                <td>{{prod.size}}</td>
                                <td>{{prod.color}}</td>
                                <td>USD</td>
                                <td>${{prod.quantity * prod.price}} USD</td>
                              </tr>
                            </tbody>
                          </template>
                        </v-simple-table>
                      </v-col>
                    </v-row>
                    <v-row>
                      <v-col class="text-center">
                        <div class="mx-auto">
                          <p class="headline">Total Order : ${{totalOrder}} USD</p>
                        </div>
                      </v-col>
                    </v-row>
                  </v-container>
                </v-card-text>

                <v-card-actions>
                  <v-spacer></v-spacer>
                </v-card-actions>
              </v-card>
            </v-dialog>
          </v-toolbar>
        </template>
        <template v-slot:item.actions="{ item }">
          <v-btn
            v-if="$can('view_order_manager')"
            color="orange"
            @click="viewOrderDetail(item)"
            small
          >
            View details
            <v-icon small class="mr-2">mdi-eye</v-icon>
          </v-btn>
          <v-btn v-if="$can('confirm_order')" color="primary" small @click="confirmOrder(item)">
            Confirm Order
            <v-icon small class="mr-2">mdi-check</v-icon>
          </v-btn>
          <v-tooltip bottom>
            <template #activator="{on}">
              <v-btn v-if="$can('order_out_of_stock')" small @click="outOfStock(item)" v-on="on">
                Send Mail
                <v-icon small>mdi-email</v-icon>
              </v-btn>
              <!-- @click="addImageProdColor(item)" -->
            </template>
            <span>Send notify mail products out of stock to customer.</span>
          </v-tooltip>
          <v-btn
            v-if="$can('delete_order')"
            color="red"
            small
            @click="deleteItem(item)"
            class="text-white ml-1"
          >
            Delete
            <v-icon>mdi-delete</v-icon>
          </v-btn>
        </template>
        <template #item.payment_type="{item}">{{item.payment.payment_type}}</template>
        <template #item.customer="{item}">
          <span v-if="item && item.customer">
            <!-- {{item.customer.contact_fname +" "+item.customer.contact_lname}} -->
            {{item.customer.email}}
          </span>
        </template>

        <!-- <template v-slot:no-data>
          <v-btn color="primary" @click="initialize">Reset</v-btn>
        </template>-->
      </v-data-table>
    </v-flex>
  </v-layout>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  data: () => ({
    dialog: false,
    headers: [
      {
        text: "Order Code",
        align: "start",
        sortable: false,
        value: "madh",
      },
      { text: "Payment Type", value: "payment_type" },
      { text: "Order date", value: "order_date" },
      { text: "Customer", value: "customer" },
      { text: "Actions", value: "actions", sortable: false },
    ],
    totalOrder: 0,
    desserts: [],
    editedIndex: -1,
    viewedItem: {
      customer: {},
      payment: {},
    },
    defaultItem: {
      name: "",
      calories: 0,
      fat: 0,
      carbs: 0,
      protein: 0,
    },
  }),

  computed: {
    ...mapGetters("OrderIndex", ["orders"]),
    formTitle() {
      return this.editedIndex === -1 ? "New Item" : "Edit Item";
    },
  },

  watch: {
    dialog(val) {
      val || this.close();
    },
  },

  created() {
    this.$eventHub.$on("fetchOrders", (madh) => {
      this.$store.dispatch("OrderIndex/fetchData").then(({ data }) => {
        let item = data.filter((item) => item.madh === madh)[0];
        if (item) this.viewOrderDetail(item);
        else {
          this.$awn.warning("This order current was be deleted.");
          this.$eventHub.$emit("deleteNotify", madh);
        }
      });
    });
    this.$store.dispatch("OrderIndex/fetchData");
  },

  methods: {
    deleteItem(item) {
      this.$swal({
        title: "Are you sure?",
        text: `You won't be able to revert this!`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Delete",
        confirmButtonColor: "#dd4b39",
        focusCancel: true,
        reverseButtons: true,
      }).then((result) => {
        if (result.value) {
          this.$store
            .dispatch("OrderIndex/delete", item)
            .then(({ message }) => this.$awn.success(message));
        }
      });
    },
    async confirmOrder(item) {
      let order = { madh: item.madh };
      this.$awn.success("Success sent confirm order email to customer.");
      await this.$store.dispatch("OrderIndex/confirmOrder", order);
      // .then(({ message }) => this.$awn.success(message));
    },
    viewOrderDetail(item) {
      this.viewedItem = item;
      this.totalOrder = item.detail[0].total;
      this.dialog = true;
    },
    editItem(item) {
      this.viewedItem = item;
      this.dialog = true;
    },

    async outOfStock(item) {
      this.$awn.success(
        "Success sent notify order out of stock mail to customer."
      );
      await this.$store.dispatch("OrderIndex/outOfStock", item);
      // .then(({ message }) => this.$awn.success(message));
    },

    close() {
      this.dialog = false;
    },

    save() {
      if (this.editedIndex > -1) {
        Object.assign(this.desserts[this.editedIndex], this.viewedItem);
      } else {
        this.desserts.push(this.viewedItem);
      }
      this.close();
    },
  },
};
</script>