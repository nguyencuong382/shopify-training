import { ACTION_BUNDLES } from '../actions/bundles-action';

const initialState = {
  bundles: [],
};

const bundlesReducer = (state = initialState, action) => {
  switch (action.type) {
  case ACTION_BUNDLES.FETCH_ALL_BUNDLES: {
    return {
      ...state,
      bundles: action.payload,
    };
  }

  default:
    break;
  }
  return state;
};

export default bundlesReducer;
