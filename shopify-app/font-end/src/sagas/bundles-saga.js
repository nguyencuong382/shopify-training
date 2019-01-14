import {
  put, call, select, take,
} from 'redux-saga/effects';
import action from '../redux/actions';

export function* getAllBundlesSaga(api) {
  console.log('call');
  const bundles = yield call(api.fetchAllBundles);
  yield put(action.bundlesAction.getAllBundles(bundles));
}
