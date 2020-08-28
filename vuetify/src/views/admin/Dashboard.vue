<template>
  <v-layout wrap row>
    <v-flex>
      <v-row align="center" justify="center">
        <div class="col-sm-6 col-lg-3 col-12">
          <div
            class="v-card--material pa-3 v-card--material-stats v-card v-sheet theme--light v-card--material--has-heading"
          >
            <div class="d-flex grow flex-wrap">
              <div
                class="text-start v-card--material__heading mb-n6 v-sheet theme--dark elevation-6 info pa-7"
                style="max-height: 90px; width: auto;"
              >
                <i
                  aria-hidden="true"
                  class="v-icon notranslate mdi mdi-account theme--dark"
                  style="font-size: 32px;"
                ></i>
                <!---->
              </div>
              <div class="ml-6">
                <div class="ml-auto text-right">
                  <div class="body-3 grey--text font-weight-light">Customers</div>
                  <h3 class="display-2 font-weight-light text--primary">
                    {{data.customers}}
                    <small></small>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3 col-12">
          <div
            class="v-card--material pa-3 v-card--material-stats v-card v-sheet theme--light v-card--material--has-heading"
          >
            <div class="d-flex grow flex-wrap">
              <div
                class="text-start v-card--material__heading mb-n6 v-sheet theme--dark elevation-6 primary pa-7"
                style="max-height: 90px; width: auto;"
              >
                <i
                  aria-hidden="true"
                  class="v-icon notranslate mdi mdi-cart theme--dark"
                  style="font-size: 32px;"
                ></i>
                <!---->
              </div>
              <div class="ml-6">
                <div class="ml-auto text-right">
                  <div class="body-3 grey--text font-weight-light">Orders</div>
                  <h3 class="display-2 font-weight-light text--primary">
                    {{data.orders}}
                    <small></small>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3 col-12">
          <div
            class="v-card--material pa-3 v-card--material-stats v-card v-sheet theme--light v-card--material--has-heading"
          >
            <div class="d-flex grow flex-wrap">
              <div
                class="text-start v-card--material__heading mb-n6 v-sheet theme--dark elevation-6 success pa-7"
                style="max-height: 90px; width: auto;"
              >
                <i
                  aria-hidden="true"
                  class="v-icon notranslate mdi mdi-store theme--dark"
                  style="font-size: 32px;"
                ></i>
                <!---->
              </div>
              <div class="ml-6">
                <div class="ml-auto text-right">
                  <div class="body-3 grey--text font-weight-light">Suppliers</div>
                  <h3 class="display-2 font-weight-light text--primary">
                    {{data.suppliers}}
                    <small></small>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3 col-12">
          <div
            class="v-card--material pa-3 v-card--material-stats v-card v-sheet theme--light v-card--material--has-heading"
          >
            <div class="d-flex grow flex-wrap">
              <div
                class="text-start v-card--material__heading mb-n6 v-sheet theme--dark elevation-6 orange pa-7"
                style="max-height: 90px; width: auto;"
              >
                <i
                  aria-hidden="true"
                  class="v-icon notranslate mdi mdi-poll theme--dark"
                  style="font-size: 32px;"
                ></i>
                <!---->
              </div>
              <div class="ml-6">
                <div class="ml-auto text-right">
                  <div class="body-3 grey--text font-weight-light">Products</div>
                  <h3 class="display-2 font-weight-light text--primary">
                    {{data.products}}
                    <small></small>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- <h1>Dashboard</h1>
        <canvas id="barChart"></canvas>-->
      </v-row>
      <v-row>
        <v-col sm="12" lg="4" cols="12">
          <v-card>
            <div class="d-flex">
              <v-menu
                v-model="fromMenu"
                :close-on-content-click="false"
                :nudge-right="40"
                transition="scale-transition"
                offset-y
                min-width="290px"
              >
                <template v-slot:activator="{ on }">
                  <v-text-field
                    v-model="dateFrom"
                    label="Customer From"
                    prepend-icon="mdi-calendar-range"
                    readonly
                    v-on="on"
                  ></v-text-field>
                </template>
                <v-date-picker v-model="dateFrom" @input="fromMenu = false"></v-date-picker>
              </v-menu>
              <v-menu
                v-model="toMenu"
                :close-on-content-click="false"
                :nudge-right="40"
                transition="scale-transition"
                offset-y
                min-width="290px"
              >
                <template v-slot:activator="{ on }">
                  <v-text-field
                    v-model="dateTo"
                    label="Customer To"
                    prepend-icon="mdi-calendar-range"
                    readonly
                    v-on="on"
                  ></v-text-field>
                </template>
                <v-date-picker v-model="dateTo" @input="toMenu = false"></v-date-picker>
              </v-menu>
              <v-btn color="primary" @click="sastifyCusBetweenDate">Filter</v-btn>
            </div>
            <v-simple-table>
              <template #default>
                <caption>
                  <h3>Customer statisty between offer date</h3>
                </caption>
                <thead>
                  <tr>
                    <th>Customer Code</th>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>Created</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(u,k) in customers.data" :key="k">
                    <td>{{u.makh }}</td>
                    <td class="pa-2" scope="row">
                      <v-img v-if="u.avatar" :src="u.avatar" max-width="100" :alt="u.avatar" />
                    </td>
                    <td>{{u.contact_fname + ' ' +u.contact_lname}}</td>
                    <td>{{u.city}}</td>
                    <td>{{u.country}}</td>
                    <td>{{u.created_at}}</td>
                  </tr>
                  <tr v-if="customers.data && customers.data.length <= 0">
                    <h4>No data.</h4>
                  </tr>
                </tbody>
              </template>
            </v-simple-table>
            <v-pagination total-visible="5" v-model="page" :length="customers.last_page" />
            <!-- <canvas id="lineChart"></canvas> -->
          </v-card>
        </v-col>
        <v-col sm="12" lg="4" cols="12">
          <v-card>
            <div class="d-flex">
              <v-menu
                v-model="fromSupMenu"
                :close-on-content-click="false"
                :nudge-right="40"
                transition="scale-transition"
                offset-y
                min-width="290px"
              >
                <template v-slot:activator="{ on }">
                  <v-text-field
                    v-model="dateSupFrom"
                    label="Supplier From"
                    prepend-icon="mdi-calendar-range"
                    readonly
                    v-on="on"
                  ></v-text-field>
                </template>
                <v-date-picker v-model="dateSupFrom" @input="fromSupMenu = false"></v-date-picker>
              </v-menu>
              <v-menu
                v-model="toSupMenu"
                :close-on-content-click="false"
                :nudge-right="40"
                transition="scale-transition"
                offset-y
                min-width="290px"
              >
                <template v-slot:activator="{ on }">
                  <v-text-field
                    v-model="dateSupTo"
                    label="Supplier To"
                    prepend-icon="mdi-calendar-range"
                    readonly
                    v-on="on"
                  ></v-text-field>
                </template>
                <v-date-picker v-model="dateSupTo" @input="toSupMenu = false"></v-date-picker>
              </v-menu>
              <v-btn color="primary" @click="sastifySupBetweenDate">Filter</v-btn>
            </div>
            <v-simple-table>
              <template #default>
                <caption>
                  <h3>Supplier statisty between offer date</h3>
                </caption>
                <thead>
                  <tr>
                    <th>Supplier Code</th>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>Created</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(u,k) in suppliers.data" :key="k">
                    <td>{{u.supplier_code}}</td>
                    <td class="pa-2" scope="row">
                      <v-img v-if="u.logo" :src="u.logo" max-width="100" :alt="u.logo" />
                    </td>
                    <td>{{u.contact_fname + ' ' +u.contact_lname}}</td>
                    <td>{{u.city}}</td>
                    <td>{{u.country}}</td>
                    <td>{{u.created_at}}</td>
                  </tr>
                  <tr v-if="suppliers.data && suppliers.data.length <= 0">
                    <h4>No data.</h4>
                  </tr>
                </tbody>
              </template>
            </v-simple-table>
            <v-pagination total-visible="5" v-model="page" :length="suppliers.last_page" />
            <!-- <canvas id="lineChart"></canvas> -->
          </v-card>
        </v-col>
        <v-col sm="12" lg="4" cols="12">
          <v-card>
            <div class="d-flex">
              <v-menu
                v-model="fromOrderMenu"
                :close-on-content-click="false"
                :nudge-right="40"
                transition="scale-transition"
                offset-y
                min-width="290px"
              >
                <template v-slot:activator="{ on }">
                  <v-text-field
                    v-model="dateOrderFrom"
                    label="Order From"
                    prepend-icon="mdi-calendar-range"
                    readonly
                    v-on="on"
                  ></v-text-field>
                </template>
                <v-date-picker v-model="dateOrderFrom" @input="fromOrderMenu = false"></v-date-picker>
              </v-menu>
              <v-menu
                v-model="toOrderMenu"
                :close-on-content-click="false"
                :nudge-right="40"
                transition="scale-transition"
                offset-y
                min-width="290px"
              >
                <template v-slot:activator="{ on }">
                  <v-text-field
                    v-model="dateOrderTo"
                    label="Order To"
                    prepend-icon="mdi-calendar-range"
                    readonly
                    v-on="on"
                  ></v-text-field>
                </template>
                <v-date-picker v-model="dateOrderTo" @input="toOrderMenu = false"></v-date-picker>
              </v-menu>
              <v-btn color="primary" @click="sastifyOrderBetweenDate">Filter</v-btn>
            </div>
            <v-simple-table>
              <template #default>
                <caption>
                  <h3>Order statisty between offer date</h3>
                </caption>
                <thead>
                  <tr>
                    <th>Order Code</th>
                    <th>Customer Email</th>
                    <th>Order Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(u,k) in orders.data" :key="k">
                    <td class="pa-2" scope="row">{{u.madh}}</td>
                    <td>{{u.customer_email}}</td>
                    <td>{{u.created_at}}</td>
                  </tr>
                  <tr v-if="orders.data && orders.data.length <= 0">
                    <h5>No data.</h5>
                  </tr>
                </tbody>
              </template>
            </v-simple-table>
            <v-pagination total-visible="5" v-model="page" :length="orders.last_page" />
            <!-- <canvas id="lineChart"></canvas> -->
          </v-card>
        </v-col>
      </v-row>
    </v-flex>
  </v-layout>
</template>

<script>
import Chart from "chart.js";
import { apiURL } from "@/utils";
export default {
  name: "dashboard",
  data() {
    let dateFrom = new Date();
    dateFrom.setMonth(dateFrom.getMonth() - 1);
    let dateOrderFrom = new Date();
    dateOrderFrom.setMonth(dateOrderFrom.getMonth() - 1);
    let dateOrderTo = new Date();
    dateOrderTo.setDate(dateOrderTo.getDate() + 1);
    let dateTo = new Date();
    dateTo.setDate(dateTo.getDate() + 1);
    let dateSupFrom = new Date();
    dateSupFrom.setMonth(dateSupFrom.getMonth() - 1);
    let dateSupTo = new Date();
    dateSupTo.setDate(dateSupTo.getDate() + 1);

    return {
      page: 1,
      customers: [],
      suppliers: [],
      orders: [],
      fromOrderMenu: false,
      fromMenu: false,
      toOrderMenu: false,
      toMenu: false,
      dateFrom: dateFrom.toISOString().substr(0, 10),
      dateTo: dateTo.toISOString().substr(0, 10),
      dateOrderFrom: dateOrderFrom.toISOString().substr(0, 10),
      dateOrderTo: dateOrderTo.toISOString().substr(0, 10),
      fromSupMenu: false,
      toSupMenu: false,
      dateSupFrom: dateSupFrom.toISOString().substr(0, 10),
      dateSupTo: dateSupTo.toISOString().substr(0, 10),
      lineChart: {
        type: "bar",
        data: {
          labels: [
            "Mercury",
            "Venus",
            "Earth",
            "Mars",
            "Jupiter",
            "Saturn",
            "Uranus",
            "Neptune"
          ],
          datasets: [
            {
              // one line graph
              label: "Number of Moons",
              type: "line",
              data: [0, 0, 1, 2, 67, 62, 27, 14],
              backgroundColor: [
                "rgba(54,73,93,.5)", // Blue
                "rgba(54,73,93,.5)",
                "rgba(54,73,93,.5)",
                "rgba(54,73,93,.5)",
                "rgba(54,73,93,.5)",
                "rgba(54,73,93,.5)",
                "rgba(54,73,93,.5)",
                "rgba(54,73,93,.5)"
              ],
              borderColor: [
                "#36495d",
                "#36495d",
                "#36495d",
                "#36495d",
                "#36495d",
                "#36495d",
                "#36495d",
                "#36495d"
              ],
              borderWidth: 3
            },
            {
              // another line graph
              label: "Planet Mass 1(x1,000 km)",
              data: [4.8, 12.1, 12.7, 6.7, 139.8, 116.4, 50.7, 49.2],
              backgroundColor: [
                "rgba(71, 183,132,.5)" // Green
              ],
              borderColor: ["#47b784"],
              borderWidth: 3
            },
            {
              // one line graph
              label: "Number of Moons 2",
              type: "bar",
              data: [0, 0, 1, 2, 67, 62, 27, 14],
              backgroundColor: [
                "rgba(54,73,93,.5)", // Blue
                "rgba(54,73,93,.5)",
                "rgba(54,73,93,.5)",
                "rgba(54,73,93,.5)",
                "rgba(54,73,93,.5)",
                "rgba(54,73,93,.5)",
                "rgba(54,73,93,.5)",
                "rgba(54,73,93,.5)"
              ],
              borderColor: [
                "#36495d",
                "#36495d",
                "#36495d",
                "#36495d",
                "#36495d",
                "#36495d",
                "#36495d",
                "#36495d"
              ],
              borderWidth: 3
            },
            {
              // another line graph
              label: "Planet Mass 2(x1,000 km)",
              data: [4.8, 12.1, 12.7, 6.7, 139.8, 116.4, 50.7, 49.2],
              backgroundColor: [
                "rgba(71, 183,132,.5)" // Green
              ],
              borderColor: ["#47b784"],
              borderWidth: 3
            }
          ]
        },
        options: {
          responsive: true,
          lineTension: 1,
          scales: {
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                  padding: 25
                }
              }
            ]
          }
        }
      },
      barChart: {
        type: "bar",
        data: {
          labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
          datasets: [
            {
              label: "# of Votes",
              data: [12, 19, 3, 5, 2, 3],
              backgroundColor: [
                "rgba(255, 99, 132, 0.2)",
                "rgba(54, 162, 235, 0.2)",
                "rgba(255, 206, 86, 0.2)",
                "rgba(75, 192, 192, 0.2)",
                "rgba(153, 102, 255, 0.2)",
                "rgba(255, 159, 64, 0.2)"
              ],
              borderColor: [
                "rgba(255, 99, 132, 1)",
                "rgba(54, 162, 235, 1)",
                "rgba(255, 206, 86, 1)",
                "rgba(75, 192, 192, 1)",
                "rgba(153, 102, 255, 1)",
                "rgba(255, 159, 64, 1)"
              ],
              borderWidth: 1
            }
          ]
        }
      },
      data: []
    };
  },
  watch: {
    page: function(val) {
      this.page = val;
      this.sastifyCusBetweenDate();
      this.sastifySupBetweenDate();
      this.sastifyOrderBetweenDate();
    }
  },
  created() {
    this.fetchDataDashboard();
    this.sastifyCusBetweenDate();
    this.sastifySupBetweenDate();
    this.sastifyOrderBetweenDate();
  },
  mounted() {
    // this.createChart("lineChart", this.lineChart);
    // this.createChart("barChart", this.barChart);
  },
  methods: {
    sastifyCusBetweenDate() {
      apiURL
        .get("admin/dashboard/customer", {
          params: {
            from: this.dateFrom,
            to: this.dateTo,
            length: 10,
            page: this.page
          }
        })
        .then(({ data: { customers } }) => {
          this.customers = customers;
        })
        .catch(response => console.log(response));
    },
    sastifySupBetweenDate() {
      apiURL
        .get("admin/dashboard/supplier", {
          params: {
            from: this.dateSupFrom,
            to: this.dateSupTo,
            length: 10,
            page: this.page
          }
        })
        .then(({ data: { suppliers } }) => {
          this.suppliers = suppliers;
        })
        .catch(response => console.log(response));
    },
    sastifyOrderBetweenDate() {
      apiURL
        .get("admin/dashboard/order", {
          params: {
            from: this.dateOrderFrom,
            to: this.dateOrderTo,
            length: 10,
            page: this.page
          }
        })
        .then(({ data: { orders } }) => {
          this.orders = orders;
        })
        .catch(response => console.log(response));
    },
    fetchDataDashboard() {
      apiURL
        .get("admin/dashboard")
        .then(({ data: { data } }) => {
          this.data = data;
        })
        .catch(response => console.log(response));
    },
    createChart(chartId, chartData) {
      const ctx = document.getElementById(chartId);
      const myChart = new Chart(ctx, {
        type: chartData.type,
        data: chartData.data,
        options: chartData.options
      });
      return myChart;
    }
  }
};
</script>

<style>
</style>