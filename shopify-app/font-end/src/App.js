import React, { Component } from 'react';
// import './scss/app.scss';
// import Admin from './Admin';
import { connect } from 'react-redux';
// <button onClick={this.props.loadBundles}>Fetch</button>
import ProductBundle from './pages/product-bundles';

class App extends Component {
  render() {
    return (
      <div>
        <ProductBundle />
      </div>
    );
  }
}

const mapStateToProps = (state) => {

};

const mapDispatchToProps = dispatch => ({
  loadBundles: () => dispatch({ type: 'FETCH_ALL_BUNDLES_SAGA' }),
});

export default connect(
  null,
  mapDispatchToProps,
)(App);
