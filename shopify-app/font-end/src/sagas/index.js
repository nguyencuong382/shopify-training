import { fork, takeEvery } from 'redux-saga/effects';
import createBundlesApi from '../api/bundles-api';

import { getAllBundlesSaga } from './bundles-saga';

const apiBundles = createBundlesApi.createBundlesApi();

function* watcher() {
  yield takeEvery('FETCH_ALL_BUNDLES_SAGA', getAllBundlesSaga, apiBundles);
}

export default function* startForman() {
  yield fork(watcher);
}
