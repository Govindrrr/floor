import axios from 'axios';
window.axios = axios;
import 'flowbite';
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
