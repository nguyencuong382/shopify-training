export const ACTION_BUNDLES = {
  FETCH_ALL_BUNDLES: 'FETCH_ALL_BUNDLES',
};

export const getAllBundles = bundles => ({
  type: ACTION_BUNDLES.FETCH_ALL_BUNDLES,
  payload: bundles,
});
