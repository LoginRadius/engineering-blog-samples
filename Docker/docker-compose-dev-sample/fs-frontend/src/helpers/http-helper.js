import axios from 'axios';

const baseURL = process.env.REACT_APP_BACKEND_URL;
let headers = {};

console.log("BaseURL " + baseURL);

const httpInstance = axios.create({
    baseURL: baseURL,
    headers,
});

export default httpInstance;
