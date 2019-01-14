import axios from 'axios';

const initialURL = 'http://localhost:8000/api';

const createBundlesApi = (baseURL = initialURL) => {
  const api = axios.create({
    baseURL,
  });

  const fetchAllBundles = () => api.get(
    '/bundles',
  ).then((res) => {
    console.log(res);
    return res.data;
  })
    .catch((err) => {
      console.log(err);
      return err;
    });

  return {
    fetchAllBundles,
  };
};

export default {
  createBundlesApi,
};
