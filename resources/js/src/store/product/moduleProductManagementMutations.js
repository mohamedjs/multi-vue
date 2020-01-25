export default {
  SET_PRODUCT(state, product) {
    state.product = product
  },
  RESET_PRODUCT(state){
    state.product = {'title':'' ,'main_image':'' ,'price':'' ,'special_price_type':'' ,'special_price' : '',
            'special':'' ,'active':'' ,'description':'' ,'short_description':'' ,'special_price_end':'' ,'special_price_start' : '',
            'meta_keyword':'' ,'meta_title':'' ,'meta_description':'' ,'sku':'' ,'category_id':'' ,'brand_id':'' ,'stock':'' ,'min_stock':''}
  }
}
