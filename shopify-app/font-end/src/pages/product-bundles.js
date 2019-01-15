import React, { Component } from 'react';
import { connect } from 'react-redux';
import BundlesTable from './bundles-table';

export class ProductBundle extends Component {
  render() {
    return (
      <BundlesTable />
    );
  }
}

export default ProductBundle;
