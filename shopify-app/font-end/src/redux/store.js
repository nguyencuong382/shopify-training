import { createStore, applyMiddleware, compose } from 'redux';
import createSagaMiddleware from 'redux-saga';
import thunk from 'redux-thunk';
import { composeWithDevTools } from 'redux-devtools-extension/developmentOnly';
import reducer from './reducers';
import startForman from '../sagas';

const logAction = store => next => (action) => {
  console.log(action);
  console.log(store.getState());
  next(action);
};

const configureStore = () => {
  const sagaMiddleware = createSagaMiddleware();
  /* eslint-disable-next-line */
  // const composeEnhancers = window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__();
  // create a redux store with our reducer above and middleware
  const store = createStore(reducer,
    applyMiddleware(logAction, thunk, sagaMiddleware));

  sagaMiddleware.run(startForman);

  // store.dispatch({ type: 'FETCH_ALL_BUNDLES_SAGA' });

  return store;
};


export default configureStore;
