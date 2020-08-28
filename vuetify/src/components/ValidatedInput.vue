<template>
  <ValidationProvider class="red--text" :name="label" :rules="rules" v-slot="{errors}">
    <v-text-field
      :autofocus="autofocus"
      :disabled="disabled"
      @input="updateField"
      v-model="field"
      :label="label"
    ></v-text-field>
    <span>{{errors[0]}}</span>
  </ValidationProvider>
</template>

<script>
export default {
  props: {
    label: {
      type: String,
      required: true
    },
    rules: {
      type: String,
      required: true,
      default: ""
    },
    disabled: {
      type: Boolean,
      default: false
    },
    autofocus: {
      type: Boolean,
      default: false
    },
    field: {
      type: String,
      required: true
    },
    updateField: {
      type: Function
    }
  }
};
</script>

<style>
</style>