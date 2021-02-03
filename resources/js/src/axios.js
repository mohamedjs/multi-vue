import axios from 'axios'
import router from './router'
import store from './store/store'

const domain = window.location.origin

var Client = axios.create({
    domain,
    headers: {
        'X-localization': localStorage.getItem("lang") ? localStorage.getItem("lang") : 'en',
        'content-type': 'application/json',
        'accept': 'application/json'
    }
})

Client.interceptors.response.use(response => {
    return response;
}, error => {
    if (error.response.status == 401 || error.response.status == 413) {
        localStorage.removeItem('userInfo')
        router.push({ path: '/login' }).catch(() => {})
    }
    return Promise.reject(error)
});

export default Client