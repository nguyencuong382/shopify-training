import { combineReducers } from 'redux';
import bundlesReducer from './bundles-reducer';

export default combineReducers({
  bundles: bundlesReducer,
});
