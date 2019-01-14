import React, { Component } from 'react';
import RowBundlesTable from './row-bundles-table';

export default class BundlesTable extends Component {
  render() {
    return (
      <section className="content container-fluid">
        <div className="box">
          <div className="box-header">
            <h3 className="box-title">Responsive Hover Table</h3>
          </div>
          <div className="box-body table-responsive no-padding">
            <table className="table table-hover">
              <tbody>
                <tr>
                  <th>
                    <div className="checkbox">
                      <label>
                        <input type="checkbox" defaultValue />
                        Name
                      </label>
                    </div>
                  </th>
                  <th className="w-100" />
                  <th className="w-150">Stats (30 days)</th>
                  <th className="w-100" />
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                <RowBundlesTable />
              </tbody>
            </table>
          </div>
        </div>
      </section>
    );
  }
}
