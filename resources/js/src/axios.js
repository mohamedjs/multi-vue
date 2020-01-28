// axios
import axios from 'axios'

const domain = window.location.origin

export default axios.create({
  domain,
  headers: {
    'X-localization': localStorage.getItem("lang") ? localStorage.getItem("lang") :'en',
    'content-type': 'multipart/form-data'
  }
})
