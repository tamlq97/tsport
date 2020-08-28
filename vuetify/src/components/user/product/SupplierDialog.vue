<template>
  <v-dialog v-model="supplierDialog" max-width="800">
      <v-card>
          <v-card-title>{{formTitle}}</v-card-title>
          <v-card-text>
              <validation-observer v-slot='{invalid}'>
                  <v-row>
                      <validation-provider name="Company Name" rules="required" v-slot="{errors}">
                          <v-text-field v-model="supplier.company_name" :error-messages="errors" label="Company Name" />
                      </validation-provider>
                      <validation-provider name="Company Name" rules="required" v-slot="{errors}">
                          <v-text-field v-model="supplier.company_name" :error-messages="errors" label="Company Name" />
                      </validation-provider>
                  </v-row>
              </validation-observer>
          </v-card-text>
      </v-card>
  </v-dialog>
</template>

<script>
export default {

}
</script>

<style>

</style>