import ReactDOM from 'react-dom';
import React, { Component } from 'react';
import { Provider } from 'react-redux';
import App from './App';
import configureStore from './redux/store';


const rootElement = document.getElementById('root');

const store = configureStore();

ReactDOM.render(
  <Provider store={store}><App /></Provider>,
  rootElement,
);
