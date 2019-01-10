import axios from 'axios';


class Api {

    constructor(baseURL = 'api/') {
        this.axios_ = axios.create({
            baseURL: baseURL,
            timeout: 10000,
        });
    }

    whenRequest(callbackRequest, callbackError)  {
        this.axios_.interceptors.request.use(function (config) {
            // Do something before request is sent
            callbackRequest();
            return config;
        }, function (error) {
            // Do something with request error
            callbackError();
            return Promise.reject(error);
        });
    }

    whenDone(callbackRequest, callbackError) {
        this.axios_.interceptors.response.use(function (response) {
            // Do something with response data
            callbackRequest();
            return response;
        }, function (error) {
            // Do something with response error
            callbackError();
            return Promise.reject(error);
        });
    }
}


export default Api;
