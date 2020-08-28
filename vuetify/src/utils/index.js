import axios from "axios";
let token = sessionStorage.authToken
  ? `Bearer ${sessionStorage.authToken}`
  : "";
export const apiURL = axios.create({
  baseURL: "http://localhost:8000/api",
  headers: {
    Authorization: token
  }
});
export const getIndex = (array, key, value) => {
  return array.findIndex(i => i[key] == value);
};

export const convertObjectToFormData = (
  val,
  formData = new FormData(),
  namespace = ""
) => {
  if (typeof val !== "undefined" && val !== null) {
    if (val instanceof Date) {
      formData.append(namespace, val.toISOString());
    } else if (val instanceof Array) {
      for (let i = 0; i < val.length; i++) {
        convertObjectToFormData(val[i], formData, namespace + "[" + i + "]");
      }
    } else if (typeof val === "object" && !(val instanceof File)) {
      if (val instanceof FileList) {
        for (let i = 0; i < val.length; i++) {
          formData.append(namespace + "[]", val[i]);
        }
      } else {
        for (let propertyName in val) {
          // eslint-disable-next-line no-prototype-builtins
          if (val.hasOwnProperty(propertyName)) {
            convertObjectToFormData(
              val[propertyName],
              formData,
              namespace ? namespace + "[" + propertyName + "]" : propertyName
            );
          }
        }
      }
    } else if (val instanceof File) {
      formData.append(namespace, val);
    }
    else {
      formData.append(namespace, val.toString());
    }
  }
  return formData;
};

export const convertArrayToFormData = (form_data, values, name) => {
  if (!values && name) form_data.append(name, "");
  else {
    if (typeof values == "object") {
      for (let key in values) {
        if (typeof values[key] == "object")
          convertArrayToFormData(
            form_data,
            values[key],
            name + "[" + key + "]"
          );
        else form_data.append(name + "[" + key + "]", values[key]);
      }
    } else form_data.append(name, values);
  }

  return form_data;
};
