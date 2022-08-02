// ウィンドウ消去
function hideWindow(){
  document.getElementById('window_backframe').classList.add('is-hidden');
}
// 画像追加ウィンドウ
function showImageWindow(){
  document.getElementById('window_backframe').classList.remove('is-hidden');
  document.getElementById('new_image').classList.remove('image_hide');
  try{
    document.getElementById('new_genre').classList.add('genre_hide');
  } catch {
  }
  try{
    document.getElementById('new_area').classList.add('area_hide');
  } catch {
  }
}
// 売り場追加ウィンドウ
function showGenreWindow(){
  document.getElementById('window_backframe').classList.remove('is-hidden');
  document.getElementById('new_genre').classList.remove('genre_hide');
  try{
    document.getElementById('new_image').classList.add('image_hide');
  } catch {
  }
  try{
    document.getElementById('new_area').classList.add('area_hide');
  } catch {
  }
}
// 産地追加ウィンドウ
function showAreaWindow(){
  document.getElementById('window_backframe').classList.remove('is-hidden');
  document.getElementById('new_area').classList.remove('area_hide');
  try{
    document.getElementById('new_image').classList.add('image_hide');
  } catch {
  }
  try{
    document.getElementById('new_genre').classList.add('genre_hide');
  } catch {
  }
}
// 商品追加ウィンドウ
function showProductWindow(){
  document.getElementById('window_backframe').classList.remove('is-hidden');
  document.getElementById('new_product').classList.remove('product_hide');
}
// 売り場担当者追加ウィンドウ
function showManagerWindow(){
  document.getElementById('window_backframe').classList.remove('is-hidden');
  document.getElementById('new_manager').classList.remove('manager_hide');
  try{
    document.getElementById('new_email').classList.add('email_hide');
  } catch {
  }
}
// ユーザー追加ウィンドウ
function showUserWindow(){
  document.getElementById('window_backframe').classList.remove('is-hidden');
  document.getElementById('new_user').classList.remove('user_hide');
  try{
    document.getElementById('new_email').classList.add('email_hide');
  } catch {
  }
}
// Email追加ウィンドウ
function showEmailWindow(){
  document.getElementById('window_backframe').classList.remove('is-hidden');
  document.getElementById('new_email').classList.remove('email_hide');
  try {
    document.getElementById('new_manager').classList.add('manager_hide');
  } catch {
  }
  try {
    document.getElementById('new_user').classList.add('user_hide');
  } catch {
  }
}