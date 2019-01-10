import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {AppProvider, Page, Card, Button, CalloutCard} from '@shopify/polaris';
import {Redirect} from '@shopify/app-bridge/actions';
import * as PropTypes from 'prop-types';
import '@shopify/polaris/styles.css';
import Admin from './Admin';

class Root extends React.Component {
  render() {
    return(
      <AppProvider>
        <Admin></Admin>
      </AppProvider>
    );
  }
}

if (document.getElementById('app')) {
  ReactDOM.render(<Root />, document.getElementById('app'));
}
